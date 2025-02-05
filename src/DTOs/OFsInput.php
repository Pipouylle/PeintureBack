<?php

namespace App\DTOs;

use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class OFsInput
{
    #[Groups(['ofs:write'])]
    #[Assert\NotBlank]
    #[SerializedName('cabineOF')]
    public ?string $cabine_of = null;

    #[Groups(['ofs:write'])]
    #[Assert\NotBlank]
    #[Assert\DateTime(format: 'Y-m-d')]
    #[SerializedName('dateOf')]
    public ?string $date_of = null;

    #[Groups(['ofs:write'])]
    #[Assert\NotBlank]
    #[SerializedName('avancementOf')]
    public ?string $avancement_of = null;

    #[Groups(['ofs:write'])]
    #[Assert\NotBlank]
    #[SerializedName('demandeOf')]
    public ?string $idDemande_of = null; // ID de la demande associée
}