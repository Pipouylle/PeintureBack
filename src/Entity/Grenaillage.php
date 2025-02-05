<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GrenaillageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: GrenaillageRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['grenaillage:read']],
    denormalizationContext: ['groups' => ['grenaillage:write']]
)]
class Grenaillage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['grenaillage:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['grenaillage:read', 'grenaillage:write'])]
    #[SerializedName('nomGrenaillage')]
    private ?string $nom_grenaillage = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['grenaillage:read', 'grenaillage:write'])]
    #[SerializedName('typeChantierGrenaillage')]
    private ?string $typeChantier_grenaillage = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['grenaillage:read', 'grenaillage:write'])]
    #[SerializedName('tarifGrenaillage')]
    private ?string $tarif_grenaillage = null;

    #[ORM\OneToMany(targetEntity: Systemes::class, mappedBy: 'grenaillage_systeme', cascade: ['persist', 'remove'])]
    #[Groups(['grenaillage:read'])]
    private ?Collection $systemes_grenaillage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGrenaillage(): ?string
    {
        return $this->nom_grenaillage;
    }

    public function setNomGrenaillage(?string $nom_grenaillage): static
    {
        $this->nom_grenaillage = $nom_grenaillage;

        return $this;
    }

    public function getTypeChantierGrenaillage(): ?string
    {
        return $this->typeChantier_grenaillage;
    }

    public function setTypeChantierGrenaillage(?string $typeChantier_grenaillage): static
    {
        $this->typeChantier_grenaillage = $typeChantier_grenaillage;

        return $this;
    }

    public function getTarifGrenaillage(): ?string
    {
        return $this->tarif_grenaillage;
    }

    public function setTarifGrenaillage(?string $tarif_grenaillage): static
    {
        $this->tarif_grenaillage = $tarif_grenaillage;

        return $this;
    }

    public function getSystemesGrenaillage(): Collection
    {
        return $this->systemes_grenaillage;
    }

    public function addSystemeGrenaillage(?Systemes $systeme_grenaillage): static
    {
        if ($this->systemes_grenaillage->contains($systeme_grenaillage)) {
            $this->systemes_grenaillage[] = $systeme_grenaillage;
            $systeme_grenaillage->setGrenaillageSysteme($this);
        }
        return $this;
    }

    public function removeSystemeGrenaillage(?Systemes $systeme_grenaillage): static
    {
        if ($this->systemes_grenaillage->removeElement($systeme_grenaillage)) {
            if ($systeme_grenaillage->getGrenaillageSysteme() === $this) {
                $systeme_grenaillage->setGrenaillageSysteme(null);
            }
        }
        return $this;
    }
}
