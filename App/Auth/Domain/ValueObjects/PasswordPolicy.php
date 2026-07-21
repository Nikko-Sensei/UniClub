<?php

namespace App\Auth\Domain\ValueObjects;


final class PasswordPolicy
{


    public function __construct(

        private int $minimumLength,

        private bool $requireUppercase,

        private bool $requireNumber

    )
    {

    }





    public function minimumLength(): int
    {
        return $this->minimumLength;
    }





    public function requiresUppercase(): bool
    {
        return $this->requireUppercase;
    }





    public function requiresNumber(): bool
    {
        return $this->requireNumber;
    }


}