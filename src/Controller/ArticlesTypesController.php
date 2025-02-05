<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

final class ArticlesTypesController extends AbstractController
{
    private $repository;

    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): JsonResponse
    {
        $types = $this->repository->findTypes();
        $mappedCategories = array_map(function($type) {
            return ['typeArticle' => $type['type_article']];
        }, $types);
        return new JsonResponse($mappedCategories);
    }
}