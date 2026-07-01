<?php

namespace App\Auth\Domain\Entity;

class PasswordResetOtp
{
    public function __construct(
        private ?int $id,
        private int $userId,
        private string $otp,
        private string $expiresAt,
        private ?string $usedAt = null
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getOtp(): string
    {
        return $this->otp;
    }

    public function isUsed(): bool
    {
        return $this->usedAt !== null;
    }

    public function isExpired(): bool
    {
        return strtotime($this->expiresAt) < time();
    }
}