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
use Doctrine\Common\Collections\Collection;

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
    ],
    normalizationContext: ['groups' => ['couches:read']],
    denormalizationContext: ['groups' => ['couches:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['systeme_couche' => 'exact'])]
class Couches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['couches:read', 'articleCoucheForDemande:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['couches:read', 'couches:write', 'articleCoucheForDemande:read'])]
    #[SerializedName('epaisseurCouche')]
    private ?string $epaisseur_couche = null;

    #[ORM\Column(length: 50,nullable: true)]
    #[Groups(['couches:read', 'couches:write', 'articleCoucheForDemande:read'])]
    #[SerializedName('nomCouche')]
    private ?string $nom_couche = null;


    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['couches:read', 'couches:write', 'articleCoucheForDemande:read'])]
    #[SerializedName('tarifCouche')]
    private ?string $tarif_couche = null;

    #[ORM\ManyToOne(targetEntity: Systemes::class, inversedBy: 'Couches_syteme')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['couches:read', 'couches:write', 'articleCoucheForDemande:read'])]
    #[SerializedName('systemeCouche')]
    private ?Systemes $systeme_couche;

    #[ORM\OneToMany(targetEntity: ArticleCouche::class, mappedBy: 'couche_articleCouche')]
    private ?Collection $articleCouches_couche = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setTarifCouche(?string $tarif_couche): void
    {
        $this->tarif_couche = $tarif_couche;
    }

    public function getSystemeCouche(): ?Systemes
    {
        return $this->systeme_couche;
    }

    public function setSystemeCouche(?Systemes $systeme_couche): void
    {
        $this->systeme_couche = $systeme_couche;
    }

    public function getArticleCouchesCouche(): ?Collection
    {
        return $this->articleCouches_couche;
    }

    public function addSurfaceCouchesCouche(ArticleCouche $surfaceCouches): static
    {
        if ($this->articleCouches_couche->contains($surfaceCouches)) {
            $this->articleCouches_couche[] = $surfaceCouches;
            $surfaceCouches->setCoucheArticleCouche($this);
        }
        return $this;
    }

    public function removeSurfaceCouchesCouche(ArticleCouche $surfaceCouches): static
    {
        if ($this->articleCouches_couche->removeElement($surfaceCouches)) {
            if ($surfaceCouches->getCoucheArticleCouche() === $this) {
                $surfaceCouches->setCoucheArticleCouche(null);
            }
        }
        return $this;
    }

    public function getNomCouche(): ?string
    {
        return $this->nom_couche;
    }

    public function setNomCouche(?string $nom_couche): void
    {
        $this->nom_couche = $nom_couche;
    }


}
