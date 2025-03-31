<?php

namespace App\Controller;

use App\Repository\OFsRepository;
use App\Repository\StocksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class OfOperateurViewController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct(OFsRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $semaineId, int $jourId, SerializerInterface $serializer)
    {
        $ofs = $this->repository->getForOperateurView($semaineId, $jourId);

        return $this->json($ofs, 200, [], ['groups' => 'ofsOperateurView:read']);

    }
}
