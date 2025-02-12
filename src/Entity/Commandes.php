<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\CommandesAffaireController;
use App\DTOs\CommandeWithAffaire;
use App\Repository\CommandesRepository;
use App\State\CommandeAffairesSystemesProvider;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(),
        new Post(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/commandesAffaires',
            normalizationContext: ['groups' => ['commandesAffairesSystemes:read']],
            output: CommandeWithAffaire::class,
            name: 'CommandesCategories',
            provider: CommandeAffairesSystemesProvider::class
        ),
    ],
    normalizationContext: ['groups' => ['commandes:read']],
    denormalizationContext: ['groups' => ['commandes:write']]
)]
#[ApiFilter(SearchFilter::class, properties: ['affaire_commande' => 'exact', 'systeme_commande' => 'exact'])]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commandes:read', 'commandesAffaires:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Affaires::class, inversedBy: 'commandes_affaire')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('affaireCommande')]
    private ?Affaires $affaire_commande = null;

    #[ORM\ManyToOne(targetEntity: Systemes::class, inversedBy: 'commande_systeme')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('systemeCommande')]
    private ?Systemes $systeme_commande = null;

    #[ORM\Column(length: 50)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('eurekaCommande')]
    private ?string $eureka_commande = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('commentaireCommande')]
    private ?string $commentaire_commande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('surfaceCommande')]
    private ?string $surface_commande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('regieSFPCommande')]
    private ?string $regieSFP_commande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('regieFPCommande')]
    private ?string $regieFP_commande = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('ficheHCommande')]
    private ?bool $ficheH_commande = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write'])]
    #[SerializedName('pvPeintureCommande')]
    private ?bool $pvPeinture_commande = null;

    #[ORM\OneToMany(targetEntity: Demandes::class, mappedBy: 'commande_demande', cascade: ['persist', 'remove'])]
    private Collection $demandes_commande;

    #[ORM\OneToMany(targetEntity: ArticleCouche::class, mappedBy: 'commande_articleCouche', cascade: ['persist', 'remove'])]
    private Collection $articleCouches_commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffaireCommande(): ?Affaires
    {
        return $this->affaire_commande;
    }

    public function setAffaireCommande(Affaires $affaire_commande): static
    {
        $this->affaire_commande = $affaire_commande;

        return $this;
    }

    public function getSystemeCommande(): ?Systemes
    {
        return $this->systeme_commande;
    }

    public function setSystemeCommande(Systemes $systeme_commande): static
    {
        $this->systeme_commande = $systeme_commande;

        return $this;
    }

    public function getEurekaCommande(): ?string
    {
        return $this->eureka_commande;
    }

    public function setEurekaCommande(string $eureka_commande): static
    {
        $this->eureka_commande = $eureka_commande;

        return $this;
    }

    public function getCommentaireCommande(): ?string
    {
        return $this->commentaire_commande;
    }

    public function setCommentaireCommande(?string $commentaire_commande): static
    {
        $this->commentaire_commande = $commentaire_commande;

        return $this;
    }

    public function getSurfaceCommande(): ?string
    {
        return $this->surface_commande;
    }

    public function setSurfaceCommande(?string $surface_commande): static
    {
        $this->surface_commande = $surface_commande;

        return $this;
    }

    public function getRegieSFPCommande(): ?string
    {
        return $this->regieSFP_commande;
    }

    public function setRegieSFPCommande(?string $regieSFP_commande): static
    {
        $this->regieSFP_commande = $regieSFP_commande;

        return $this;
    }

    public function getRegieFPCommande(): ?string
    {
        return $this->regieFP_commande;
    }

    public function setRegieFPCommande(?string $regieFP_commande): static
    {
        $this->regieFP_commande = $regieFP_commande;

        return $this;
    }

    public function getFicheHCommande(): ?bool
    {
        return $this->ficheH_commande;
    }

    public function setFicheHCommande(?bool $ficheH_commande): void
    {
        $this->ficheH_commande = $ficheH_commande;
    }

    public function getPvPeintureCommande(): ?bool
    {
        return $this->pvPeinture_commande;
    }

    public function setPvPeintureCommande(?bool $pvPeinture_commande): void
    {
        $this->pvPeinture_commande = $pvPeinture_commande;
    }

    public function getDemandes(): Collection
    {
        return $this->demandes_commande;
    }

    public function addDemande(Demandes $demandes): static
    {
        if ($this->demandes_commande->contains($demandes)) {
            $this->demandes_commande[] = $demandes;
            $demandes->setCommandeDemande($this);
        }

        return $this;
    }

    public function removeDemande(Demandes $demandes): static
    {
        if ($this->demandes_commande->removeElement($demandes)) {
            if ($demandes->getCommandeDemande() === $this) {
                $demandes->setCommandeDemande(null);
            }
        }

        return $this;
    }

    public function getCouches(): Collection
    {
        return $this->articleCouches_commande;
    }

    public function addCouche(ArticleCouche $couches): static
    {
        if ($this->articleCouches_commande->contains($couches)) {
            $this->articleCouches_commande[] = $couches;
            $couches->setCommandeArticleCouche($this);
        }

        return $this;
    }

    public function removeCouche(ArticleCouche $couches): static
    {
        if ($this->articleCouches_commande->removeElement($couches)) {
            if ($couches->getCommandeArticleCouche() === $this) {
                $couches->setCommandeArticleCouche(null);
            }
        }
        return $this;
    }
}
