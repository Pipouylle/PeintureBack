<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Controller\AffairesController;
use App\Repository\AffairesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: AffairesRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['affaires:read']],
    denormalizationContext: ['groups' => ['affaires:write']],
)]
class Affaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['affaires:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['affaires:read', 'affaires:write'])]
    #[SerializedName('numeroAffaire')]
    private ?string $numero_affaire = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['affaires:read', 'affaires:write'])]
    #[SerializedName('nomAffaire')]
    private ?string $nom_affaire = null;

    #[ORM\OneToMany(targetEntity: Commandes::class, mappedBy: 'idAffaire_commande')]
    #[Groups(['affaires:read'])]
    private Collection $Commande_affaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAffaire(): ?string
    {
        return $this->nom_affaire;
    }

    public function getNumeroAffaire(): ?string
    {
        return $this->numero_affaire;
    }

    public function setNumeroAffaire(?string $numero_affaire): void
    {
        $this->numero_affaire = $numero_affaire;
    }

    public function setNomAffaire(?string $nom_affaire): static
    {
        $this->nom_affaire = $nom_affaire;

        return $this;
    }

    public function getCommandes(): Collection
    {
        return $this->Commande_affaire;
    }

    public function addCommande(Commandes $commandes): static
    {
        if(!$this->Commande_affaire->contains($commandes)){
            $this->Commande_affaire[] = $commandes;
            $commandes->setIdAffaireCommande($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commandes): static
    {
        if ($this->Commande_affaire->removeElement($commandes)){
            $commandes->setIdAffaireCommande(null);
        }

        return $this;
    }

}
