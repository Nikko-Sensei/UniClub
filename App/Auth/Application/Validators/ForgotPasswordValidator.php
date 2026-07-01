<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\ForgotPasswordDTO;
use App\Auth\Domain\ValueObjects\Email;
use App\Auth\Domain\Exceptions\AuthException;

class ForgotPasswordValidator extends BaseValidator
{
    private ?Email $email = null;

    public function validate(array $data): bool
    {
        $this->errors = [];

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required.";
        } else {
            try {
                $this->email = new Email($data['email']);
            } catch (AuthException $exception) {
                $this->errors['email'] = $exception->getMessage();
            }
        }

        return !$this->fails();
    }

    public function getDTO(): ForgotPasswordDTO
    {
        return new ForgotPasswordDTO(
            $this->email->value()
        );
    }
}