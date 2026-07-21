<?php

namespace App\Auth\Domain\ValueObjects;

use App\Auth\Domain\Exceptions\WeakPasswordException;

final class Password
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new WeakPasswordException(
                "Password is required."
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