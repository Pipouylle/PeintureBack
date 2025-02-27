<?php

namespace App\Controller;

use App\Repository\ArticleCoucheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class ArticleCoucheByCommandeController extends AbstractController
{
    private $repository;
    public function __construct(ArticleCoucheRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $CommandeId, SerializerInterface $serializer): Response
    {
        $response = $this->repository->findArticleCoucheForDemande($CommandeId);
        $json = $serializer->serialize($response, 'json', ['groups' => 'articleCoucheForDemande:read']);
        return new JsonResponse($json, 200, [], true);
    }
}
