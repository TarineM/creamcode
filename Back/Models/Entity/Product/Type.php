<?php

namespace Models\Entity\Product;

class Type
{
    private $id;

    private $name;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name']);
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
}