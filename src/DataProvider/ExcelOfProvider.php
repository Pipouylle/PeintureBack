<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelOfOutput;
use App\Entity\OFs;
use Doctrine\ORM\EntityManagerInterface;

class ExcelOfProvider implements ProviderInterface
{

    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $ofs = $this->em->getRepository(OFs::class)->findAll();

        $dtos = [];

        foreach ($ofs as $of) {
            $dto = new ExcelOfOutput();
            $dto->id = $of->getId();
            $dto->jour = $of->getJourOf()->getJour();
            $dto->nomAffaire = $of->getIdDemandeOf()->getCommandeDemande()->getAffaireCommande()->getNomAffaire();
            $dto->numeroAffaire = $of->getIdDemandeOf()->getCommandeDemande()->getAffaireCommande()->getNumeroAffaire();
            $dto->nomSysteme = $of->getIdDemandeOf()->getCommandeDemande()->getSystemeCommande()->getNomSysteme();
            $dto->idSemaine = $of->getSemaineOf()->getId();
            $dto->avancement = $of->getAvancementOf();
            $dto->regieSFP = $of->getRegieSFPOf();
            $dto->regieFP = $of->getRegieFPOf();

            $dtos[] = $dto;
        }

        return $dtos;
    }
}