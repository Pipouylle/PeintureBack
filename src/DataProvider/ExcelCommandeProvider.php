<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelCommandeOutput;
use App\Entity\Commandes;
use Doctrine\ORM\EntityManagerInterface;

class ExcelCommandeProvider implements ProviderInterface
{

    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $commandes = $this->em->getRepository(Commandes::class)->findAll();

        $dtos = [];

        foreach ($commandes as $commande) {
            $dto = new ExcelCommandeOutput();
            $dto->eureka = $commande->getEurekaCommande();
            $dto->nomAffaire = $commande->getAffaireCommande()->getNomAffaire();
            $dto->numeroAffaire = $commande->getAffaireCommande()->getNumeroAffaire();
            $dto->nomSysteme = $commande->getSystemeCommande()->getNomSysteme();
            $dto->surface = $commande->getSurfaceCommande();
            $dto->tarifGrenaillage =  Floatval($commande->getGrenaillageCommande());
            $dto->tarifRegieFP =  Floatval($commande->getRegieFPCommande());
            $dto->tarifRegieSFP = Floatval($commande->getRegieSFPCommande());
            $couches = $commande->getCouches();
            $dto->tarifC1 = isset($couches[0]) ? Floatval($couches[0]->getTarifArticleCouche()) : 0.00;
            $dto->tarifC2 = isset($couches[1]) ? Floatval($couches[1]->getTarifArticleCouche()) : 0.00;
            $dto->tarifC3 = isset($couches[2]) ? Floatval($couches[2]->getTarifArticleCouche()) : 0.00;
            $dto->tarifC4 = isset($couches[3]) ? Floatval($couches[3]->getTarifArticleCouche()) : 0.00;

            $dtos[] = $dto;
        }

        return $dtos;
    }
}