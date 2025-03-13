<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Stocks;
use App\Repository\StocksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Picqer\Barcode\BarcodeGeneratorHTML;
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
            $id = random_int(1, 9007199254740991);
            $existingStock = $this->entityManager->getRepository(Stocks::class)->find($id);
        } while ($existingStock !== null);

        return $id;
    }

    private function generateBarCodes($listStocks): void
    {
        $barcodeDirectory = $_ENV['BARCODE_PATH'] ?? 'C:\Users\timot\Documents\barcodes';
        $namePrinter = $_ENV['NAME_PRINTER'] ?? 'Microsoft Print to PDF';

        if (!is_dir($barcodeDirectory)) {
            mkdir($barcodeDirectory, 0777, true);
        }

        try {
            $article = $this->entityManager->getRepository(Articles::class)->findOneBy(['id' => $listStocks[0]->getArticleStock()->getId()]);
            $generator = new BarcodeGeneratorPNG();
            foreach ($listStocks as $stock) {
                $color = [0, 0, 0];
                $uuid = $stock->getId();
                $barcodeBase64 = base64_encode($generator->getBarcode($uuid, $generator::TYPE_CODE_128, 23, 500, $color));

                $pdfPath = $this->generatePdfForBarCode($stock->getId(),$article, $barcodeBase64, $barcodeDirectory);

                $commande = "lp -d " . escapeshellarg($namePrinter) . " -o page-ranges=1 " . escapeshellarg($pdfPath);

                /*
                $output = exec($commande);

                if ($output !== null) {
                    echo "Impression lancée avec succès.<br>";
                    if (file_exists($fichier)) {
                        if (unlink($fichier)) {
                            echo "Fichier supprimé avec succès.";
                        } else {
                            echo "Erreur lors de la suppression du fichier.";
                        }
                    } else {
                        echo "Le fichier n'existe pas.";
                    }
                } else {
                    echo "Erreur lors de l'impression.";
                }
                */


                //TODO: imprimer
            }
        } catch (\Exception $e) {
            throw new \Error('Error while generating barcode: ' . $e->getMessage());
        }
    }

    private function generatePdfForBarCode(string $uuid,Articles $articles, string $barcodeBase64, string $pdfDirectory): string
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
            @page { margin: 0; size: A4; }
            body { margin: 0; padding: 0; }
            .container {
                margin-top: 500px;
                margin-right: 500px;
                height: 2500px;
                width: 3400px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #ff0000;
                transform: rotate(90deg);
            }
        </style>
        <div class='container'>
        <img src='data:image/png;base64,$barcodeBase64' style='width: auto; height: auto; margin-top: 1em'/>
            <p style='font-size: 4em; margin-top: 0.2cm; text-align: center; color: rgb(0,0,0)'>$uuid</p>
            <p style='font-size: 3em; text-align: center; color: rgb(0,0,0)'>{$articles->getDesignationArticle()}</p>
            <p style='font-size: 3em; text-align: center; color: rgb(0,0,0)'>{$articles->getRalArticle()}</p>
        </div>
    ";

        //
        $dompdf->loadHtml($html);

        $dompdf->render();

        $pdfPath = rtrim($pdfDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "barcode_$uuid.pdf";

        file_put_contents($pdfPath, $dompdf->output());

        return $pdfPath;
    }
}
