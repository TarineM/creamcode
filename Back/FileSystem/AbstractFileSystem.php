<?php

namespace FileSystem;

abstract class AbstractFileSystem
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
     * @var string
     */
    protected $type;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? null);
        $this->setName($data['name'] ?? null);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

}