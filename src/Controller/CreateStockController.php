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
            $generatedId = $this->generateUniqueId();
            $newStock->setId($generatedId);
            $newStock->setArticleStock($article);
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
            foreach ($listStocks as $stock) {
                $uuid = $stock->getId();

                $pdfPath = $this->generateZplForBarCode($uuid,$article, $barcodeDirectory);

                $commande = "lp -d " . escapeshellarg($namePrinter) . " -o raw " . escapeshellarg($pdfPath);

                $output = exec($commande);

                if ($output !== null) {
                    echo "Impression lancée avec succès.<br>";
                    if (file_exists($pdfPath)) {
                        if (unlink($pdfPath)) {
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
            }
        } catch (\Exception $e) {
            throw new \Error('Error while generating barcode: ' . $e->getMessage());
        }
    }

    private function generateZplForBarCode(string $uuid, Articles $articles, string $pdfDirectory): string
    {
        $articleId = $articles->getId();
        $articleDesignation = $articles->getDesignationArticle();
        $articleRal = $articles->getRalArticle();
        $zpl = "^XA
        ^FO180,30^BCN,80,Y,N,N^FD$uuid^FS
        ^FO100,130^A0N,50,50^FD$uuid^FS
        ^FO300,190^A0N,50,50^FD$articleId^FS
        ^FO100,250^A0N,50,50^FD$articleDesignation^FS
        ^FO200,310^A0N,50,50^FD$articleRal^FS
    ^XZ";

        $pdfPath = rtrim($pdfDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "barcode_$uuid.zpl";

        file_put_contents($pdfPath, $zpl);

        return $pdfPath;
    }
}
