<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello', name: 'hello')]
final class HelloController extends AbstractController
{
    public function __invoke(): JsonResponse
    {
        return $this->json(['message' => 'Hello from Symfony + RoadRunner!']);
    }
}
