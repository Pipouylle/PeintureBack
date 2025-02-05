<?php

namespace App\Controller;

use App\Entity\Affaires;
use App\Entity\Articles;
use App\Entity\Couches;
use App\Entity\Systemes;
use App\Repository\CouchesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CouchesController extends AbstractController{
    #[Route('/couches', name: 'app_couches', methods: ['GET'])]
    public function index(CouchesRepository $repository): Response
    {
        $couches = $repository->findAll();
        return $this->json($couches);
    }

    #[Route('/couches/put', name: 'CreerCouche', methods: ['POST'])]
    public function CreerCouche(Request $request ,EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        if (!isset($data['tarifCouche']) || !isset($data['surfaceCouche']) || !isset($data['epaisseurCouche'])) {
            return new JsonResponse(['error' => 'Invalid data'], 400);
        }

        $couche = new Couches();
        $couche->setSurfaceCouche($data['surfaceCouche']);
        $couche->setEpaisseurCouche($data['epaisseurCouche']);
        $couche->setTarifCouche($data['tarifCouche']);


        if (isset($data['codeArticleCouche'])) {
            $dataArticle = $data['codeArticleCouche'];
            $article = $entityManager->getRepository(Articles::class)->findOneBy(['id' => $dataArticle['id']]);
            $article->addCouchesArticle($couche);
            $entityManager->persist($article);
        }
        if (isset($data['systemeCouche'])) {
            $dataSysteme = $data['systemeCouche'];
            $systeme = $entityManager->getRepository(Systemes::class)->findOneBy(['id' => $dataSysteme['id']]);
            $systeme->addCouchesSyteme($couche);
            $entityManager->persist($systeme);
        }

        $entityManager->persist($couche);
        $entityManager->flush();

        return new JsonResponse($couche, 201);
    }
}
