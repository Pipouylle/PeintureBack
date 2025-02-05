<?php

namespace App\Controller;

use App\Entity\Affaires;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


use App\Repository\AffairesRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class AffairesController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('api/affaires2', name: 'app_affaires', methods: ['GET'])]
    public function index(AffairesRepository $repository): Response
    {
        $affaires = $repository->findAll();
        return $this->json($affaires);
    }
}
