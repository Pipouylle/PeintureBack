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
use App\Controller\ArticleCoucheByDemandeController;
use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete(),
        new Patch(
            uriTemplate: '/articles/{id}',
            normalizationContext: ['groups' => ['articles:read']],
            denormalizationContext: ['groups' => ['articlesPatch:write']],
            name: 'update articleCouche'
        ),
        new GetCollection(
            uriTemplate: '/articleCouche/{demandeId}',
            controller: ArticleCoucheByDemandeController::class,
            name: 'articleCoucheByDemande'
        )
    ],
    normalizationContext: ['groups' => ['articles:read']],
    denormalizationContext: ['groups' => ['articles:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['type_article' => 'exact', 'fournisseur_article' => 'exact'])]
class Articles
{
    #[ORM\Id]
    #[ORM\Column(type: Types::BIGINT)]
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read', 'articlesPatch:write'])]
    #[SerializedName('designationArticle')]
    private ?string $designation_article = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read', 'articlesPatch:write'])]
    #[SerializedName('RALArticle')]
    private ?string $ral_article = null;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'articles_fournisseur')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read', 'articlesPatch:write'])]
    #[SerializedName('fournisseurArticle')]
    private ?Fournisseur $fournisseur_article = null;

    #[ORM\ManyToMany(targetEntity: ArticleCouche::class, inversedBy: 'articles_articleCouche')]
    #[ORM\JoinTable(name: 'articles_article_couche')]
    private Collection $articleCouches_article;

    #[ORM\OneToMany(targetEntity: Stocks::class, mappedBy: 'article_stock')]
    private Collection $stocks_article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): ?static
    {
        $this->id = $id;

        return $this;
    }

    public function getDesignationArticle(): ?string
    {
        return $this->designation_article;
    }

    public function setDesignationArticle(string $designation_article): static
    {
        $this->designation_article = $designation_article;

        return $this;
    }


    public function getCouches(): ?Collection
    {
        return $this->articleCouches_article;
    }

    public function addCouche(ArticleCouche $couches): static
    {
        if (!$this->articleCouches_article->contains($couches)) {
            $this->articleCouches_article[] = $couches;
        }

        return $this;
    }

    public function removeCouche(ArticleCouche $couches): static
    {
        $this->articleCouches_article->removeElement($couches);

        return $this;
    }

    public function getStocksArticle(): Collection
    {
        return $this->stocks_article;
    }

    public function addStock(?Stocks $stock): static
    {
        if (!$this->stocks_article->contains($stock)) {
            $this->stocks_article[] = $stock;
            $stock->setArticleStock($this);
        }

        return $this;
    }

    public function removeStock(Stocks $stock): static
    {
        $this->stocks_article->removeElement($stock);

        return $this;
    }

    public function getRalArticle(): ?string
    {
        return $this->ral_article;
    }

    public function setRalArticle(?string $ral_article): void
    {
        $this->ral_article = $ral_article;
    }

    public function getFournisseurArticle(): ?Fournisseur
    {
        return $this->fournisseur_article;
    }

    public function setFournisseurArticle(?Fournisseur $fournisseur_article): void
    {
        $this->fournisseur_article = $fournisseur_article;
    }
}
