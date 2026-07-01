<?php

namespace App\Auth\Domain\Repository;


use App\Auth\Domain\Entity\PasswordResetToken;


interface PasswordResetRepositoryInterface
{
    public function createOtp(int $userId, string $otp, string $expiresAt): bool;

    public function findValidOtp(string $email, string $otp);

    public function markUsed(int $id): bool;
}