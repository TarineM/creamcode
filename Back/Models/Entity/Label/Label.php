<?php

namespace Models\Entity\Label;

use FileSystem\Image;

class Label
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
     * @var Image
     */
    private $picture;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name']);
        $this->setPicture($data['picture']);
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

    public function getPicture(): Image
    {
        return $this->picture;
    }

    public function setPicture(Image $picture): void
    {
        $this->picture = $picture;
    }
}