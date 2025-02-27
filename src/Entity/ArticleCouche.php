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
use App\Controller\ArticleCoucheBySystemeController;
use App\Controller\ArticleCoucheByCommandeController;
use App\Repository\ArticleCoucheRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: ArticleCoucheRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Patch(),
        new Post(),
        new Delete(),
        new GetCollection(
            uriTemplate: '/articlesArticleCouches',
            normalizationContext: ['groups' => ['articles_articleCouche:read']],
            name: 'articles articleCouches'
        ),
        new Get(
            uriTemplate: '/articlesArticleCouche/{id}',
            normalizationContext: ['groups' => ['articles_articleCouche:read']],
            name: 'articles articleCouche'
        ),
        new Patch(
            uriTemplate: '/articlesArticleCouche/{id}',
            normalizationContext: ['groups' => ['articles_articleCouche:read']],
            denormalizationContext: ['groups' => ['articles_articleCouche:write']],
            name: 'update articles articleCouche'
        ),
        new GetCollection(
            uriTemplate: '/articleCoucheDemande/{CommandeId}',
            controller: ArticleCoucheByCommandeController::class,
            normalizationContext: ['groups' => ['articleCoucheForDemande:read']],
            name: 'articleCoucheDemande',
        ),
        new GetCollection(
            uriTemplate: '/articleCoucheBySystemeAndCommande/{systemeId}/{commandeId}',
            controller: ArticleCoucheBySystemeController::class,
            normalizationContext: ['groups' => ['articleCoucheBySystemeAndCommande:read']],
            name: 'get All article by systeme id',
        ),
    ],
    normalizationContext: ['groups' => ['article_couche:read']],
    denormalizationContext: ['groups' => ['article_couche:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['article_articleCouche' => 'exact', 'couche_articleCouche' => 'exact', 'commande_articleCouche' => 'exact'])]
class ArticleCouche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['article_couche:read' , 'articles_articleCouche:read', 'articleCoucheForDemande:read', 'articleCoucheBySystemeAndCommande:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Groups(['article_couche:read', 'article_couche:write', 'articleCoucheForDemande:read', 'articleCoucheBySystemeAndCommande:read'])]
    #[SerializedName('tarifArticleCouche')]
    private ?string $tarif_articleCouche = null;

    #[ORM\ManyToMany(targetEntity: Articles::class, mappedBy: 'articleCouches_article')]
    #[Groups(['articles_articleCouche:read', 'articles_articleCouche:write', 'articleCoucheForDemande:read', 'articleCoucheBySystemeAndCommande:read'])]
    #[SerializedName('articlesArticleCouche')]
    private ?Collection $articles_articleCouche;

    #[ORM\ManyToOne(targetEntity: Couches::class, inversedBy: 'articleCouches_couche')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['article_couche:read', 'article_couche:write', 'articleCoucheForDemande:read', 'articleCoucheBySystemeAndCommande:read'])]
    #[SerializedName('coucheArticleCouche')]
    private ?Couches $couche_articleCouche = null;

    #[ORM\ManyToOne(targetEntity: Commandes::class, inversedBy: 'articleCouches_commande')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['article_couche:read', 'article_couche:write', 'articleCoucheForDemande:read', 'articleCoucheBySystemeAndCommande:read'])]
    #[SerializedName('commandeArticleCouche')]
    private ?Commandes $commande_articleCouche = null;

    #[ORM\OneToMany(targetEntity: SurfaceCouches::class, mappedBy: 'articleCouche_surfaceCouche')]
    private Collection $surfaceCouches_articleCouche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifArticleCouche(): ?string
    {
        return $this->tarif_articleCouche;
    }

    public function setTarifArticleCouche(?string $tarif_articleCouche): void
    {
        $this->tarif_articleCouche = $tarif_articleCouche;
    }

    public function getArticlesArticleCouche(): ?Collection
    {
        return $this->articles_articleCouche;
    }

    public function setArticlesArticleCouche(Collection $articlesArticleCouche): static
    {
        $this->articles_articleCouche = $articlesArticleCouche;

        return $this;
    }

    public function addArticlesArticleCouche(Articles $articlesArticleCouche): static
    {
        if (!$this->articles_articleCouche->contains($articlesArticleCouche)) {
            $this->articles_articleCouche[] = $articlesArticleCouche;
            $articlesArticleCouche->addCouche($this);
        }

        return $this;
    }

    public function removeArticlesArticleCouche(Articles $articlesArticleCouche): static
    {
        $this->articles_articleCouche->removeElement($articlesArticleCouche);

        return $this;
    }

    public function getCoucheArticleCouche(): ?Couches
    {
        return $this->couche_articleCouche;
    }

    public function setCoucheArticleCouche(?Couches $couche_articleCouche): void
    {
        $this->couche_articleCouche = $couche_articleCouche;
    }

    public function getCommandeArticleCouche(): ?Commandes
    {
        return $this->commande_articleCouche;
    }

    public function setCommandeArticleCouche(?Commandes $commande_articleCouche): void
    {
        $this->commande_articleCouche = $commande_articleCouche;
    }

    public function getSurfaceCouchesArticleCouche(): Collection
    {
        return $this->surfaceCouches_articleCouche;
    }

    public function addSurfaceCouchesArticleCouche(SurfaceCouches $surfaceCouchesArticleCouche): void
    {
        if (!$this->surfaceCouches_articleCouche->contains($surfaceCouchesArticleCouche)) {
            $this->surfaceCouches_articleCouche[] = $surfaceCouchesArticleCouche;
            $surfaceCouchesArticleCouche->setArticleCoucheSurfaceCouche($this);
        }
    }

    public function removeSurfaceCouchesArticleCouche(SurfaceCouches $surfaceCouchesArticleCouche): void
    {
        if ($this->surfaceCouches_articleCouche->removeElement($surfaceCouchesArticleCouche)) {
            // set the owning side to null (unless already changed)
            if ($surfaceCouchesArticleCouche->getArticleCoucheSurfaceCouche() === $this) {
                $surfaceCouchesArticleCouche->setArticleCoucheSurfaceCouche(null);
            }
        }
    }


}
