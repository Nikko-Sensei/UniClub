<?php

namespace App\Auth\Domain\Exceptions;

class InvalidStudentIdException extends AuthException
{
    public function __construct(
        string $message = "Invalid student ID."
    )
    {
        parent::__construct($message);
    }
}