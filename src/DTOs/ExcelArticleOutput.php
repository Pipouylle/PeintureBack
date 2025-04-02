<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class ExcelArticleOutput
{
    #[Groups(['excel:read'])]
    public int $code;

    #[Groups(['excel:read'])]
    public string $designation;

    #[Groups(['excel:read'])]
    public string $ral;

    #[Groups(['excel:read'])]
    public string $nomFournisseur;
}