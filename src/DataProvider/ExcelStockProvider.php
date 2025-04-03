<?php

namespace App\DataProvider;

use App\DTOs\ExcelStockOutput;
use App\Entity\Stocks;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;

class ExcelStockProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $stocks = $this->em->getRepository(Stocks::class)->findAll();

        $dtos = [];

        foreach ($stocks as $stock) {
            $dto = new ExcelStockOutput();
            $dto->id = $stock->getId();
            $dto->dateEntree = $stock->getDateStockStock()->format('Y-m-d H:i:s');
            $dto->numeroAffaire = $stock->getOfStock() !== null ? $stock->getOfStock()->getIdDemandeOf()->getCommandeDemande()->getAffaireCommande()->getNomAffaire() : 'N/A';
            $dto->nomAffaire = $stock->getOfStock() !== null ? $stock->getOfStock()->getIdDemandeOf()->getCommandeDemande()->getAffaireCommande()->getNumeroAffaire() : 'N/A';
            $dto->codeArticle = $stock->getArticleStock()->getId();
            $dto->nomOperateur = $stock->getUserStock() !== null ? $stock->getUserStock()->getNameUser() : 'N/A';

            $dto->dateSortie = $stock->getDateSortieStock() !== null ? $stock->getDateSortieStock()->format('Y-m-d H:i:s') : 'N/A';
            $dto->idOf = $stock->getOfStock() !== null ? $stock->getOfStock()->getId() : 0;
            $dto->nomSysteme = $stock->getOfStock() !== null ? $stock->getOfStock()->getIdDemandeOf()->getCommandeDemande()->getSystemeCommande()->getNomSysteme() : 'N/A';
            $dto->typeSysteme = $stock->getOfStock() !== null ? $stock->getOfStock()->getIdDemandeOf()->getCommandeDemande()->getSystemeCommande()->getTypeSysteme() : 'N/A';
            // Add other fields as needed

            $dtos[] = $dto;
        }

        return $dtos;
    }
}