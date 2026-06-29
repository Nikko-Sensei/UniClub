<?php

namespace App\Auth\Domain\Exceptions;


class InvalidPhoneNumberException extends AuthException
{

    public function __construct(
        string $message = "Invalid phone number."
    )
    {
        parent::__construct($message);
    }

}