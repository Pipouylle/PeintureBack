<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Entity\OFs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class DemandeNotFinishController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(SerializerInterface $serializer): Response
    {
        $demande = $this->entityManager->getRepository(Demandes::class)->getAllDemandesNotFinish();

        return $this->json($demande, 200, [], ['groups' => 'demandes:read']);
    }
}
