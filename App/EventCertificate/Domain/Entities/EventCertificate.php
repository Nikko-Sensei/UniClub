<?php

namespace App\EventCertificate\Domain\Entities;

class EventCertificate
{

    private ?int $id;

    private int $eventId;

    private int $userId;

    private string $certificateNumber;

    private ?string $filePath;

    private ?int $issuedBy;

    private ?string $issuedAt;

    private ?string $createdAt;

    private ?string $updatedAt;



    public function __construct(

        ?int $id,

        int $eventId,

        int $userId,

        string $certificateNumber,

        ?string $filePath,

        ?int $issuedBy = null,

        ?string $issuedAt = null,

        ?string $createdAt = null,

        ?string $updatedAt = null

    ) {

        $this->id = $id;

        $this->eventId = $eventId;

        $this->userId = $userId;

        $this->certificateNumber = $certificateNumber;

        $this->filePath = $filePath;

        $this->issuedBy = $issuedBy;

        $this->issuedAt = $issuedAt;

        $this->createdAt = $createdAt;

        $this->updatedAt = $updatedAt;

    }



    public function getId(): ?int
    {
        return $this->id;
    }



    public function getEventId(): int
    {
        return $this->eventId;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }



    public function getCertificateNumber(): string
    {
        return $this->certificateNumber;
    }



    public function getFilePath(): ?string
    {
        return $this->filePath;
    }



    public function getIssuedBy(): ?int
    {
        return $this->issuedBy;
    }



    public function getIssuedAt(): ?string
    {
        return $this->issuedAt;
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