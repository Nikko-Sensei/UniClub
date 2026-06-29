<?php

namespace App\Auth\Domain\Exceptions;

class DuplicateStudentIdException extends AuthException
{
    public function __construct(
        string $message = "This student ID is already registered."
    ) {
        parent::__construct($message);
    }
}