<?php

namespace App\Auth\Domain\Exceptions;


class InvalidUserNameException extends AuthException
{

    public function __construct(
        string $message = "Invalid username."
    )
    {
        parent::__construct($message);
    }

}