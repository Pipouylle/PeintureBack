<?php

namespace App\Controller;

use App\Entity\Affaires;
use App\Entity\Systemes;
use App\Repository\SystemesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SystemesController extends AbstractController
{
    #[Route('/systemes', name: 'app_systemes', methods: ['GET'])]
    public function index(SystemesRepository $repository): Response
    {
        $systemes = $repository->findAll();
        return $this->json($systemes);
    }

    #[Route('/systemes/put', name: 'CreerSysteme', methods: ['POST'])]
    public function CreerSysteme(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['nomSysteme']) ||
            !isset($data['grenaillageSysteme']) ||
            !isset($data['regieSFPSysteme']) ||
            !isset($data['refieFPSysteme'])) {
            return new JsonResponse(['error' => 'Invalid data'], 400);
        }

        $systeme = new Systemes();
        $systeme->setNomSysteme($data['nomSysteme']);
        $systeme->setGrenaillageSysteme($data['grenaillageSysteme']);
        $systeme->setRegieSFPSysteme($data['regieSFPSysteme']);
        $systeme->setRegieFPSysteme($data['refieFPSysteme']);

        if (isset($data['idAffaireSysteme'])){
            $dataAffaire = $data['idAffaireSysteme'];
            $affaire = $entityManager->getRepository(Affaires::class)->findOneBy(['id' => $dataAffaire['id']]);
            $affaire->addSysteme($systeme);
            $entityManager->persist($affaire);
        }

        $entityManager->persist($systeme);
        $entityManager->flush();

        return new JsonResponse($systeme, 201);
    }
}
