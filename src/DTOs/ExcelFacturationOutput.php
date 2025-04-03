<?php

namespace App\DTOs;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\DataProvider\ExcelFacturationProvider;
use Symfony\Component\Serializer\Annotation\Groups;

class ExcelFacturationOutput
{
    #[Groups(['excel:read'])]
    public int $annee;

    #[Groups(['excel:read'])]
    public int $mois;

    #[Groups(['excel:read'])]
    public string $chantier;

    #[Groups(['excel:read'])]
    public string $systeme;

    #[Groups(['excel:read'])]
    public string $commandeEureka;

    #[Groups(['excel:read'])]
    public string $libGre;

    #[Groups(['excel:read'])]
    public float $vaUnitGre;

    #[Groups(['excel:read'])]
    public int $qteGre;

    #[Groups(['excel:read'])]
    public float $vaTotalGre;

    #[Groups(['excel:read'])]
    public string $libC1;

    #[Groups(['excel:read'])]
    public float $vaUnitC1;

    #[Groups(['excel:read'])]
    public int $qteC1;

    #[Groups(['excel:read'])]
    public float $vaTotalC1;

    #[Groups(['excel:read'])]
    public string $libC2;

    #[Groups(['excel:read'])]
    public float $vaUnitC2;

    #[Groups(['excel:read'])]
    public int $qteC2;

    #[Groups(['excel:read'])]
    public float $vaTotalC2;

    #[Groups(['excel:read'])]
    public string $libC3;

    #[Groups(['excel:read'])]
    public float $vaUnitC3;

    #[Groups(['excel:read'])]
    public int $qteC3;

    #[Groups(['excel:read'])]
    public float $vaTotalC3;

    #[Groups(['excel:read'])]
    public string $libC4;

    #[Groups(['excel:read'])]
    public float $vaUnitC4;

    #[Groups(['excel:read'])]
    public int $qteC4;

    #[Groups(['excel:read'])]
    public float $vaTotalC4;

    #[Groups(['excel:read'])]
    public string $libRegieSFP;

    #[Groups(['excel:read'])]
    public float $vaUnitRegieSFP;

    #[Groups(['excel:read'])]
    public int $qteRegieSFP;

    #[Groups(['excel:read'])]
    public float $vaTotalRegieSFP;

    #[Groups(['excel:read'])]
    public string $libRegieFP;

    #[Groups(['excel:read'])]
    public float $vaUnitRegieFP;

    #[Groups(['excel:read'])]
    public int $qteRegieFP;

    #[Groups(['excel:read'])]
    public float $vaTotalRegieFP;
}