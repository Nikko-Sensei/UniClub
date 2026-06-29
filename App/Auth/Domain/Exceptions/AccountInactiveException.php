<?php

namespace App\Auth\Domain\Exceptions;

class AccountInactiveException extends AuthException
{
    public function __construct(
        string $message = "Your account is inactive. Please contact the administrator."
    ) {
        parent::__construct($message);
    }
   
}