<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelAffaireOutput;
use App\DTOs\ExcelFournisseurOutput;
use App\Entity\Affaires;
use App\Entity\Fournisseur;
use Doctrine\ORM\EntityManagerInterface;

class ExcelFournisseurProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ){}


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $fournsseurs = $this->em->getRepository(Fournisseur::class)->findAll();

        $dtos = [];

        foreach ($fournsseurs as $fournisseur) {
            $dto = new ExcelFournisseurOutput();
            $dto->nomFournisseur = $fournisseur->getNomFournisseur();

            $dtos[] = $dto;
        }

        return $dtos;
    }
}