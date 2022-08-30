<?php

namespace App\Entity;

use App\Repository\RecipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipesRepository::class)]
class Recipes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Preparation_Time = null;

    #[ORM\Column]
    private ?int $timeout = null;

    #[ORM\Column]
    private ?int $Cooking_Time = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Ingredients = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Stage = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $illustration = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'recipes')]
    private Collection $user;

    #[ORM\ManyToMany(targetEntity: Allergen::class, inversedBy: 'recipes')]
    private Collection $allergen;

    #[ORM\ManyToMany(targetEntity: Diet::class, inversedBy: 'recipes')]
    private Collection $diet;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->allergen = new ArrayCollection();
        $this->diet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->Preparation_Time;
    }

    public function setPreparationTime(int $Preparation_Time): self
    {
        $this->Preparation_Time = $Preparation_Time;

        return $this;
    }

    public function getTimeout(): ?int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->Cooking_Time;
    }

    public function setCookingTime(int $Cooking_Time): self
    {
        $this->Cooking_Time = $Cooking_Time;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->Ingredients;
    }

    public function setIngredients(string $Ingredients): self
    {
        $this->Ingredients = $Ingredients;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->Stage;
    }

    public function setStage(string $Stage): self
    {
        $this->Stage = $Stage;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }

    /**
     * @return Collection<int, Allergen>
     */
    public function getAllergen(): Collection
    {
        return $this->allergen;
    }

    public function addAllergen(Allergen $allergen): self
    {
        if (!$this->allergen->contains($allergen)) {
            $this->allergen->add($allergen);
        }

        return $this;
    }

    public function removeAllergen(Allergen $allergen): self
    {
        $this->allergen->removeElement($allergen);

        return $this;
    }

    /**
     * @return Collection<int, Diet>
     */
    public function getDiet(): Collection
    {
        return $this->diet;
    }

    public function addDiet(Diet $diet): self
    {
        if (!$this->diet->contains($diet)) {
            $this->diet->add($diet);
        }

        return $this;
    }

    public function removeDiet(Diet $diet): self
    {
        $this->diet->removeElement($diet);

        return $this;
    }
}
