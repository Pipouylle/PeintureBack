<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['users:read']],
    denormalizationContext: ['groups' => ['users:write']],
    paginationEnabled: false,
)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['users:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['users:read', 'users:write'])]
    #[SerializedName('nameUser')]
    private ?string $name_user = null;

    #[ORM\OneToMany(targetEntity: Stocks::class, mappedBy: 'user_stock')]
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


}
