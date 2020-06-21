<?php

namespace Models\Entity\Product;

use Models\Entity\Brand;
use FileSystem\Image;

class Product
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
     * @var bool|null
     */
    private $hasAlternative;
    /**
     * @var array|null
     */
    private $alternativeProducts;
    /**
     * @var Brand
     */
    private $brand;
    /**
     * @var Type
     */
    private $type;
    /**
     * @var Image
     */
    private $picture;
    /**
     * @var Composition||null
     */
    private $composition;
    /**
     * @var array|null
     */
    private $certifications;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name']);
        $this->setHasAlternative($data['has_alternative'] ?? null);
        $this->setAlternativeProducts($data['alternative_products'] ?? null);
        $this->setBrand($data['brand']);
        $this->setType($data['type']);
        $this->setPicture($data['picture']);
        $this->setComposition($data['composition'] ?? null);
        $this->setCertifications($data['certifications'] ?? null);
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

    public function getHasAlternative(): ?bool
    {
        return $this->hasAlternative;
    }

    public function setHasAlternative(?bool $hasAlternative): void
    {
        $this->hasAlternative = $hasAlternative;
    }

    public function getAlternativeProducts(): ?array
    {
        return $this->alternativeProducts;
    }

    public function setAlternativeProducts(?array $alternativeProducts): void
    {
        $this->alternativeProducts = $alternativeProducts;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getPicture(): Image
    {
        return $this->picture;
    }

    public function setPicture(Image $picture): void

    {
        $this->picture = $picture;
    }

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function setComposition(?Composition $composition): void
    {
        $this->composition = $composition;
    }

    public function getCertifications(): ?array
    {
        return $this->certifications;
    }

    public function setCertifications(?array $certifications): void
    {
        $this->certifications = $certifications;
    }
}