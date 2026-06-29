<?php

namespace App\Auth\Domain\ValueObjects;

use App\Auth\Domain\Exceptions\WeakPasswordException;


final class Password
{
    private string $value;

    public function __construct(
        string $value
    ) {

        $value = trim($value);

        if ($value === '') {

            throw new WeakPasswordException(
                "Password is required."
            );
        }

        if (strlen($value) < 8) {

            throw new WeakPasswordException(
                "Password must contain at least 8 characters."
            );
        }

        if (!preg_match('/[a-zA-Z]/', $value)) {

            throw new WeakPasswordException(
                "Password must contain at least one letter."
            );
        }

        if (!preg_match('/[0-9]/', $value)) {

            throw new WeakPasswordException(
                "Password must contain at least one number."
            );
        }

        $this->value = $value;
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