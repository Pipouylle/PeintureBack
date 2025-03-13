<?php

namespace App\Controller;

use App\Repository\OFsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class OfForSortieStockController extends AbstractController
{
    private $repository;

    public function __construct(OFsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SerializerInterface $serializer): Response
    {
        $ofs = $this->repository->findBeforSixMonth();

        return $this->json($ofs, Response::HTTP_OK, ['group', 'ofs:read']);
    }
}
