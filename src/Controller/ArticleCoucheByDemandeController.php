<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class ArticleCoucheByDemandeController extends AbstractController
{
    private $repository;
    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $demandeId, SerializerInterface $serializer): Response
    {
        $response = $this->repository->getArticleCoucheByIdDemande($demandeId);
        $json = $serializer->serialize($response, 'json', ['groups' => 'articleCoucheForDemande:read']);
        return new JsonResponse($response);
    }
}
