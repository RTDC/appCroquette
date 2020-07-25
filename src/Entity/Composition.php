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
     * @ORM\Column(type="float")
     */
    private $percent_proteine;

    /**
     * @ORM\Column(type="float")
     */
    private $percent_fat;

    /**
     * @ORM\Column(type="float")
     */
    private $percent_ashes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="float")
     */
    private $percent_carbohydrates;

    /**
     * @ORM\Column(type="integer")
     */
    private $ean;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_affiliation;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercentProteine(): ?float
    {
        return $this->percent_proteine;
    }

    public function setPercentProteine(float $percent_proteine): self
    {
        $this->percent_proteine = $percent_proteine;

        return $this;
    }

    public function getPercentFat(): ?float
    {
        return $this->percent_fat;
    }

    public function setPercentFat(float $percent_fat): self
    {
        $this->percent_fat = $percent_fat;

        return $this;
    }

    public function getPercentAshes(): ?float
    {
        return $this->percent_ashes;
    }

    public function setPercentAshes(float $percent_ashes): self
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

    public function getPercentCarbohydrates(): ?float
    {
        return $this->percent_carbohydrates;
    }

    public function setPercentCarbohydrates(float $percent_carbohydrates): self
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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getUrlAffiliation(): ?string
    {
        return $this->url_affiliation;
    }

    public function setUrlAffiliation(?string $url_affiliation): self
    {
        $this->url_affiliation = $url_affiliation;

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
}
