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

    public function __invoke(int $demandeId): Response
    {
        $response = $this->entityManager->getRepository(Demandes::class )->getPreviousAvancement($demandeId);

        return $this->json($response, 200);
    }
}
