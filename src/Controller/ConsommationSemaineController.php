<?php

namespace App\Controller;

use App\Repository\ConsommationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;


final class ConsommationSemaineController extends AbstractController
{
    private $repository;
    public function __construct(ConsommationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $SemaineId, SerializerInterface $serializer): Response
    {
        $explode = explode("/", $SemaineId);
        $id = (int) array_pop($explode);
        $ConsommationSemaine = $this->repository->findBySemaine($id);
        $json = $serializer->serialize($ConsommationSemaine, 'json', ['groups' => 'consommations:read']);
        return new JsonResponse($json, 200, [], true);
    }
}
