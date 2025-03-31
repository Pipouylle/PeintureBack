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
use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Patch(),
        new Post(),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['fournisseur:read']],
    denormalizationContext: ['groups' => ['fournisseur:write']],
)]
#[ApiFilter(SearchFilter::class, properties: ['nom_fournisseur' => 'exact'])]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['fournisseur:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['fournisseur:read', 'fournisseur:write'])]
    #[SerializedName('nomFournisseur')]
    private ?string $nom_fournisseur = null;

    #[ORM\OneToMany(targetEntity: Systemes::class, mappedBy: 'fournisseur_systeme')]
    #[SerializedName('systemesFournisseur')]
    private Collection $systemes_fournisseur;

    #[ORM\OneToMany(targetEntity: Articles::class, mappedBy: 'fournisseur_article')]
    #[SerializedName('articlesFournisseur')]
    private Collection $articles_fournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFournisseur(): ?string
    {
        return $this->nom_fournisseur;
    }

    public function setNomFournisseur(?string $nom_fournisseur): static
    {
        $this->nom_fournisseur = $nom_fournisseur;

        return $this;
    }

    public function getSystemesFournisseur(): Collection
    {
        return $this->systemes_fournisseur;
    }

    public function addSysteme(?Systemes $systeme): static
    {
        if (!$this->systemes_fournisseur->contains($systeme)) {
            $this->systemes_fournisseur[] = $systeme;
            $systeme->setFournisseurSysteme($this);
        }

        return $this;
    }

    public function removeSysteme(?Systemes $systeme): static
    {
        if ($this->systemes_fournisseur->removeElement($systeme)) {
            if ($systeme->getFournisseurSysteme() === $this) {
                $systeme->setFournisseurSysteme(null);
            }
        }

        return $this;
    }

    public function getArticlesFournisseur(): Collection
    {
        return $this->articles_fournisseur;
    }

    public function addArticle(?Articles $article): static
    {
        if (!$this->articles_fournisseur->contains($article)) {
            $this->articles_fournisseur[] = $article;
            $article->setFournisseurArticle($this);
        }

        return $this;
    }

    public function removeArticle(?Articles $article): static
    {
        if ($this->articles_fournisseur->removeElement($article)) {
            if ($article->getFournisseurArticle() === $this) {
                $article->setFournisseurArticle(null);
            }
        }

        return $this;
    }
}
