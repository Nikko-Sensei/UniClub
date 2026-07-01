<?php

namespace App\Auth\Domain\Exceptions;

class DuplicateEmailException extends AuthException
{
    protected string $field = 'email';

    public function __construct(
        string $message = "Email already exists."
    ) {
        parent::__construct($message);
    }
}