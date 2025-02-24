<?php

namespace App\Controller;

use App\Repository\AvancementSurfaceCouchesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class AllAvancementSemaineController extends AbstractController
{
    private $repository;
    public function __construct(AvancementSurfaceCouchesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $semaineId, SerializerInterface $serializer): Response
    {
        $response = $this->repository->findBySemaine($semaineId);
        return $this->json($response);
    }
}
