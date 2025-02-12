<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ArticleCoucheByDemandeController extends AbstractController
{
    private $repository;
    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $demandeId): Response
    {
        $response = $this->repository->findArticleCoucheByIdDemande($demandeId);
        return new JsonResponse($response);
    }
}
