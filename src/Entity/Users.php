<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Patch(
            uriTemplate: '/users/{id}',
            normalizationContext: ['groups' => ['users:read']],
            denormalizationContext: ['groups' => ['usersPatch:write']],
        )
    ],
    normalizationContext: ['groups' => ['users:read']],
    denormalizationContext: ['groups' => ['users:write']],
    paginationEnabled: false,
)]
#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'name_user' => 'exact', 'archive_user' => 'exact'])]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['users:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['users:read', 'users:write', 'usersPatch:write'])]
    #[SerializedName('nameUser')]
    private ?string $name_user = null;

    #[ORM\Column]
    #[Groups(['users:read', 'usersPatch:write'])]
    #[SerializedName('archiveUser')]
    private ?bool $archive_user = null;

    #[ORM\OneToMany(targetEntity: Stocks::class, mappedBy: 'user_stock')]
    #[SerializedName('stocksUser')]
    private Collection $stocks_user;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameUser(): ?string
    {
        return $this->name_user;
    }

    public function setNameUser(?string $name_user): static
    {
        $this->name_user = $name_user;

        return $this;
    }

    public function getStocksUser(): Collection
    {
        return $this->stocks_user;
    }

    public function addStock(?Stocks $stock): static
    {
        if (!$this->stocks_user->contains($stock)) {
            $this->stocks_user[] = $stock;
            $stock->setUserStock($this);
        }

        return $this;
    }

    public function removeStock(?Stocks $stock): static
    {
        $this->stocks_user->removeElement($stock);

        return $this;
    }

    #[ORM\PrePersist]
    public function setArchiveUserValue(): static
    {
        if ($this->archive_user === null) {
            $this->archive_user = false;
        }

        return $this;
    }

    public function isArchiveUser(): ?bool
    {
        return $this->archive_user;
    }

    public function setArchiveUser(bool $archive_user): static
    {
        $this->archive_user = $archive_user;

        return $this;
    }
}
