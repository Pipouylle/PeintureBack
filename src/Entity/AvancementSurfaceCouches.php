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
use App\Controller\AllAvancementDemandeController;
use App\Controller\AllAvancementSemaineController;
use App\Repository\AvancementSurfaceCouchesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: AvancementSurfaceCouchesRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Patch(),
        new Delete(),
        new Patch(
            uriTemplate: '/modifAvancement/{id}',
            normalizationContext: ['groups' => ['avancement_surface_couches:read']],
            denormalizationContext: ['groups' => ['modifAvancement:write']],
            name: 'update avancement surface couches'
        ),
        new GetCollection(
            uriTemplate: '/allAvancementSemaine/{semaineId}',
            controller: AllAvancementSemaineController::class,
            normalizationContext: ['groups' => ['avancement_surface_couches:read']],
            name: 'all avancement surface couches by semaine'
        ),
        new GetCollection(
            uriTemplate: '/allAvancementDemande/{demandeId}',
            controller: AllAvancementDemandeController::class,
            normalizationContext: ['groups' => ['avancement_surface_couches:read']],
            name: 'all avancement surface couches by demande'
        )
    ],
    normalizationContext: ['groups' => ['avancement_surface_couches:read']],
    denormalizationContext: ['groups' => ['avancement_surface_couches:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['of_avancement' => 'exact', 'surfaceCouches_avancement' => 'exact'])]
class AvancementSurfaceCouches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['avancement_surface_couches:read', 'ofsOperateurView:read', 'avancement:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: OFs::class, inversedBy: 'avancementSurfaceCouches_of')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['avancement_surface_couches:read', 'avancement_surface_couches:write'])]
    #[SerializedName('ofAvancement')]
    private ?OFs $of_avancement = null;


    #[ORM\ManyToOne(targetEntity: SurfaceCouches::class, inversedBy: 'avancementSurfaceCouches_surfaceCouches')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['avancement_surface_couches:read', 'avancement_surface_couches:write', 'ofsOperateurView:read', 'avancement:read'])]
    #[SerializedName('surfaceCouchesAvancement')]
    private ?SurfaceCouches $surfaceCouches_avancement = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['avancement_surface_couches:read', 'avancement_surface_couches:write', 'modifAvancement:write', 'ofsOperateurView:read', 'avancement:read', 'avancement:write'])]
    #[SerializedName('avancementAvancement')]
    private ?int $avancement_avancement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfAvancement(): ?OFs
    {
        return $this->of_avancement;
    }

    public function setOfAvancement(?OFs $of_avancement): static
    {
        $this->of_avancement = $of_avancement;

        return $this;
    }

    public function getSurfaceCouchesAvancement(): ?SurfaceCouches
    {
        return $this->surfaceCouches_avancement;
    }

    public function setSurfaceCouchesAvancement(?SurfaceCouches $surfaceCouches_avancement): static
    {
        $this->surfaceCouches_avancement = $surfaceCouches_avancement;

        return $this;
    }

    public function getAvancementAvancement(): ?int
    {
        return $this->avancement_avancement;
    }

    public function setAvancementAvancement(?int $avancement_avancement): static
    {
        $this->avancement_avancement = $avancement_avancement;

        return $this;
    }
}
