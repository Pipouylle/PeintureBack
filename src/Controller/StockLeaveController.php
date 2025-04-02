<?php

namespace App\Controller;

use App\Entity\OFs;
use App\Entity\Stocks;
use App\Entity\Users;
use App\Repository\StocksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class StockLeaveController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct(StocksRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $id, Request $request, SerializerInterface $serializer): Response
    {
        $stock = $this->repository->find($id);

        $data = json_decode($request->getContent(), true);

        $stock->setOfStock($this->entityManager->getRepository(OFs::class)->find(basename($data['ofStock'])));
        $stock->setDateSortieStock(new \DateTime());
        $stock->setUserStock($this->entityManager->getRepository(Users::class)->find(basename($data['userStock'])));

        $this->entityManager->persist($stock);
        $this->entityManager->flush();

        return $this->json($stock, 200, [], ['groups' => 'stocks:read']);
    }
}
