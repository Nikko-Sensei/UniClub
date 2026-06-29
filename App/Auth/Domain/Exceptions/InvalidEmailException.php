<?php

namespace App\Auth\Domain\Exceptions;


class InvalidEmailException extends AuthException
{

    public function __construct(
        string $message = "Invalid email address."
    )
    {
        parent::__construct($message);
    }

}