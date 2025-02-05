<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\DTOs\OFsInput as OFsInputDTO;
use App\Processors\OFsProcessor as OFsInputProcessor;
use App\Repository\OFsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: OFsRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['ofs:read']],
    denormalizationContext: ['groups' => ['ofs:write']],
    input: OFsInputDTO::class,
    processor: OFsInputProcessor::class
)]
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

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('dateOf')]
    private ?\DateTimeInterface $date_of = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('avancementOf')]
    private ?string $avancement_of = null;

    #[ORM\ManyToOne(targetEntity: Demandes::class, inversedBy: 'Of_demande')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('demandeOf')]
    private ?Demandes $idDemande_of = null;

    #[ORM\ManyToOne(targetEntity: Jours::class, inversedBy: 'ofs_jour',)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('jourOf')]
    private ?Jours $jour_of = null;

    #[ORM\ManyToOne(targetEntity: Semaines::class, inversedBy: 'ofs_semaine',)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['ofs:read', 'ofs:write'])]
    #[SerializedName('semaineOf')]
    private ?Semaines $semaine_of = null;


    #[ORM\OneToMany(targetEntity: Consommations::class, mappedBy: 'of_consommation')]
    #[Groups(['ofs:read'])]
    #[SerializedName('consommationOf')]
    private Collection $consommation_of;


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

    public function getDateOf(): ?\DateTimeInterface
    {
        return $this->date_of;
    }

    public function setDateOf(?\DateTimeInterface $date_of): static
    {
        $this->date_of = $date_of;

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

    public function getConsommationOf(): Collection
    {
        return $this->consommation_of;
    }

    public function addConsommation(Consommations $consommation): static
    {
        if (!$this->consommation_of->contains($consommation)){
            $this->consommation_of[] = $consommation;
            $consommation->setOfConsommation($this);
        }

        return $this;
    }

    public function removeConsommation(Consommations $consommation): static
    {
        if ($this->consommation_of->removeElement($consommation)){
            if ($consommation->getOfConsommation() === $this){
                $consommation->setOfConsommation(null);
            }
        }

        return $this;
    }
}
