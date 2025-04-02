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
    public int $surface;

    #[Groups(['excel:read'])]
    public int $nombrePieces;

    #[Groups(['excel:read'])]
    public string $commentaire;

    #[Groups(['excel:read'])]
    public string $etat;

    #[Groups(['excel:read'])]
    public int $avancement;
}