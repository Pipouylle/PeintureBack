<?php

namespace App\Controller;

use App\Repository\ConsommationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ConsommationSemaineController extends AbstractController
{
    private $repository;
    public function __construct(ConsommationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $SemaineId): Response
    {
        $explode = explode("/", $SemaineId);
        $id = (int) array_pop($explode);
        $ConsommationSemaine = $this->repository->findBySemaine($id);
        // TODO: Implement __invoke() method.
        return new JsonResponse($ConsommationSemaine);
    }
}
