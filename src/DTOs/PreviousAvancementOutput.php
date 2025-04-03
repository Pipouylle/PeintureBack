<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;

class PreviousAvancementOutput
{
    #[Groups(['previousAvancement:read'])]
    public int $demandeId;

    #[Groups(['previousAvancement:read'])]
    public int $avancement;

    #[Groups(['previousAvancement:read'])]
    public int $avancementC1;

    #[Groups(['previousAvancement:read'])]
    public int $avancementC2;

    #[Groups(['previousAvancement:read'])]
    public int $avancementC3;

    #[Groups(['previousAvancement:read'])]
    public int $avancementC4;
}