<?php

namespace App\Controller;

use App\Repository\OFsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OfCalendarController extends AbstractController
{
    private $repository;

    public function __construct(OFsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $SemaineId): Response
    {

        // TODO: Implement __invoke() method.
    }
}
