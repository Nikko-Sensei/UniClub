<?php

namespace App\User\Application\Validators;

class ChangePasswordValidator
{
    private array $errors = [];

    public function validate(array $data): bool
    {
        $current = $data['current_password'] ?? '';
        $new = $data['new_password'] ?? '';
        $confirm = $data['confirm_password'] ?? '';

        if (empty($current)) {
            $this->errors['current_password'] = 'Current password is required';
        }

        if (strlen($new) < 8) {
            $this->errors['new_password'] = 'Password must be at least 8 characters';
        }

        if ($new !== $confirm) {
            $this->errors['confirm_password'] = 'Passwords do not match';
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}