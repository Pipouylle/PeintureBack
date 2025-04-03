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
use App\Controller\CommandesAffaireController;
use App\DataProvider\ExcelCommandeProvider;
use App\DataProvider\ExcelFacturationProvider;
use App\DTOs\CommandeWithAffaire;
use App\DTOs\ExcelCommandeOutput;
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
        new Patch(),
        new GetCollection(
            uriTemplate: '/commandesAffaires',
            normalizationContext: ['groups' => ['commandesAffairesSystemes:read']],
            output: CommandeWithAffaire::class,
            name: 'CommandesCategories',
            provider: CommandeAffairesSystemesProvider::class
        ),
        new GetCollection(
            uriTemplate: '/excel/commandes',
            normalizationContext: ['groups' => ['excel:read']],
            output: ExcelCommandeOutput::class,
            name: 'sortie des commandes pour les excels',
            provider: ExcelCommandeProvider::class,
        ),
        new GetCollection(
            uriTemplate: '/excel/facturations',
            normalizationContext: ['groups' => ['excel:read']],
            output: ExcelFacturationProvider::class,
            name: 'facturations',
            provider: ExcelFacturationProvider::class
        )
    ],
    normalizationContext: ['groups' => ['commandes:read']],
    denormalizationContext: ['groups' => ['commandes:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['affaire_commande' => 'exact', 'systeme_commande' => 'exact'])]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commandes:read', 'commandesAffaires:read', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Affaires::class, inversedBy: 'commandes_affaire')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('affaireCommande')]
    private ?Affaires $affaire_commande = null;

    #[ORM\ManyToOne(targetEntity: Systemes::class, inversedBy: 'commande_systeme')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('systemeCommande')]
    private ?Systemes $systeme_commande = null;

    #[ORM\Column(length: 50)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('eurekaCommande')]
    private ?string $eureka_commande = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('commentaireCommande')]
    private ?string $commentaire_commande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('surfaceCommande')]
    private ?string $surface_commande = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('ficheHCommande')]
    private ?bool $ficheH_commande = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('pvPeintureCommande')]
    private ?bool $pvPeinture_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('regieSFPCommande')]
    private ?string $regieSFP_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('regieFPCommande')]
    private ?string $regieFP_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('grenaillageCommande')]
    private ?string $grenaillage_commande = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['commandes:read', 'commandes:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('ralCommande')]
    private ?int $ral_commande = null;

    #[ORM\OneToMany(targetEntity: Demandes::class, mappedBy: 'commande_demande', cascade: ['persist', 'remove'])]
    #[SerializedName('demandesCommande')]
    private Collection $demandes_commande;

    #[ORM\OneToMany(targetEntity: ArticleCouche::class, mappedBy: 'commande_articleCouche', cascade: ['persist', 'remove'])]
    #[SerializedName('articleCouchesCommande')]
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

    public function getRegieSFPCommande(): ?string
    {
        return $this->regieSFP_commande;
    }

    public function setRegieSFPCommande(?string $regieSFP_commande): void
    {
        $this->regieSFP_commande = $regieSFP_commande;
    }

    public function getRegieFPCommande(): ?string
    {
        return $this->regieFP_commande;
    }

    public function setRegieFPCommande(?string $regieFP_commande): void
    {
        $this->regieFP_commande = $regieFP_commande;
    }

    public function getGrenaillageCommande(): ?string
    {
        return $this->grenaillage_commande;
    }

    public function setGrenaillageCommande(?string $grenaillage_commande): void
    {
        $this->grenaillage_commande = $grenaillage_commande;
    }

    public function getRalCommande(): ?int
    {
        return $this->ral_commande;
    }

    public function setRalCommande(?int $ral_commande): void
    {
        $this->ral_commande = $ral_commande;
    }
}
