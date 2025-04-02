<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\DataProvider\ExcelAffaireProvider;
use App\DTOs\ExcelAffaireOutput;
use App\Repository\AffairesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: AffairesRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete(),
        new Patch(),
        new Put(),
        new GetCollection(
            uriTemplate: '/RecapSemaine',
            normalizationContext: ['groups' => ['RecapSemaine:read']],
            name: 'RecapSemaine'
        ),
        new GetCollection(
            uriTemplate: '/excel/affaires',
            normalizationContext: ['groups' => ['excel:read']],
            output: ExcelAffaireOutput::class,
            name: 'sortie eds affaires pour les excels',
            provider: ExcelAffaireProvider::class,
        )
    ],
    normalizationContext: ['groups' => ['affaires:read']],
    denormalizationContext: ['groups' => ['affaires:write']],
    paginationEnabled: false,
)]
class Affaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['affaires:read', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['affaires:read', 'affaires:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('numeroAffaire')]
    private ?string $numero_affaire = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['affaires:read', 'affaires:write', 'RecapSemaine:read', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('nomAffaire')]
    private ?string $nom_affaire = null;

    #[ORM\OneToMany(targetEntity: Commandes::class, mappedBy: 'affaire_commande')]
    #[Groups(['RecapSemaine:read'])]
    #[SerializedName('commandesAffaire')]
    private Collection $commandes_affaire;

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
        return $this->commandes_affaire;
    }

    public function addCommande(Commandes $commandes): static
    {
        if(!$this->commandes_affaire->contains($commandes)){
            $this->commandes_affaire[] = $commandes;
            $commandes->setAffaireCommande($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commandes): static
    {
        if ($this->commandes_affaire->removeElement($commandes)){
            $commandes->setAffaireCommande(null);
        }

        return $this;
    }

}
