<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\CoucheByDemandeIdController;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use App\Repository\CouchesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: CouchesRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/articleCouchesByDemande/{demandeId}',
            controller: CoucheByDemandeIdController::class,
            name: 'CouchesSysteme'
        )
    ],
    normalizationContext: ['groups' => ['couches:read']],
    denormalizationContext: ['groups' => ['couches:write']]
)]
#[ApiFilter(SearchFilter::class, properties: ['Systemes_couche' => 'exact'])]
class Couches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['couches:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['couches:read', 'couches:write'])]
    #[SerializedName('epaisseurCouche')]
    private ?string $epaisseur_couche = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2, nullable: true)]
    #[Groups(['couches:read', 'couches:write'])]
    #[SerializedName('tarifCouche')]
    private ?string $tarif_couche = null;

    #[ORM\ManyToOne(targetEntity: Articles::class, inversedBy: 'Couches_article')]
    #[Groups(['couches:read', 'couches:write'])]
    #[SerializedName('ArticleCouche')]
    private ?Articles $codeArticle_couche = null;

    #[ORM\ManyToOne(targetEntity: Systemes::class, inversedBy: 'Couches_syteme')]
    #[Groups(['couches:read', 'couches:write'])]
    #[SerializedName('SystemeCouche')]
    private ?Systemes $Systemes_couche;

    #[ORM\OneToMany(targetEntity: SurfaceCouches::class, mappedBy: 'couche_surfaceCouche')]
    #[Groups(['couches:read'])]
    #[SerializedName('surfaceCouchesCouche')]
    private ?Collection $surfaceCouches_couche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurfaceCouche(): ?string
    {
        return $this->surface_couche;
    }

    public function setSurfaceCouche(string $surface_couche): static
    {
        $this->surface_couche = $surface_couche;

        return $this;
    }

    public function getEpaisseurCouche(): ?string
    {
        return $this->epaisseur_couche;
    }

    public function setEpaisseurCouche(string $epaisseur_couche): static
    {
        $this->epaisseur_couche = $epaisseur_couche;

        return $this;
    }

    public function getTarifCouche(): ?string
    {
        return $this->tarif_couche;
    }

    public function setTarifCouche(?string $tarif_couche): static
    {
        $this->tarif_couche = $tarif_couche;

        return $this;
    }


    public function getCodeArticleCouche(): ?Articles
    {
        return $this->codeArticle_couche;
    }

    public function setCodeArticleCouche(?Articles $codeArticle_couche): static
    {
        $this->codeArticle_couche = $codeArticle_couche;

        return $this;
    }

    public function getSystemesCouche(): ?Systemes
    {
        return $this->Systemes_couche;
    }

    public function setSystemesCouche(?Systemes $Systemes_couche): void
    {
        $this->Systemes_couche = $Systemes_couche;
    }

    public function getSurfaceCouchesCouche(): ?Collection
    {
        return $this->surfaceCouches_couche;
    }

    public function addSurfaceCouchesCouche(SurfaceCouches $surfaceCouches): static
    {
        if ($this->surfaceCouches_couche->contains($surfaceCouches)) {
            $this->surfaceCouches_couche[] = $surfaceCouches;
            $surfaceCouches->setCoucheSurfaceCouche($this);
        }
        return $this;
    }

    public function removeSurfaceCouchesCouche(SurfaceCouches $surfaceCouches): static
    {
        if ($this->surfaceCouches_couche->removeElement($surfaceCouches)) {
            if ($surfaceCouches->getCoucheSurfaceCouche() === $this) {
                $surfaceCouches->setCoucheSurfaceCouche(null);
            }
        }
        return $this;
    }
}
