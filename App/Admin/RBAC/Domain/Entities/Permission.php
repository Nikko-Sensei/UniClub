<?php

namespace App\Admin\RBAC\Domain\Entities;

class Permission
{
    private int $id;

    private string $name;

    private string $slug;

    private string $module;

    private ?string $description;

    public function __construct(
        int $id,
        string $name,
        string $slug,
        string $module,
        ?string $description = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->module = $module;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getModule(): string
    {
        return $this->module;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}