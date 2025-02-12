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
use App\Repository\SystemesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Config\Framework\Serializer\NamedSerializerConfig;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

#[ORM\Entity(repositoryClass: SystemesRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new GetCollection(),
        new Patch(),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['systemes:read']],
    denormalizationContext: ['groups' => ['systemes:write']]
)]
class Systemes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['systemes:read', 'commandesAffairesSystemes:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['systemes:read', 'systemes:write', 'commandesAffairesSystemes:read'])]
    #[SerializedName('nomSysteme')]
    private ?string $nom_systeme = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['systemes:read', 'systemes:write'])]
    #[SerializedName('fournisseurSysteme')]
    private ?string $fournisseur_systeme = null;

    #[ORM\ManyToOne(targetEntity: Grenaillage::class, inversedBy: 'systemes_grenaillage')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    #[Groups(['systemes:read', 'systemes:write'])]
    #[SerializedName('grenaillageSysteme')]
    private ?Grenaillage $grenaillage_systeme = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[SerializedName('refieFPSysteme')]
    #[Groups(['systemes:read', 'systemes:write'])]
    private ?string $regieFP_Systeme = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['systemes:read', 'systemes:write'])]
    #[SerializedName('regieSFPSysteme')]
    private ?string $regieSFP_systeme = null;

    #[ORM\OneToMany(targetEntity: Commandes::class, mappedBy: 'systeme_commande', cascade: ['persist', 'remove'])]
    private Collection $commande_systeme;

    #[ORM\OneToMany(targetEntity: Couches::class, mappedBy: 'systeme_couche', cascade: ['persist', 'remove'])]
    private Collection $Couches_syteme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSysteme(): ?string
    {
        return $this->nom_systeme;
    }

    public function setNomSysteme(string $nom_systeme): static
    {
        $this->nom_systeme = $nom_systeme;

        return $this;
    }

    public function getFournisseurSysteme(): ?string
    {
        return $this->fournisseur_systeme;
    }

    public function setFournisseurSysteme(?string $fournisseur_systeme): void
    {
        $this->fournisseur_systeme = $fournisseur_systeme;
    }

    public function getCommandeSysteme(): Collection
    {
        return $this->commande_systeme;
    }

    public function setCommandeSysteme(Collection $commande_systeme): void
    {
        $this->commande_systeme = $commande_systeme;
    }

    public function getGrenaillageSysteme(): ?Grenaillage
    {
        return $this->grenaillage_systeme;
    }

    public function setGrenaillageSysteme(?Grenaillage $grenaillage_systeme): static
    {
        $this->grenaillage_systeme = $grenaillage_systeme;

        return $this;
    }

    public function getRegieSFPSysteme(): ?string
    {
        return $this->regieSFP_systeme;
    }

    public function setRegieSFPSysteme(?string $regieSFP_systeme): static
    {
        $this->regieSFP_systeme = $regieSFP_systeme;

        return $this;
    }

    public function getRegieFPSysteme(): ?string
    {
        return $this->regieFP_Systeme;
    }

    public function setRegieFPSysteme(?string $regieFP_Systeme): static
    {
        $this->regieFP_Systeme = $regieFP_Systeme;

        return $this;
    }

    public function getCouches(): Collection
    {
        return $this->Couches_syteme;
    }

    public function addCouche(Couches $couche): static
    {
        if (!$this->Couches_syteme->contains($couche)) {
            $this->Couches_syteme[] = $couche;
            $couche->setSystemeCouche($this);
        }

        return $this;
    }

    public function removeCouche(Couches $couche): static
    {
        if ($this->Couches_syteme->removeElement($couche)) {
            $couche->setSystemeCouche(null);
        }

        return $this;
    }

    public function getCommandes(): Collection
    {
        return $this->commande_systeme;
    }

    public function addCommande(Commandes $commandes): static
    {
        if ($this->commande_systeme->contains($commandes)) {
            $this->commande_systeme[] = $commandes;
            $commandes->setSystemeCommande($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commandes): static
    {
        if ($this->commande_systeme->removeElement($commandes)) {
            $commandes->setSystemeCommande(null);
        }

        return $this;
    }
}
