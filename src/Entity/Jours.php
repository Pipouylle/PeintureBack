<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\JoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: JoursRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['jours:read']],
    denormalizationContext: ['groups' => ['jours:write']]
)]
class Jours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['jours:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['jours:read', 'jours:write'])]
    #[SerializedName('jour')]
    private ?string $jour = null;

    #[ORM\OneToMany(targetEntity: OFs::class, mappedBy: 'jour_savOfs')]
    #[Groups(['jours:read'])]
    #[SerializedName('ofsJour')]
    private Collection $ofs_jour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(?string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOfsJour(): Collection
    {
        return $this->ofs_jour;
    }

    public function addOf(?OFs $savOf): static
    {
        if (!$this->ofs_jour->contains($savOf)) {
            $this->ofs_jour[] = $savOf;
            $savOf->setJourOf($this);
        }

        return $this;
    }

    public function removeOf(?OFs $savOf): static
    {
        if ($this->ofs_jour->removeElement($savOf)) {
            if ($savOf->getJourOf() === $this) {
                $savOf->setJourOf(null);
            }
        }

        return $this;
    }
}
