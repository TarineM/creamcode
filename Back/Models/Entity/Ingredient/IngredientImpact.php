<?php

namespace Models\Entity\Ingredient;

class IngredientImpact
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string
     */
    private $impactLevel;
    /**
     * @var string
     */
    private $color;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setImpactLevel($data['impact_level']);
        $this->setColor($data['color']);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getImpactLevel(): string
    {
        return $this->impactLevel;
    }

    public function setImpactLevel(string $impactLevel): void
    {
        $this->impactLevel = $impactLevel;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}
