<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\ResetPasswordDTO;

class ResetPasswordValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        $this->errors = [];

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required.";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required.";
        }

        if (($data['password'] ?? '') !== ($data['password_confirmation'] ?? '')) {
            $this->errors['password_confirmation'] = "Passwords do not match.";
        }

        return !$this->fails();
    }

    public function getDTO(array $data): ResetPasswordDTO
    {
        return new ResetPasswordDTO(
            $data['email'],
            $data['otp'],
            $data['password']
        );
    }
}