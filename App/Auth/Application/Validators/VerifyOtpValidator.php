<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\VerifyOtpDTO;

class VerifyOtpValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        $this->errors = [];

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required.";
        }

        if (empty($data['otp'])) {
            $this->errors['otp'] = "OTP is required.";
        } elseif (!preg_match('/^\d{6}$/', $data['otp'])) {
            $this->errors['otp'] = "OTP must be 6 digits.";
        }

        return !$this->fails();
    }

    public function getDTO(array $data): VerifyOtpDTO
    {
        return new VerifyOtpDTO(
            $data['email'],
            $data['otp']
        );
    }
}