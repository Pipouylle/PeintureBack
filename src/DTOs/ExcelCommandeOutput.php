<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelCommandeOutput
{
    #[Groups(['excel:read'])]
    public string $eureka;

    #[Groups(['excel:read'])]
    public string $numeroAffaire;

    #[Groups(['excel:read'])]
    public string $nomAffaire;

    #[Groups(['excel:read'])]
    public string $nomSysteme;

    #[Groups(['excel:read'])]
    public float $tarifGrenaillage;

    #[Groups(['excel:read'])]
    public float $tarifC1;

    #[Groups(['excel:read'])]
    public float $tarifC2;

    #[Groups(['excel:read'])]
    public float $tarifC3;

    #[Groups(['excel:read'])]
    public float $tarifC4;

    #[Groups(['excel:read'])]
    public float $tarifRegieSFP;

    #[Groups(['excel:read'])]
    public float $tarifRegieFP;

    #[Groups(['excel:read'])]
    public int $surface;
}