<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\LoginDTO;

use App\Auth\Domain\Exceptions\AuthException;
use App\Auth\Domain\ValueObjects\Email;


class LoginValidator extends BaseValidator
{

    private ?Email $email = null;


    public function validate(array $data): bool
    {

        $this->errors = [];

        // Email

        if (empty($data['email'])) {

            $this->errors['email'] =
                "Email is required.";

        } else {

            try {

                $this->email = new Email(
                    $data['email']
                );

            } catch (AuthException $exception) {

                $this->errors['email'] =
                    $exception->getMessage();

            }

        }

        // Password

        if (empty($data['password'])) {

            $this->errors['password'] =
                "Password is required.";

        }

        return !$this->fails();

    }

    public function getDTO(array $data): LoginDTO
    {

        if ($this->fails()) {

            throw new \LogicException(
                "Cannot create DTO with invalid data."
            );

        }

        return new LoginDTO(

            email: $this->email->value(),

            password: $data['password']

        );

    }

}