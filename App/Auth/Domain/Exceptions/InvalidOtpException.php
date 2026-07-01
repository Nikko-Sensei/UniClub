<?php

namespace App\Auth\Domain\Exceptions;


class InvalidOtpException extends AuthException
{

    public function __construct(
        string $message = "Invalid OTP."
    )
    {
        parent::__construct($message);
    }

}