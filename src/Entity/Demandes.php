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
use App\Controller\DemandeAllAvancementController;
use App\Controller\DemandeNotFinishController;
use App\Controller\GetPreviousAvancementController;
use App\DataProvider\ExcelDemandeProvider;
use App\DataProvider\PreviousAvancementProvider;
use App\DTOs\DemandesCalendar;
use App\DTOs\ExcelDemandeOutput;
use App\DTOs\PreviousAvancementOutput;
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
        new Patch(),
        new Patch(
            uriTemplate: '/demandeEtat/{id}',
            normalizationContext: ['groups' => ['demandes:read']],
            denormalizationContext: ['groups' => ['demandesEtat:write']],
            name: 'patch demande etat',
        ),
        new GetCollection(
            uriTemplate: '/demandesCalendar',
            normalizationContext: ['groups' => ['demandesCalendar:read']],
            output: DemandesCalendar::class,
            name: 'DemandesOf',
            provider: DemandesCalendarProvider::class
        ),
        new Get(
            uriTemplate: '/previousAvancement/{demandeId}/{ofId}',
            normalizationContext: ['groups' => ['previousAvancement:read']],
            output: PreviousAvancementOutput::class,
            name: 'previous avancement',
            provider: PreviousAvancementProvider::class
        ),
        new GetCollection(
            uriTemplate: '/demandeNotFinish',
            controller: DemandeNotFinishController::class,
            normalizationContext: ['groups' => ['demandes:read']],
            name: 'demandeNotFinish',
        ),
        new GetCollection(
            uriTemplate: '/allAvancements',
            controller: DemandeAllAvancementController::class,
            name: 'get avancement of all demandes'
        ),
        new GetCollection(
            uriTemplate: '/excel/demandes',
            normalizationContext: ['groups' => ['excel:read']],
            output: ExcelDemandeOutput::class,
            name: 'sortie des demandes pour les excels',
            provider: ExcelDemandeProvider::class
        )
    ],
    normalizationContext: ['groups' => ['demandes:read']],
    denormalizationContext: ['groups' => ['demandes:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties:['numero_demande' => 'exact', 'etat_demande' => 'exact'])]
class Demandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['demandes:read', 'ofsOperateurView:read', 'avancement:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('numeroDemande')]
    private ?string $numero_demande = null;


    #[ORM\ManyToOne(targetEntity: Commandes::class, inversedBy: 'demandes_commande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('commandeDemande')]
    private ?Commandes $commande_demande = null;

    #[ORM\Column(length: 50, nullable:  true)]
    #[Groups(['demandes:read', 'demandes:write', 'demandesEtat:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('etatDemande')]
    private ?string $etat_demande = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('surfaceDemande')]
    private ?string $surface_demande = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('nombrePieceDemande')]
    private ?int $nombrePiece_demande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('dateDemande')]
    private ?\DateTimeInterface $date_demande = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('reservationPeintureDemande')]
    private ?bool $reservationPeinture_demande = null;

    #[ORM\Column(length: 500, nullable: true)]
    #[Groups(['demandes:read', 'demandes:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('commentaireDemande')]
    private ?string $commentaire_demande = null;

    #[ORM\OneToMany(targetEntity: OFs::class, mappedBy: 'idDemande_of', cascade: ['persist', 'remove'])]
    #[SerializedName('OfDemande')]
    private Collection $Of_demande;

    #[ORM\OneToMany(targetEntity: SurfaceCouches::class, mappedBy: 'demande_surfaceCouche', cascade: ['persist', 'remove'])]
    #[SerializedName('surfaceCouchesDemande')]
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

    public function getReservationPeintureDemande(): ?bool
    {
        return $this->reservationPeinture_demande;
    }

    public function setReservationPeintureDemande(?bool $reservationPeinture_demande): void
    {
        $this->reservationPeinture_demande = $reservationPeinture_demande;
    }

    public function getCommentaireDemande(): ?string
    {
        return $this->commentaire_demande;
    }

    public function setCommentaireDemande(?string $commentaire_demande): void
    {
        $this->commentaire_demande = $commentaire_demande;
    }
}
