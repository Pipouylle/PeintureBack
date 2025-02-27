<?php

namespace App\Controller;

use App\Repository\ArticleCoucheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ArticleCoucheBySystemeController extends AbstractController
{
    private $repository;
    public function __construct(ArticleCoucheRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $systemeId, int $commandeId, SerializerInterface $serializer): Response
    {
        $response = $this->repository->getBySystemeIdAndCommandeId($systemeId, $commandeId);
        $json = $serializer->serialize($response, 'json', ['groups' => 'articleCoucheForDemande:read']);
        return new JsonResponse($json, 200, [], true);
    }
}
