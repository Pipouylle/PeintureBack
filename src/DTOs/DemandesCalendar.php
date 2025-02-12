<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

class DemandesCalendar
{
    #[SerializedName('idDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?int $id = null;
    #[SerializedName('numeroDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $numero_demande = null;
    #[SerializedName('idAffaire')]
    #[Groups(['demandesCalendar:read'])]
    public ?int $id_affaire = null;

    #[SerializedName('numeroAffaire')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $numero_affaire = null;

    #[SerializedName('nomAffaire')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $nom_affaire = null;

    #[SerializedName('idSysteme')]
    #[Groups(['demandesCalendar:read'])]
    public ?int $id_systeme = null;

    #[SerializedName('nomSysteme')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $nom_systeme = null;

    #[SerializedName('surfaceDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $surface_demande = null;

    #[SerializedName('nombrePieceDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?int $nombrePiece_demande = null;

    #[SerializedName('dateDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?\DateTimeInterface $date_demande = null;

    #[SerializedName('etatDemande')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $etat_demande = null;

    #[SerializedName('avancementTotal')]
    #[Groups(['demandesCalendar:read'])]
    public ?string $avancementTotal = null;
}