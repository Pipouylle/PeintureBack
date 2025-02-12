<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\DemandesCalendar;
use App\Entity\Demandes;
use App\Entity\OFs;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Scalar\String_;

class DemandesCalendarProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $demandes = $this->entityManager->getRepository(Demandes::class)->findDemandesForCalendar();
        $dtos = [];
        foreach ($demandes as $demande) {
            $dto = new DemandesCalendar();
            $dto->id = $demande["id"];
            $dto->numero_demande = $demande["numero_demande"];
            $dto->id_affaire = $demande["commande_demande"]["affaire_commande"]["id"];
            $dto->numero_affaire = $demande["commande_demande"]["affaire_commande"]["numero_affaire"];
            $dto->nom_affaire = $demande["commande_demande"]["affaire_commande"]["nom_affaire"];
            $dto->id_systeme = $demande["commande_demande"]["systeme_commande"]["id"];
            $dto->date_demande = $demande["date_demande"];
            $dto->nom_systeme = $demande["commande_demande"]["systeme_commande"]["nom_systeme"];
            $dto->surface_demande = $demande["surface_demande"];
            $dto->nombrePiece_demande = $demande["nombrePiece_demande"];
            $dto->etat_demande = $demande["etat_demande"];
            $of = $this->entityManager->getRepository(OFs::class)->findBy(["idDemande_of" => "/api/demandes/" . $demande["id"]]);
            $dto->avancementTotal = array_sum(array_map(fn($o) => $o->getAvancementOf(), $of));
            $dtos[] = $dto;
        }
        return $dtos;
    }
}