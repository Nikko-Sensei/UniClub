<?php

namespace App\Notification\Domain\Entity;


class Notification
{
    public function __construct(
        private int $id,
        private int $userId,
        private string $title,
        private string $message,
        private string $type,
        private ?string $referenceType,
        private ?int $referenceId,
        private bool $isRead,
        private string $createdAt
    ) {
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getUserId(): int
    {
        return $this->userId;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getMessage(): string
    {
        return $this->message;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function getReferenceType(): ?string
    {
        return $this->referenceType;
    }


    public function getReferenceId(): ?int
    {
        return $this->referenceId;
    }


    public function isRead(): bool
    {
        return $this->isRead;
    }


    public function markAsRead(): void
    {
        $this->isRead = true;
    }


    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}