<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\DTOs\SemainesInput;
use App\Processors\SemainesProcessor;
use App\Repository\SemainesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: SemainesRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Patch(
            uriTemplate: '/semaines/{id}',
            normalizationContext: ['groups' => ['semaines:read']],
            denormalizationContext: ['groups' => ['semainesUpdate:write']],
        ),
    ],
    normalizationContext: ['groups' => ['semaines:read']],
    denormalizationContext: ['groups' => ['semaines:write']],
    input: SemainesInput::class,
    paginationEnabled: false,
    processor: SemainesProcessor::class
)]
#[ApiFilter(SearchFilter::class, properties: ['annees' => 'exact', 'mois' => 'exact', 'semaine' => 'exact'])]
class Semaines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['semaines:read', 'ofsOperateurView:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['semaines:read', 'semaines:write', 'semainesUpdate:write', 'ofsOperateurView:read'])]
    #[SerializedName('annees')]
    private ?int $annees = null;

    #[ORM\Column]
    #[Groups(['semaines:read', 'semaines:write', 'semainesUpdate:write', 'ofsOperateurView:read'])]
    #[SerializedName('mois')]
    private ?int $mois = null;

    #[ORM\Column]
    #[Groups(['semaines:read', 'semaines:write', 'ofsOperateurView:read'])]
    #[SerializedName('semaine')]
    private ?int $semaine = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['semaines:read', 'semaines:write', 'ofsOperateurView:read'])]
    #[SerializedName('dateDebutSemaine')]
    private ?\DateTimeInterface $dateDebut_semaine = null;

    #[ORM\OneToMany(targetEntity: OFs::class, mappedBy: 'semaine_of')]
    #[Groups(['semaines:read'])]
    #[SerializedName('ofsSemaine')]
    private Collection $ofs_semaine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnees(): ?int
    {
        return $this->annees;
    }

    public function setAnnees(int $annees): static
    {
        $this->annees = $annees;

        return $this;
    }

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(int $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(int $semaine): static
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getDateDebutSemaine(): ?\DateTimeInterface
    {
        return $this->dateDebut_semaine;
    }

    public function setDateDebutSemaine(?\DateTimeInterface $dateDebut_semaine): static
    {
        $this->dateDebut_semaine = $dateDebut_semaine;

        return $this;
    }

    public function getOfsSemaine(): Collection
    {
        return $this->ofs_semaine;
    }

    public function addOf(?OFs $of): static
    {
        if (!$this->ofs_semaine->contains($of)) {
            $this->ofs_semaine[] = $of;
            $of->setSemaineOf($this);
        }

        return $this;
    }

    public function removeOf(?OFs $of): static
    {
        if ($this->ofs_semaine->removeElement($of)) {
            if ($of->getSemaineOf() === $this) {
                $of->setSemaineOf(null);
            }
        }

        return $this;
    }
}
