<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelAffaireOutput;
use App\Entity\Affaires;
use Doctrine\ORM\EntityManagerInterface;

class ExcelAffaireProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ){}


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $affaires = $this->em->getRepository(Affaires::class)->findAll();

        $dtos = [];

        foreach ($affaires as $affaire) {
            $dto = new ExcelAffaireOutput();
            $dto->nomAffaire = $affaire->getNomAffaire();
            $dto->numeroAffaire = $affaire->getNumeroAffaire();

            $dtos[] = $dto;
        }

        return $dtos;
    }
}