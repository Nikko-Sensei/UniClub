<?php

namespace App\Club\Domain\Entities;

class Club
{
    private ?int $id;

    private int $categoryId;

    private string $name;

    private ?string $shortName;

    private ?string $description;

    private ?string $mission;

    private ?string $vision;

    private ?string $logo;

    private ?string $banner;

    private ?string $email;

    private ?string $phone;

    private ?string $establishedDate;

    private ?int $memberLimit;

    private int $memberCount;

    private string $status;

    private ?int $createdBy;

    private ?string $deletedAt;

    private ?string $createdAt;

    private ?string $updatedAt;


    public function __construct(
        ?int $id,
        int $categoryId,
        string $name,
        ?string $shortName = null,
        ?string $description = null,
        ?string $mission = null,
        ?string $vision = null,
        ?string $logo = null,
        ?string $banner = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $establishedDate = null,
        ?int $memberLimit = null,
        int $memberCount = 0,
        string $status = 'active',
        ?int $createdBy = null,
        ?string $deletedAt = null,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->description = $description;
        $this->mission = $mission;
        $this->vision = $vision;
        $this->logo = $logo;
        $this->banner = $banner;
        $this->email = $email;
        $this->phone = $phone;
        $this->establishedDate = $establishedDate;
        $this->memberLimit = $memberLimit;
        $this->memberCount = $memberCount;
        $this->status = $status;
        $this->createdBy = $createdBy;
        $this->deletedAt = $deletedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getShortName(): ?string
    {
        return $this->shortName;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function getMission(): ?string
    {
        return $this->mission;
    }


    public function getVision(): ?string
    {
        return $this->vision;
    }


    public function getLogo(): ?string
    {
        return $this->logo;
    }


    public function getBanner(): ?string
    {
        return $this->banner;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function getPhone(): ?string
    {
        return $this->phone;
    }


    public function getEstablishedDate(): ?string
    {
        return $this->establishedDate;
    }


    public function getMemberLimit(): ?int
    {
        return $this->memberLimit;
    }

    public function getMemberCount(): int
    {
        return $this->memberCount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }


    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }


    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }


    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }


    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }


    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
