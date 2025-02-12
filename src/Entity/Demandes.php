<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\DTOs\DemandesCalendar;
use App\Repository\DemandesRepository;
use App\State\DemandesCalendarProvider;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: DemandesRepository::class)]
#[ApiResource(
    operations :[
        new GetCollection(),
        new Get(),
        new Post(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/demandesCalendar',
            normalizationContext: ['groups' => ['demandesCalendar:read']],
            output: DemandesCalendar::class,
            name: 'DemandesOf',
            provider: DemandesCalendarProvider::class
        ),
    ],
    normalizationContext: ['groups' => ['demandes:read']],
    denormalizationContext: ['groups' => ['demandes:write']]
)]
class Demandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['demandes:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('numeroDemande')]
    private ?string $numero_demande = null;


    #[ORM\ManyToOne(targetEntity: Commandes::class, inversedBy: 'demandes_commande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('commandeDemande')]
    private ?Commandes $commande_demande = null;

    #[ORM\Column(length: 50, nullable:  true)]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('etatDemande')]
    private ?string $etat_demande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('surfaceDemande')]
    private ?string $surface_demande = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('nombrePieceDemande')]
    private ?int $nombrePiece_demande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write'])]
    #[SerializedName('dateDemande')]
    private ?\DateTimeInterface $date_demande = null;

    #[ORM\OneToMany(targetEntity: OFs::class, mappedBy: 'idDemande_of', cascade: ['persist', 'remove'])]
    private Collection $Of_demande;

    #[ORM\OneToMany(targetEntity: SurfaceCouches::class, mappedBy: 'demande_surfaceCouche', cascade: ['persist', 'remove'])]
    private Collection $surfaceCouches_demande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDemande(): ?string
    {
        return $this->numero_demande;
    }

    public function setNumeroDemande(?string $numero_demande): static
    {
        $this->numero_demande = $numero_demande;

        return $this;
    }

    public function getNumeroPhaseDemande(): ?string
    {
        return $this->numeroPhase_demande;
    }

    public function setNumeroPhaseDemande(?string $numeroPhase_demande): void
    {
        $this->numeroPhase_demande = $numeroPhase_demande;
    }

    public function getCommandeDemande(): ?Commandes
    {
        return $this->commande_demande;
    }

    public function setCommandeDemande(?Commandes $commande_demande): static
    {
        $this->commande_demande = $commande_demande;

        return $this;
    }

    public function getEtatDemande(): ?string
    {
        return $this->etat_demande;
    }

    public function setEtatDemande(?string $etat_demande): static
    {
        $this->etat_demande = $etat_demande;

        return $this;
    }

    public function getSurfaceDemande(): ?string
    {
        return $this->surface_demande;
    }

    public function setSurfaceDemande(?string $surface_demande): static
    {
        $this->surface_demande = $surface_demande;

        return $this;
    }

    public function getNombrePieceDemande(): ?int
    {
        return $this->nombrePiece_demande;
    }

    public function setNombrePieceDemande(?int $nombrePiece_demande): void
    {
        $this->nombrePiece_demande = $nombrePiece_demande;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->date_demande;
    }

    public function setDateDemande(?\DateTimeInterface $date_demande): static
    {
        $this->date_demande = $date_demande;

        return $this;
    }

    public function getOfs(): Collection
    {
        return $this->Of_demande;
    }

    public function addOf(OFs $of): static
    {
        if (!$this->Of_demande->contains($of)){
            $this->Of_demande[] = $of;
            $of->setIdDemandeOf($this);
        }

        return $this;
    }

    public function removeOf(OFs $of): static
    {
        if ($this->Of_demande->removeElement($of)){
            if ($of->getIdDemandeOf() === $this){
                $of->setIdDemandeOf(null);
            }
        }

        return $this;
    }

    public function getSurfaceCouchesDemande(): Collection
    {
        return $this->surfaceCouches_demande;
    }

    public function addSurfaceCouches(SurfaceCouches $surfaceCouches): static
    {
        if (!$this->surfaceCouches_demande->contains($surfaceCouches)){
            $this->surfaceCouches_demande[] = $surfaceCouches;
            $surfaceCouches->setDemandeSurfaceCouche($this);
        }

        return $this;
    }

    public function removeSurfaceCouches(SurfaceCouches $surfaceCouches): static
    {
        if ($this->surfaceCouches_demande->removeElement($surfaceCouches)){
            if ($surfaceCouches->getDemandeSurfaceCouche() === $this){
                $surfaceCouches->setDemandeSurfaceCouche(null);
            }
        }

        return $this;
    }
}
