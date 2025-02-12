<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\CommandeWithAffaire;
use App\Entity\Commandes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CommandeAffairesSystemesProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ){
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $commandes = $this->entityManager->getRepository(Commandes::class)->CommandesAffairesSystemes();
        $dtos = [];

        foreach ($commandes as $commande) {
            $dto = new CommandeWithAffaire();
            $dto->id = $commande["id"];
            $dto->eureka_commande = $commande["eureka_commande"];
            $dto->idAffaire_commande = $commande["affaire_commande"]["id"];
            $dto->nom_affaire = $commande["affaire_commande"]["nom_affaire"];
            $dto->numero_affaire = $commande["affaire_commande"]["numero_affaire"];
            $dto->idSysteme_commande = $commande["systeme_commande"]["id"];
            $dto->nom_systeme = $commande["systeme_commande"]["nom_systeme"];
            $dto->commentaire_commande = $commande["commentaire_commande"];
            $dto->regieFP_commande = $commande["regieFP_commande"];
            $dto->regieSFP_commande = $commande["regieSFP_commande"];
            $dto->ficheH_commande = $commande["ficheH_commande"];
            $dto->pvPeinture_commande = $commande["pvPeinture_commande"];
            $dtos[] = $dto;
        }
        return $dtos;

    }
}