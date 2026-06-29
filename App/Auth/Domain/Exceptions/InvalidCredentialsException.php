<?php

namespace App\Auth\Domain\Exceptions;

class InvalidCredentialsException extends AuthException
{
    public function __construct(
        string $message = "Invalid credentials."
    ) {
        parent::__construct($message);
    }
}