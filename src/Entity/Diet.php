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
    private ?string $Type = null;

    #[ORM\ManyToMany(targetEntity: Recipes::class, mappedBy: 'diet')]
    private Collection $recipes;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'diet')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: user::class, inversedBy: 'diets')]
    private Collection $relation;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, Recipes>
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipes $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->addDiet($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): self
    {
        if ($this->recipes->removeElement($recipe)) {
            $recipe->removeDiet($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addDiet($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeDiet($this);
        }

        return $this;
    }

    public function __toString() {

        return $this->getType();
    }

    /**
     * @return Collection<int, user>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(user $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(user $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }
}
