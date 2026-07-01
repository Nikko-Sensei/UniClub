<?php

namespace App\Auth\Application\DTOs;


final class ResetPasswordDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $otp,
        public readonly string $password
    ) {}
}