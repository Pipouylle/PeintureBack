<?php

namespace App\DTOs;

use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class SemainesInput {
    #[Groups(['semaines:write'])]
    #[SerializedName('annees')]
    public ?int $annees = null;

    #[Groups(['semaines:write'])]
    #[SerializedName('mois')]
    public ?int $mois = null;

    #[Groups(['semaines:write'])]
    #[SerializedName('semaine')]
    public ?int $semaine = null;

    #[Groups(['semaines:write'])]
    #[SerializedName('dateDebutSemaine')]
    public ?string $dateDebut_semaine = null;
}