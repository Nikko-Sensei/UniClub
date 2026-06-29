<?php

namespace App\Auth\Domain\Exceptions;

class DuplicateEmailException extends AuthException
{
    public function __construct(
        string $message = "Email already exists."
    ) {
        parent::__construct($message);
    }
   
}