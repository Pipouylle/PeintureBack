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
use App\Controller\OfForSortieStockController;
use App\Controller\OfOperateurViewController;
use App\DataProvider\ExcelOfProvider;
use App\DTOs\ExcelOfOutput;
use App\Repository\OFsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: OFsRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Patch(),
        new Delete(),
        new Patch(
            uriTemplate: '/ofsOrder/{id}',
            normalizationContext: ['groups' => ['ofs:read']],
            denormalizationContext: ['groups' => ['ofsOrder:write']],
            name: 'update order of',
        ),
        new Patch(
            uriTemplate: '/ofsRegie/{id}',
            normalizationContext: ['groups' => ['ofs:read']],
            denormalizationContext: ['groups' => ['ofsRegie:write']],
            name: 'update regie of',
        ),
        new Patch(
            uriTemplate: '/avancement/ofs/{id}',
            normalizationContext: ['groups' => ['ofs:read']],
            denormalizationContext: ['groups' => ['avancement:write']],
            name: 'update avancement of',
        ),
        new GetCollection(
            uriTemplate: '/ofsForSortieStock',
            controller: OfForSortieStockController::class,
            normalizationContext: ['groups' => ['ofs:read']],
            name: 'get all of before 7 month'
        ),
        new GetCollection(
            uriTemplate: '/ofsOperateurView/{semaineId}/{jourId}',
            controller: OfOperateurViewController::class,
            normalizationContext: ['groups' => ['ofsOperateurView:read']],
            name: 'get all of for operateur view'
        ),
        new GetCollection(
            uriTemplate: '/excel/ofs',
            normalizationContext: ['groups' => ['excel:read']],
            output: ExcelOfOutput::class,
            name: 'sortie des ofs pour les excels',
            provider: ExcelOfProvider::class
        ),
        new GetCollection(
          uriTemplate: '/avancement/ofs',
          normalizationContext: ['groups' => ['avancement:read']],
        ),
    ],
    normalizationContext: ['groups' => ['ofs:read']],
    denormalizationContext: ['groups' => ['ofs:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['semaine_of' => 'exact', 'jour_of' => 'exact', 'idDemande_of' => 'exact'])]
#[ORM\HasLifecycleCallbacks]
class OFs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['ofs:read', 'ofsOperateurView:read', 'avancement:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('cabineOf')]
    private ?string $cabine_of = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read', 'avancement:write'])]
    #[SerializedName('avancementOf')]
    private ?int $avancement_of = null;

    #[ORM\ManyToOne(targetEntity: Demandes::class, inversedBy: 'Of_demande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('demandeOf')]
    private ?Demandes $idDemande_of = null;

    #[ORM\ManyToOne(targetEntity: Jours::class, inversedBy: 'ofs_jour',)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('jourOf')]
    private ?Jours $jour_of = null;

    #[ORM\ManyToOne(targetEntity: Semaines::class, inversedBy: 'ofs_semaine',)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('semaineOf')]
    private ?Semaines $semaine_of = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOrder:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('orderOf')]
    private ?int $order_of = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('tempOf')]
    private ?string $temp_of = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsRegie:write', 'avancement:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('regieSFPOf')]
    private ?int $regieSFP_of = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsRegie:write', 'avancement:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('regieFPOf')]
    private ?int $regieFP_of = null;

    #[ORM\OneToMany(targetEntity: AvancementSurfaceCouches::class, mappedBy: 'of_avancement')]
    #[Groups(['ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('avancementSurfaceCouchesOf')]
    private Collection $avancementSurfaceCouches_of;

    #[ORM\OneToMany(targetEntity: Stocks::class, mappedBy: 'of_stock')]
    #[Groups(['ofsOperateurView:read'])]
    #[SerializedName('stocksOf')]
    private Collection $stocks_of;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCabineOf(): ?string
    {
        return $this->cabine_of;
    }

    public function setCabineOf(?string $cabine_of): static
    {
        $this->cabine_of = $cabine_of;

        return $this;
    }

    public function getAvancementOf(): ?int
    {
        return $this->avancement_of;
    }

    public function setAvancementOf(?int $avancement_of): static
    {
        $this->avancement_of = $avancement_of;

        return $this;
    }

    public function getIdDemandeOf(): ?Demandes
    {
        return $this->idDemande_of;
    }

    public function setIdDemandeOf(?Demandes $idDemande_of): static
    {
        $this->idDemande_of = $idDemande_of;

        return $this;
    }

    public function getJourOf(): ?Jours
    {
        return $this->jour_of;
    }

    public function setJourOf(?Jours $jour_of): void
    {
        $this->jour_of = $jour_of;
    }

    public function getSemaineOf(): ?Semaines
    {
        return $this->semaine_of;
    }

    public function setSemaineOf(?Semaines $semaine_of): void
    {
        $this->semaine_of = $semaine_of;
    }

    public function getAvancementSurfaceCouchesOf(): Collection
    {
        return $this->avancementSurfaceCouches_of;
    }

    public function addAvancementSurfaceCouches(AvancementSurfaceCouches $avancementSurfaceCouches): static
    {
        if (!$this->avancementSurfaceCouches_of->contains($avancementSurfaceCouches)) {
            $this->avancementSurfaceCouches_of[] = $avancementSurfaceCouches;
            $avancementSurfaceCouches->setOfAvancement($this);
        }

        return $this;
    }

    public function removeAvancementSurfaceCouches(AvancementSurfaceCouches $avancementSurfaceCouches): static
    {
        if ($this->avancementSurfaceCouches_of->removeElement($avancementSurfaceCouches)) {
            if ($avancementSurfaceCouches->getOfAvancement() === $this) {
                $avancementSurfaceCouches->setOfAvancement(null);
            }
        }

        return $this;
    }

    public function getOrderOf(): ?int
    {
        return $this->order_of;
    }

    public function setOrderOf(?int $order_of): void
    {
        $this->order_of = $order_of;
    }

    public function getStocksOf(): Collection
    {
        return $this->stocks_of;
    }

    public function addStock(Stocks $stock): static
    {
        if (!$this->stocks_of->contains($stock)) {
            $this->stocks_of[] = $stock;
            $stock->setOfStock($this);
        }

        return $this;
    }

    public function removeStock(Stocks $stock): static
    {
        $this->stocks_of->removeElement($stock);

        return $this;
    }

    public function getTempOf(): ?string
    {
        return $this->temp_of;
    }

    public function setTempOf(?string $temp_of): void
    {
        $this->temp_of = $temp_of;
    }

    public function getRegieSFPOf(): ?int
    {
        return $this->regieSFP_of;
    }

    public function setRegieSFPOf(?int $regieSFP_of): static
    {
        $this->regieSFP_of = $regieSFP_of;

        return $this;
    }

    public function getRegieFPOf(): ?int
    {
        return $this->regieFP_of;
    }

    public function setRegieFPOf(?int $regieFP_of): static
    {
        $this->regieFP_of = $regieFP_of;

        return $this;
    }

    #[ORM\PrePersist]
    public function updateDemandeStatusToEnCours(): void
    {
        $this->idDemande_of?->setEtatDemande('En cours');
    }

    #[ORM\PreRemove]
    public function onPreRemove(): void
    {
        if ($this->idDemande_of && $this->idDemande_of->getOfs()->count() === 1) {
            $this->idDemande_of->setEtatDemande('Créée');
        }
    }
}
