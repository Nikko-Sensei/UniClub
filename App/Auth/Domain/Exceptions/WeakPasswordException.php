<?php

namespace App\Auth\Domain\Exceptions;


class WeakPasswordException extends AuthException
{
    public function __construct(
        string $message = "Password must contain at least 8 characters."
    ) {
        parent::__construct($message);
    }
}