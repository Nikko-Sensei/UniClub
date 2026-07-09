<?php

namespace App\Master\Domain\Entities;

class ClubCategory
{
    public function __construct(
        private int $id,
        private string $name,
        private ?string $description = null
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}