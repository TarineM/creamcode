<?php

namespace Models\Entity\Ingredient;

class Ingredient
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var IngredientOrigin
     */
    private $origin;
    /**
     * @var IngredientImpact
     */
    private $humanImpact;
    /**
     * @var IngredientImpact
     */
    private $environmentImpact;
    /**
     * @var string|null
     */
    private $metadata;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name']);
        $this->setOrigin($data['origin']);
        $this->setHumanImpact($data['human_impact']);
        $this->setEnvironmentImpact($data['environment_impact']);
        $this->setMetadata($data['metadata'] ?? null);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOrigin(): IngredientOrigin
    {
        return $this->origin;
    }

    public function setOrigin(IngredientOrigin $origin): void
    {
        $this->origin = $origin;
    }

    public function getHumanImpact(): IngredientImpact
    {
        return $this->humanImpact;
    }

    public function setHumanImpact(IngredientImpact $humanImpact): void
    {
        $this->humanImpact = $humanImpact;
    }

    public function getEnvironmentImpact(): IngredientImpact
    {
        return $this->environmentImpact;
    }

    public function setEnvironmentImpact(IngredientImpact $environmentImpact): void
    {
        $this->environmentImpact = $environmentImpact;
    }

    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    public function setMetadata(?string $metadata): void
    {
        $this->metadata = $metadata;
    }
}