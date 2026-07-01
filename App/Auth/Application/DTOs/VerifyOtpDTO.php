<?php

namespace App\Auth\Application\DTOs;

final class VerifyOtpDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $otp
    ) {}
}