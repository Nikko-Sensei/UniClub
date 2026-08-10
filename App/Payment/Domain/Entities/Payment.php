<?php

namespace App\Payment\Domain\Entities;

class Payment
{
    private ?int $id;

    private int $userId;

    private int $clubId;

    private float $amount;

    private string $paymentMethod;

    private ?string $transactionNumber;

    private ?string $receiptImage;

    private string $status;

    private ?int $verifiedBy;

    private ?string $verifiedAt;

    private ?string $createdAt;

    private ?string $updatedAt;

    private ?string $deletedAt;

    public function __construct(
        ?int $id,
        int $userId,
        int $clubId,
        float $amount,
        string $paymentMethod,
        ?string $transactionNumber,
        ?string $receiptImage,
        string $status = 'pending',
        ?int $verifiedBy = null,
        ?string $verifiedAt = null,
        ?string $createdAt = null,
        ?string $updatedAt = null,
        ?string $deletedAt = null
    ) {

        $this->id = $id;
        $this->userId = $userId;
        $this->clubId = $clubId;
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->transactionNumber = $transactionNumber;
        $this->receiptImage = $receiptImage;
        $this->status = $status;
        $this->verifiedBy = $verifiedBy;
        $this->verifiedAt = $verifiedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getClubId(): int
    {
        return $this->clubId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getTransactionNumber(): ?string
    {
        return $this->transactionNumber;
    }

    public function getReceiptImage(): ?string
    {
        return $this->receiptImage;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getVerifiedBy(): ?int
    {
        return $this->verifiedBy;
    }

    public function getVerifiedAt(): ?string
    {
        return $this->verifiedAt;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }
}