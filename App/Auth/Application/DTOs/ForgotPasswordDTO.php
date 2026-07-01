<?php

namespace App\Auth\Application\DTOs;


final class ForgotPasswordDTO
{
    public function __construct(
        public readonly string $email
    ) {}
}