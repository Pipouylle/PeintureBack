<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Entity\OFs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GetPreviousAvancementController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $demandeId, int $ofId): Response
    {
        $of = $this->entityManager->getRepository(OFs::class)->find($ofId);

        if (!$of) {
            return $this->json(['message' => 'OF not found'], Response::HTTP_NOT_FOUND);
        }

        $response = $this->entityManager->getRepository(Demandes::class )->getPreviousAvancement($demandeId, $of->getJourOf()->getId(), $of->getSemaineOf()->getId());

        return $this->json($response, 200);
    }
}
