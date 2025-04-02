<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Repository\DemandesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class DemandeAllAvancementController extends AbstractController
{
    private $repository;
    public function __construct(DemandesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SerializerInterface $serializer): Response
    {
        $demande = $this->repository->getAllAvancements();

        return $this->json($demande, 200, []);
    }
}
