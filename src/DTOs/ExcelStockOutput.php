<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelStockOutput
{
    #[Groups(['excel:read'])]
    public int $id;

    #[Groups(['excel:read'])]
    public int $codeArticle;

    #[Groups(['excel:read'])]
    public string $dateEntree;

    #[Groups(['excel:read'])]
    public string $dateSortie;

    #[Groups(['excel:read'])]
    public string $numeroAffaire;

    #[Groups(['excel:read'])]
    public string $nomAffaire;

    #[Groups(['excel:read'])]
    public string $nomOperateur;

    #[Groups(['excel:read'])]
    public int $idOf;

    #[Groups(['excel:read'])]
    public string $nomSysteme;

    #[Groups(['excel:read'])]
    public string $typeSysteme;


}