<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SurfaceCouchesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: SurfaceCouchesRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['surface_couches:read']],
    denormalizationContext: ['groups' => ['surface_couches:write']]
)]
class SurfaceCouches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['surface_couches:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ArticleCouche::class, inversedBy: 'surfaceCouches_articleCouche')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['surface_couches:read', 'surface_couches:write'])]
    #[SerializedName('articleCoucheSurfaceCouche')]
    private ?ArticleCouche $articleCouche_surfaceCouche = null;

    #[ORM\ManyToOne(targetEntity: Demandes::class, inversedBy: 'surfaceCouches_demande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['surface_couches:read', 'surface_couches:write'])]
    #[SerializedName('demandeSurfaceCouche')]
    private ?Demandes $demande_surfaceCouche = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['surface_couches:read', 'surface_couches:write'])]
    #[SerializedName('surface')]
    private ?string $surface = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleCoucheSurfaceCouche(): ?ArticleCouche
    {
        return $this->articleCouche_surfaceCouche;
    }

    public function setArticleCoucheSurfaceCouche(?ArticleCouche $couches_surfaceCouche): void
    {
        $this->articleCouche_surfaceCouche = $couches_surfaceCouche;
    }

    public function getDemandeSurfaceCouche(): ?Demandes
    {
        return $this->demande_surfaceCouche;
    }

    public function setDemandeSurfaceCouche(?Demandes $demandes_surfaceCouche): void
    {
        $this->demande_surfaceCouche = $demandes_surfaceCouche;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(?string $surface): static
    {
        $this->surface = $surface;

        return $this;
    }
}
