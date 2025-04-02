<?php

namespace App\DTOs;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;
class ExcelAffaireOutput
{
    #[Groups(['excel:read'])]
    public string $nomAffaire;

    #[Groups(['excel:read'])]
    public string $numeroAffaire;
}