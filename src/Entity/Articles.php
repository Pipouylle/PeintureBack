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
use App\Controller\ArticlesTypesController;
use App\Controller\ArticlesController;
use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete(),
        new Patch(),
        new GetCollection(
            uriTemplate: '/articlesTypes',
            controller: ArticlesTypesController::class,
            name: 'ArticlesCategories'
        )
    ],
    normalizationContext: ['groups' => ['articles:read']],
    denormalizationContext: ['groups' => ['articles:write']]
)]
#[ApiFilter(SearchFilter::class, properties: ['type_article' => 'exact','fournisseur_article' => 'exact'])]
class Articles
{
    #[ORM\Id]
    #[ORM\Column(type: Types::BIGINT)]
    #[Groups(['articles:read', 'articles:write'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['articles:read', 'articles:write'])]
    #[SerializedName('nomArticle')]
    private ?string $nom_article = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['articles:read', 'articles:write'])]
    #[SerializedName('RALArticle')]
    private ?string $RAL_article = null;

    #[ORM\Column(type: Types::BIGINT)]
    #[Groups(['articles:read', 'articles:write'])]
    #[SerializedName('stockArticle')]
    private ?string $stock_article = null;


    #[ORM\Column(length: 50)]
    #[Groups(['articles:read', 'articles:write'])]
    #[SerializedName('fournisseurArticle')]
    private ?string $fournisseur_article = null;

    #[ORM\Column(length: 50)]
    #[Groups(['articles:read', 'articles:write'])]
    #[SerializedName('typeArticle')]
    private ?string $type_article = null;

    #[ORM\OneToMany(targetEntity: Consommations::class, mappedBy: 'codeArticle_consommation', cascade: ['persist', 'remove'])]
    private Collection $consommation_article;

    #[ORM\OneToMany(targetEntity: Couches::class, mappedBy: 'codeArticle_couche', cascade: ['persist', 'remove'])]
    private Collection $Couches_article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArticle(): ?string
    {
        return $this->nom_article;
    }

    public function setNomArticle(string $nom_article): static
    {
        $this->nom_article = $nom_article;

        return $this;
    }

    public function getRALArticle(): ?string
    {
        return $this->RAL_article;
    }

    public function setRALArticle(string $RAL_article): static
    {
        $this->RAL_article = $RAL_article;

        return $this;
    }

    public function getStockArticle(): ?string
    {
        return $this->stock_article;
    }

    public function setStockArticle(string $stock_article): static
    {
        $this->stock_article = $stock_article;

        return $this;
    }

    public function getFournisseurArticle(): ?string
    {
        return $this->fournisseur_article;
    }

    public function setFournisseurArticle(?string $fournisseur_article): void
    {
        $this->fournisseur_article = $fournisseur_article;
    }

    public function getTypeArticle(): ?string
    {
        return $this->type_article;
    }

    public function setTypeArticle(string $categorie_article): static
    {
        $this->type_article = $categorie_article;
        return $this;
    }


    public function getConsommation(): Collection
    {
        return $this->consommation_article;
    }

    public function addConsommation(Consommations $consommations): static
    {
        if ($this->consommation_article->contains($consommations)) {
            $this->consommation_article[] = $consommations;
            $consommations->setCodeArticleConsommation($this);
        }
        return $this;
    }

    public function removeConsommation(Consommations $consommations): static
    {
        if ($this->consommation_article->removeElement($consommations)) {
            if ($consommations->getCodeArticleConsommation() === $this) {
                $consommations->setCodeArticleConsommation(null);
            }
        }

        return $this;
    }


    public function getCouches(): ?Collection
    {
        return $this->Couches_article;
    }

    public function addCouche(Couches $couches): static
    {
        if ($this->Couches_article->contains($couches)) {
            $this->Couches_article[] = $couches;
            $couches->setCodeArticleCouche($this);
        }

        return $this;
    }

    public function removeCouche(Couches $couches): static
    {
        if ($this->Couches_article->removeElement($couches)) {
            if ($couches->getCodeArticleCouche() === $this) {
                $couches->setCodeArticleCouche(null);
            }
        }
        return $this;
    }
}
