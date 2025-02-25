<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
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
        new Patch(
            uriTemplate: '/stockSortie/{id}',
            normalizationContext: ['groups' => ['stocks:read']],
            denormalizationContext: ['groups' => ['stockSortie:write']],
            name: 'faire la sortie du stock'
        ),
    ],
    normalizationContext: ['groups' => ['stocks:read']],
    denormalizationContext: ['groups' => ['stocks:write']],
    paginationEnabled: false,
)]
class Stocks
{
    #[ORM\Id]
    #[ORM\Column(type: Types::BIGINT)]
    #[Groups(['stocks:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['stocks:read', 'stocks:write'])]
    #[SerializedName('dateStockStock')]
    private ?\DateTimeInterface $dateStock_stock = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['stocks:read', 'stockSortie:write'])]
    #[SerializedName('dateSortieStock')]
    private ?\DateTimeInterface $dateSortie_stock = null;

    #[ORM\ManyToOne(targetEntity: Articles::class, inversedBy: 'stocks_article')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stocks:write'])]
    #[SerializedName('articleStock')]
    private ?Articles $article_stock = null;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'stocks_user')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stockSortie:write'])]
    #[SerializedName('userStock')]
    private ?Users $user_stock = null;

    #[ORM\ManyToOne(targetEntity: OFs::class, inversedBy: 'stocks_of')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['stocks:read', 'stockSortie:write'])]
    #[SerializedName('ofStock')]
    private ?OFs $of_stock = null;

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
}
