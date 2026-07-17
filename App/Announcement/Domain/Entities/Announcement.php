<?php

namespace App\Announcement\Domain\Entities;


class Announcement
{
    private ?int $id;

    private ?int $clubId;

    private string $title;

    private string $content;

    private string $priority;

    private ?string $image;

    private string $status;

    private ?string $createdByName;

    private int $createdBy;

    private ?string $createdAt;

    private ?string $publishedAt;

    private ?string $updatedAt;


    public function __construct(
        ?int $id,
        ?int $clubId,
        string $title,
        string $content,
        string $priority,
        ?string $image,
        string $status,
        ?string $createdByName,
        int $createdBy,
        ?string $createdAt = null,
        ?string $publishedAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;

        $this->clubId = $clubId;

        $this->title = $title;

        $this->content = $content;

        $this->priority = $priority;

        $this->image = $image;

        $this->status = $status;

        $this->createdByName = $createdByName;

        $this->createdBy = $createdBy;

        $this->createdAt = $createdAt;

        $this->publishedAt = $publishedAt;

        $this->updatedAt = $updatedAt;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getClubId(): ?int
    {
        return $this->clubId;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getContent(): string
    {
        return $this->content;
    }


    public function getPriority(): string
    {
        return $this->priority;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getCreatedByName(): ?string
    {
        return $this->createdByName;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }


    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }


    public function getPublishedAt(): ?string
    {
        return $this->publishedAt;
    }


    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }
}