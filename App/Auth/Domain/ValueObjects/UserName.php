<?php

namespace App\Auth\Domain\ValueObjects;


use App\Auth\Domain\Exceptions\InvalidUserNameException;


class UserName
{
    private string $value;

    private const MIN_LENGTH = 2;
    private const MAX_LENGTH = 100;

    public function __construct(
        string $name
    ) {

        $name = trim($name);


        if (empty($name)) {

            throw new InvalidUserNameException(
                "Name is required."
            );
        }

        if (!preg_match(
            '/^[a-zA-Z\s]+$/',
            $name
        )) {

            throw new InvalidUserNameException(
                "Name can only contain letters and spaces."
            );
        }

        if (strlen($name) < self::MIN_LENGTH) {

            throw new InvalidUserNameException(
                "Name must be at least "
                    . self::MIN_LENGTH
                    . " characters."
            );
        }

        if (strlen($name) > self::MAX_LENGTH) {

            throw new InvalidUserNameException(
                "Name cannot exceed "
                    . self::MAX_LENGTH
                    . " characters."
            );
        }

        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}