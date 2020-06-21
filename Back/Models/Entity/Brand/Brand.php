<?php

namespace Models\Entity\Brand;

use FileSystem\Folder;
use FileSystem\Image;

class Brand
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
     * @var array|null
     */
    private $products;
    /**
     * @var Folder
     */
    private $folder;
    /**
     * @var Image
     */
    private $picture;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name']);
        $this->setFolder($data['folder']);
        $this->setPicture($data['picture']);
        $this->setProducts($data['products'] ?? null);
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

    /**
     * @return Product[]
     */
    public function getProducts(): ?array
    {
        return $this->product;
    }

    public function setProducts(?array $products): void
    {
        $this->products = $products;
    }

    public function getFolder(): Folder
    {
        return $this->folder;
    }

    public function setFolder(Folder $folder): void
    {
        $this->folder = $folder;
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