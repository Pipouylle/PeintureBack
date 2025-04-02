<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelDemandeOutput;
use App\Entity\Demandes;
use Doctrine\ORM\EntityManagerInterface;

class ExcelDemandeProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $demandes = $this->em->getRepository(Demandes::class)->findAll();

        $dtos = [];

        foreach ($demandes as $demande) {
            $dto = new ExcelDemandeOutput();
            $dto->numero = $demande->getNumeroDemande();
            $dto->numeroAffaire = $demande->getCommandeDemande()->getAffaireCommande()->getNumeroAffaire();
            $dto->nomAffaire = $demande->getCommandeDemande()->getAffaireCommande()->getNomAffaire();
            $dto->numeroEureka = $demande->getCommandeDemande()->getEurekaCommande();
            $dto->surface =  $demande->getSurfaceDemande();
            $dto->etat = $demande->getEtatDemande();
            $dto->commentaire = $demande->getCommentaireDemande();
            $dto->nombrePieces = $demande->getNombrePieceDemande();
            $avancement = 0;
            $ofs = $demande->getOfs();
            foreach ($ofs as $of) {
                $avancement += $of->getAvancementOf();
            }
            $dto->avancement = $avancement;

            $dtos[] = $dto;
        }

        return $dtos;
    }
}