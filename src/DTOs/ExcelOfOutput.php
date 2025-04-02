<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelOfOutput
{
    #[Groups(['excel:read'])]
    public int $id;

    #[Groups(['excel:read'])]
    public string $nomAffaire;

    #[Groups(['excel:read'])]
    public string $numeroAffaire;

    #[Groups(['excel:read'])]
    public string $numeroDemande;

    #[Groups(['excel:read'])]
    public string $eurekaCommande;

    #[Groups(['excel:read'])]
    public string $nomSysteme;

    #[Groups(['excel:read'])]
    public int $avancement;

    #[Groups(['excel:read'])]
    public int $regieSFP;

    #[Groups(['excel:read'])]
    public int $regieFP;

    #[Groups(['excel:read'])]
    public string $jour;

    #[Groups(['excel:read'])]
    public int $idSemaine;
}