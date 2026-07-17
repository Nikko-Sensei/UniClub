<?php

namespace App\Contact\Domain\Entities;


class ContactMessage
{
    private ?int $id;

    private ?int $userId;

    private string $name;

    private string $email;

    private string $subject;

    private string $message;

    private string $status;

    private ?string $createdAt;

    private ?string $updatedAt;


    public function __construct(
        ?int $id,
        ?int $userId,
        string $name,
        string $email,
        string $subject,
        string $message,
        string $status = 'pending',
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUserId(): ?int
    {
        return $this->userId;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getSubject(): string
    {
        return $this->subject;
    }


    public function getMessage(): string
    {
        return $this->message;
    }


    public function getStatus(): string
    {
        return $this->status;
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