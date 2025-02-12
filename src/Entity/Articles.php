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
            uriTemplate: '/articleCouche/{demandeId}',
            controller: ArticleCoucheByDemandeController::class,
            name: 'articleCoucheByDemande'
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
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['articles:read', 'articles:write', 'articleCoucheForDemande:read'])]
    #[SerializedName('designationArticle')]
    private ?string $designation_article = null;

    #[ORM\OneToMany(targetEntity: Consommations::class, mappedBy: 'codeArticle_consommation', cascade: ['persist', 'remove'])]
    private Collection $consommation_article;


    #[ORM\ManyToMany(targetEntity: ArticleCouche::class, inversedBy: 'articles_articleCouche')]
    #[ORM\JoinTable(name: 'articles_article_couche')]
    private Collection $articleCouches_article;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getConsommation(): Collection
    {
        return $this->consommation_article;
    }

    public function addConsommation(Consommations $consommations): static
    {
        if (!$this->consommation_article->contains($consommations)) {
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
}
