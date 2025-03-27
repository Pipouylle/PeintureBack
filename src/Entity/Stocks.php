<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\CreateStockController;
use App\Controller\StockLeaveController;
use App\Controller\StockUnLeaveController;
use App\Repository\StocksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: StocksRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete(),
        new Patch(),
        new Post(),
        new Patch(
            uriTemplate: '/stockLeave/{id}',
            controller: StockLeaveController::class,
            normalizationContext: ['groups' => 'stocks:read'],
            denormalizationContext: ['groups' => 'stockSortie:write'],
            name: 'faire la sortie du stock'
        ),
        new Get(
            uriTemplate: '/stockUnLeave/{id}',
            controller: StockUnLeaveController::class,
            name: 'annuler la sortie'
        ),
        new GetCollection(
            uriTemplate: '/stockCreate/{articleId}/{nombre}',
            controller: CreateStockController::class,
            normalizationContext: ['groups' => ['stocks:read']],
            name: 'faire un nombre d entrees dans stock'
        ),
    ],
    normalizationContext: ['groups' => ['stocks:read']],
    denormalizationContext: ['groups' => ['stocks:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'article_stock' => 'exact'])]
#[ApiFilter(ExistsFilter::class, properties: ['dateSortie_stock'])]
#[ApiFilter(DateFilter::class, properties: ['dateSortie_stock'])]
#[ApiFilter(BooleanFilter::class, properties: ['isUnique_stock'])]
class Stocks
{
    #[ORM\Id]
    #[ORM\Column(type: Types::BIGINT)]
    #[Groups(['stocks:read', 'stocks:write'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['stocks:read'])]
    #[SerializedName('dateStockStock')]
    private ?\DateTimeInterface $dateStock_stock = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['stocks:read', 'stockUnLeave:write'])]
    #[SerializedName('dateSortieStock')]
    private ?\DateTimeInterface $dateSortie_stock = null;

    #[ORM\ManyToOne(targetEntity: Articles::class, inversedBy: 'stocks_article')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stocks:write'])]
    #[SerializedName('articleStock')]
    private ?Articles $article_stock = null;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'stocks_user')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stockSortie:write'])]
    #[SerializedName('userStock')]
    private ?Users $user_stock = null;

    #[ORM\ManyToOne(targetEntity: OFs::class, inversedBy: 'stocks_of')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stockSortie:write'])]
    #[SerializedName('ofStock')]
    private ?OFs $of_stock = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    #[Groups(['stocks:read'])]
    #[SerializedName('isUniqueStock')]
    private ?bool $isUnique_stock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    #[ORM\PrePersist]
    public function setDateStockStockValue(): void
    {
        if ($this->dateStock_stock === null) {
            $this->dateStock_stock = new \DateTime();
        }
    }

    public function getDateStockStock(): ?\DateTimeInterface
    {
        return $this->dateStock_stock;
    }


    public function setDateStockStock(?\DateTimeInterface $dateStock_stock): static
    {
        $this->dateStock_stock = $dateStock_stock;

        return $this;
    }

    public function getDateSortieStock(): ?\DateTimeInterface
    {
        return $this->dateSortie_stock;
    }

    public function setDateSortieStock(?\DateTimeInterface $dateSortie_stock): static
    {
        $this->dateSortie_stock = $dateSortie_stock;

        return $this;
    }

    public function getArticleStock(): ?Articles
    {
        return $this->article_stock;
    }

    public function setArticleStock(?Articles $article_stock): static
    {
        $this->article_stock = $article_stock;

        return $this;
    }

    public function getUserStock(): ?Users
    {
        return $this->user_stock;
    }

    public function setUserStock(?Users $user_stock): static
    {
        $this->user_stock = $user_stock;

        return $this;
    }

    public function getOfStock(): ?OFs
    {
        return $this->of_stock;
    }

    public function setOfStock(?OFs $of_stock): void
    {
        $this->of_stock = $of_stock;
    }

    public function getIsUniqueStock(): ?bool
    {
        return $this->isUnique_stock;
    }

    public function setIsUniqueStock(?bool $isUnique_stock): void
    {
        $this->isUnique_stock = $isUnique_stock;
    }

    #[ORM\PrePersist]
    public function setValueIsUniqueStock(): void
    {
        if ($this->isUnique_stock === null){
            $isUnique = $_ENV["BARCODE"] ?? true;
            $this->isUnique_stock = $isUnique;
        }
    }
}
