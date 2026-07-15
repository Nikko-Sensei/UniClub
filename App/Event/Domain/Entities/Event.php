<?php

namespace App\Event\Domain\Entities;


class Event
{
    private ?int $id;

    private int $clubId;

    private int $categoryId;

    private string $title;

    private ?string $description;

    private ?string $venue;

    private ?string $eventDate;

    private ?string $startTime;

    private ?string $endTime;

    private ?int $capacity;

    private ?string $registrationDeadline;

    private ?string $banner;

    private bool $certificateEnabled;

    private string $status;

    private ?int $createdBy;

    private ?string $createdAt;

    private ?string $updatedAt;


    public function __construct(
        ?int $id,
        int $clubId,
        int $categoryId,
        string $title,
        ?string $description,
        ?string $venue,
        ?string $eventDate,
        ?string $startTime,
        ?string $endTime,
        ?int $capacity,
        ?string $registrationDeadline,
        ?string $banner,
        bool $certificateEnabled,
        string $status,
        ?int $createdBy,
        ?string $createdAt,
        ?string $updatedAt
    ) {

        $this->id = $id;

        $this->clubId = $clubId;

        $this->categoryId = $categoryId;

        $this->title = $title;

        $this->description = $description;

        $this->venue = $venue;

        $this->eventDate = $eventDate;

        $this->startTime = $startTime;

        $this->endTime = $endTime;

        $this->capacity = $capacity;

        $this->registrationDeadline = $registrationDeadline;

        $this->banner = $banner;

        $this->certificateEnabled = $certificateEnabled;

        $this->status = $status;

        $this->createdBy = $createdBy;

        $this->createdAt = $createdAt;

        $this->updatedAt = $updatedAt;

    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getClubId(): int
    {
        return $this->clubId;
    }


    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function getVenue(): ?string
    {
        return $this->venue;
    }


    public function getEventDate(): ?string
    {
        return $this->eventDate;
    }


    public function getStartTime(): ?string
    {
        return $this->startTime;
    }


    public function getEndTime(): ?string
    {
        return $this->endTime;
    }


    public function getCapacity(): ?int
    {
        return $this->capacity;
    }


    public function getRegistrationDeadline(): ?string
    {
        return $this->registrationDeadline;
    }


    public function getBanner(): ?string
    {
        return $this->banner;
    }


    public function isCertificateEnabled(): bool
    {
        return $this->certificateEnabled;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }


    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }


    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }
}