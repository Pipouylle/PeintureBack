<?php

namespace App\Controller;

use App\Repository\StocksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

final class StockUnLeaveController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct(StocksRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $id, SerializerInterface $serializer)
    {
        $stock = $this->repository->find($id);

        $stock->setOfStock(null);
        $stock->setDateSortieStock(null);
        $stock->setUserStock(null);

        $this->entityManager->persist($stock);
        $this->entityManager->flush();

        return $this->json($stock, 200, [], ['groups' => 'stocks:read']);
    }
}
