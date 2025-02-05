<?php

namespace App\Controller;

use App\Repository\CouchesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CoucheByDemandeIdController extends AbstractController
{
    private $repository;
    public function __construct(CouchesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $demandeId): Response
    {
        $response = $this->repository->findByDemandeId($demandeId);
        // TODO: Implement __invoke() method.
        return new JsonResponse($response);
    }
}
