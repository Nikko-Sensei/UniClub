<?php

namespace App\Auth\Domain\Exceptions;

class RegistrationFailedException extends AuthException
{
 public function __construct(
        string $message = "Unable to create account. Please try again."
    )
    {
        parent::__construct($message);
    }
}