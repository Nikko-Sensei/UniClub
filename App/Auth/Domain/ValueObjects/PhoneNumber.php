<?php

namespace App\Auth\Domain\ValueObjects;

use App\Auth\Domain\Exceptions\InvalidPhoneNumberException;


final class PhoneNumber
{
    private string $value;


    public function __construct(
        string $phone
    ) {

        $phone = trim($phone);

        if (!preg_match(
            '/^09[0-9]{9}$/',
            $phone
        )) {

            throw new InvalidPhoneNumberException(
                "Phone no must be 11 digits starting with 09."
            );

        }

        $this->value = $phone;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}