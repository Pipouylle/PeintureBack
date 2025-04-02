<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelDemandeOutput
{
    #[Groups(['excel:read'])]
    public string $numero;

    #[Groups(['excel:read'])]
    public string $numeroAffaire;

    #[Groups(['excel:read'])]
    public string $nomAffaire;

    #[Groups(['excel:read'])]
    public string $numeroEureka;

    #[Groups(['excel:read'])]
    public string $nomSysteme;

    #[Groups(['excel:read'])]
    public string $typeSysteme;

    #[Groups(['excel:read'])]
    public string $date;

    #[Groups(['excel:read'])]
    public int $surface;

    #[Groups(['excel:read'])]
    public int $avancement;

    #[Groups(['excel:read'])]
    public int $avancementSurface;

    #[Groups(['excel:read'])]
    public int $nombrePieces;

    #[Groups(['excel:read'])]
    public string $commentaire;

    #[Groups(['excel:read'])]
    public string $etat;
}