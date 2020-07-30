<?php

namespace App\Entity;

use App\Repository\CompositionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompositionRepository::class)
 */
class Composition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percent_proteine;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percent_fat;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percent_ashes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percent_carbohydrates;

    /**
     * @ORM\Column(type="bigint")
     */
    private $ean;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredient_1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredient_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredient_3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $humidity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $type;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $cellulose;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercentProteine(): ?string
    {
        return $this->percent_proteine;
    }

    public function setPercentProteine(string $percent_proteine): self
    {
        $this->percent_proteine = $percent_proteine;

        return $this;
    }

    public function getPercentFat(): ?string
    {
        return $this->percent_fat;
    }

    public function setPercentFat(string $percent_fat): self
    {
        $this->percent_fat = $percent_fat;

        return $this;
    }

    public function getPercentAshes(): ?string
    {
        return $this->percent_ashes;
    }

    public function setPercentAshes(string $percent_ashes): self
    {
        $this->percent_ashes = $percent_ashes;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPercentCarbohydrates(): ?string
    {
        return $this->percent_carbohydrates;
    }

    public function setPercentCarbohydrates(string $percent_carbohydrates): self
    {
        $this->percent_carbohydrates = $percent_carbohydrates;

        return $this;
    }

    public function getEan(): ?int
    {
        return $this->ean;
    }

    public function setEan(int $ean): self
    {
        $this->ean = $ean;

        return $this;
    }
    public function getIngredient1(): ?string
    {
        return $this->ingredient_1;
    }

    public function setIngredient1(string $ingredient_1): self
    {
        $this->ingredient_1 = $ingredient_1;

        return $this;
    }

    public function getIngredient2(): ?string
    {
        return $this->ingredient_2;
    }

    public function setIngredient2(string $ingredient_2): self
    {
        $this->ingredient_2 = $ingredient_2;

        return $this;
    }

    public function getIngredient3(): ?string
    {
        return $this->ingredient_3;
    }

    public function setIngredient3(string $ingredient_3): self
    {
        $this->ingredient_3 = $ingredient_3;

        return $this;
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

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCellulose(): ?string
    {
        return $this->cellulose;
    }

    public function setCellulose(?string $cellulose): self
    {
        $this->cellulose = $cellulose;

        return $this;
    }
}
