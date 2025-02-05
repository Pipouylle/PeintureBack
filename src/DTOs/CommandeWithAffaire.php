<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CommandeWithAffaire
{
    #[SerializedName('idCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public int $id;

    #[SerializedName('eurekaCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $eureka_commande = null;

    #[SerializedName('idAffaireCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?int $idAffaire_commande = null;

    #[SerializedName('numeroAffaire')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $numero_affaire = null;

    #[SerializedName('nomAffaire')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $nom_affaire = null;

    #[SerializedName('idSystemeCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?int $idSysteme_commande = null;

    #[SerializedName('nomSysteme')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $nom_systeme = null;

    #[SerializedName('commentaireCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $commentaire_commande = null;

    #[SerializedName('regieSFPCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $regieSFP_commande = null;

    #[SerializedName('regieFPCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $regieFP_commande = null;

    #[SerializedName('ficheHCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?bool $ficheH_commande = null;

    #[SerializedName('tarifFichehCommande')]
    #[Groups(['commandesAffairesSystemes:read'])]
    public ?string $tarifFicheH_commande = null;
}