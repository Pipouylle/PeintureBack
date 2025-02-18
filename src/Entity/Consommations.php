<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\ConsommationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;
use App\Controller\ConsommationSemaineController;

#[ORM\Entity(repositoryClass: ConsommationsRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/consommationsSemaine/{SemaineId}',
            controller: ConsommationSemaineController::class,
            name: 'ConsommationsSemaine'
        )
    ],
    normalizationContext: ['groups' => ['consommations:read']],
    denormalizationContext: ['groups' => ['consommations:write']],
    paginationEnabled: false,
)]
class Consommations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['consommations:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: OFs::class, inversedBy: 'consommations_of')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['consommations:read', 'consommations:write'])]
    #[SerializedName('ofConsommation')]
    private ?OFs $of_consommation = null;

    #[ORM\ManyToOne(targetEntity: Articles::class, inversedBy: 'consommation_article')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['consommations:read', 'consommations:write'])]
    #[SerializedName('articleConsommation')]
    private ?Articles $codeArticle_consommation = null;

    #[ORM\Column]
    #[Groups(['consommations:read', 'consommations:write'])]
    #[SerializedName('quantiterConsommation')]
    private ?int $quantiter_consommation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getDemandeConsommation(): ?OFs
    {
        return $this->of_consommation;
    }

    public function setDemandeConsommation(?OFs $demande_consommation): static
    {
        $this->of_consommation = $demande_consommation;

        return $this;
    }

    public function getCodeArticleConsommation(): ?Articles
    {
        return $this->codeArticle_consommation;
    }

    public function setCodeArticleConsommation(?Articles $codeArticle_consommation): static
    {
        $this->codeArticle_consommation = $codeArticle_consommation;

        return $this;
    }

    public function getQuantiterConsommation(): ?int
    {
        return $this->quantiter_consommation;
    }

    public function setQuantiterConsommation(int $quantiter_consommation): static
    {
        $this->quantiter_consommation = $quantiter_consommation;

        return $this;
    }

    public function getOfConsommation(): ?OFs
    {
        return $this->of_consommation;
    }

    public function setOfConsommation(?OFs $of_consommation): void
    {
        $this->of_consommation = $of_consommation;
    }

}
