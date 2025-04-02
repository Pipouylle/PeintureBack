<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelFournisseurOutput
{
    #[Groups(['excel:read'])]
    public string $nomFournisseur;
}