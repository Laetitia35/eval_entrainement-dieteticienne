<?php

namespace App\Entity;

use App\Repository\DietRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DietRepository::class)]
class Diet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Recipes::class, mappedBy: 'Diet')]
    private Collection $Allergen;

    public function __construct()
    {
        $this->Diet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Recipes>
     */
    public function getDiet(): Collection
    {
        return $this->Diet;
    }

    public function addDiet(Recipes $diet): self
    {
        if (!$this->Diet->contains($diet)) {
            $this->Diet->add($diet);
            $diet->addDiet($this);
        }

        return $this;
    }

    public function removeDiet(Recipes $diet): self
    {
        if ($this->Diet->removeElement($diet)) {
            $diet->removeDiet($this);
        }

        return $this;
    }
}
