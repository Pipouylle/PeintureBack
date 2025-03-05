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
use App\DTOs\OFsInput as OFsInputDTO;
use App\Processors\OFsProcessor as OFsInputProcessor;
use App\Repository\OFsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: OFsRepository::class)]
#[ApiResource(
    operations:[
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
       )
    ],
    normalizationContext: ['groups' => ['ofs:read']],
    denormalizationContext: ['groups' => ['ofs:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['semaine_of' => 'exact', 'jour_of' => 'exact'])]
class OFs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['ofs:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('cabineOf')]
    private ?string $cabine_of = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('avancementOf')]
    private ?string $avancement_of = null;

    #[ORM\ManyToOne(targetEntity: Demandes::class, inversedBy: 'Of_demande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('demandeOf')]
    private ?Demandes $idDemande_of = null;

    #[ORM\ManyToOne(targetEntity: Jours::class, inversedBy: 'ofs_jour',)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('jourOf')]
    private ?Jours $jour_of = null;

    #[ORM\ManyToOne(targetEntity: Semaines::class, inversedBy: 'ofs_semaine',)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('semaineOf')]
    private ?Semaines $semaine_of = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsOrder:write'])]
    #[SerializedName('orderOf')]
    private ?int $order_of = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('tempOf')]
    private ?string $temp_of = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsRegie:write'])]
    #[SerializedName('regieSFPOf')]
    private ?string $regieSFP_of = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write', 'ofsRegie:write'])]
    #[SerializedName('regieFPOf')]
    private ?string $regieFP_of = null;

    #[ORM\OneToMany(targetEntity: AvancementSurfaceCouches::class, mappedBy: 'of_avancement')]
    private Collection $avancementSurfaceCouches_of;

    #[ORM\OneToMany(targetEntity: Stocks::class, mappedBy: 'of_stock')]
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

    public function getAvancementOf(): ?string
    {
        return $this->avancement_of;
    }

    public function setAvancementOf(?string $avancement_of): static
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
        if (!$this->avancementSurfaceCouches_of->contains($avancementSurfaceCouches)){
            $this->avancementSurfaceCouches_of[] = $avancementSurfaceCouches;
            $avancementSurfaceCouches->setOfAvancement($this);
        }

        return $this;
    }

    public function removeAvancementSurfaceCouches(AvancementSurfaceCouches $avancementSurfaceCouches): static
    {
        if ($this->avancementSurfaceCouches_of->removeElement($avancementSurfaceCouches)){
            if ($avancementSurfaceCouches->getOfAvancement() === $this){
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
        if (!$this->stocks_of->contains($stock)){
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

    public function getRegieSFPOf(): ?string
    {
        return $this->regieSFP_of;
    }

    public function setRegieSFPOf(?string $regieSFP_of): static
    {
        $this->regieSFP_of = $regieSFP_of;

        return $this;
    }

    public function getRegieFPOf(): ?string
    {
        return $this->regieFP_of;
    }

    public function setRegieFPOf(?string $regieFP_of): static
    {
        $this->regieFP_of = $regieFP_of;

        return $this;
    }
}
