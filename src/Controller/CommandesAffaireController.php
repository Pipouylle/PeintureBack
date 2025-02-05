<?php

namespace App\Controller;

use App\Repository\AffairesRepository;
use App\Repository\CommandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandesAffaireController extends AbstractController
{
    private $repository;
    public function __construct(CommandesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

}