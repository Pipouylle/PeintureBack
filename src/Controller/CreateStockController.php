<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Stocks;
use App\Repository\StocksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Picqer\Barcode\Renderers\HtmlRenderer;
use Picqer\Barcode\Renderers\PngRenderer;
use Picqer\Barcode\Types\TypeCode128;
use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Picqer\Barcode\BarcodeGeneratorPNG;


//TODO: activer gd dans php.ini
final class CreateStockController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct(StocksRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @throws RandomException
     */
    public function __invoke(int $articleId, int $nombre, Request $request, SerializerInterface $serializer): Response
    {
        $article = $this->entityManager->getRepository(Articles::class)->findOneBy(['id' => $articleId]);

        if (!$article) {
            return $this->json(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
        }

        $stocks = [];

        for ($i = 0; $i < $nombre; $i++) {
            $newStock = new Stocks();
            $newStock->setArticleStock($article);
            $newStock->setId($this->generateUniqueId());
            $stocks[$i] = $newStock;
            try {
                $this->entityManager->persist($newStock);
            } catch (\Error $e) {
                return $this->json(['message' => 'Error while generating unique id'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        try {
            $this->generateBarCodes($stocks);
            $this->entityManager->flush();
        } catch (\Error $e) {
            $this->entityManager->clear();
            return $this->json(['message' => 'Error while saving stocks', $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->json($stocks, Response::HTTP_OK, ['groups' => 'stocks:read']);
    }

    /**
     * @throws RandomException
     */
    private function generateUniqueId(): int
    {
        do {
            $id = random_int(1, PHP_INT_MAX);
            $existingStock = $this->entityManager->getRepository(Stocks::class)->find($id);
        } while ($existingStock !== null);

        return $id;
    }

    private function generateBarCodes($listStocks): void
    {
        $barcodeDirectory = $_ENV['BARCODE_PATH'] ?? 'C:\Users\timot\Documents\barcodes';

        if (!is_dir($barcodeDirectory)) {
            mkdir($barcodeDirectory, 0777, true);
        }

        try {
            $generator = new BarcodeGeneratorPNG();
            foreach ($listStocks as $stock) {
                $color = [255, 127, 0];
                $uuid = $stock->getId();
                $barcodeBase64 = base64_encode($generator->getBarcode($uuid, $generator::TYPE_CODE_128, 1, 50, $color));

                $pdfPath = $this->generatePdfForBarCode($stock->getId(), $barcodeBase64, $barcodeDirectory);
            }
        } catch (\Exception $e) {
            throw new \Error('Error while generating barcode: ' . $e->getMessage());
        }
    }

    private function generatePdfForBarCode(string $uuid, string $barcodeBase64, string $pdfDirectory): string
    {
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultPaperSize', 'custom');
        $options->set('dpi', 300);

        $dompdf = new Dompdf($options);

        $html = "
        <style>
            @page { margin: 0; }
            body { margin: 0; padding: 0; }
            .container {
                padding-top: 20px;
                padding-left: 10px;
                width: 8cm;
                height: 5cm;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden; /* Évite les débordements */
                background-color: black;
            }
        </style>
        <div class='container'>
            <img src='data:image/png;base64,$barcodeBase64' style='width: 100%; max-width: 7.8cm; height: auto; max-height: 4cm;' />
            <p style='font-size: 1em; margin-top: 0.5cm; text-align: center; color: #ff7f00'>$uuid</p>
        </div>
    ";


        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 226.77, 141.73]);

        $dompdf->render();

        $pdfPath = rtrim($pdfDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "barcode_$uuid.pdf";

        file_put_contents($pdfPath, $dompdf->output());

        return $pdfPath;
    }
}
