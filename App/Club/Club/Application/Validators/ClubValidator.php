<?php

namespace App\Club\Club\Application\Validators;

class ClubValidator
{
    private array $errors = [];

    public function validate(array $data): bool
    {
        $this->errors = [];

        $this->validateRequired($data);
        $this->validateLength($data);
        $this->validateFormat($data);
        $this->validateEnum($data);

        return empty($this->errors);
    }

    // -------------------------
    // RULE GROUPS
    // -------------------------

    private function validateRequired(array $data): void
    {
        if (empty($data['category_id'])) {
            $this->errors['category_id'] = 'Club category is required.';
        }

        if (empty(trim($data['name'] ?? ''))) {
            $this->errors['name'] = 'Club name is required.';
        }
    }

    private function validateLength(array $data): void
    {
        if (!empty($data['name']) && strlen($data['name']) > 150) {
            $this->errors['name'] = 'Club name cannot exceed 150 characters.';
        }

        if (!empty($data['short_name']) && strlen($data['short_name']) > 50) {
            $this->errors['short_name'] = 'Short name cannot exceed 50 characters.';
        }

        if (!empty($data['phone']) && strlen($data['phone']) > 20) {
            $this->errors['phone'] = 'Phone number is too long.';
        }
    }

    private function validateFormat(array $data): void
    {
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format.';
        }

        if (!empty($data['member_limit']) && !is_numeric($data['member_limit'])) {
            $this->errors['member_limit'] = 'Member limit must be a number.';
        }
    }

    private function validateEnum(array $data): void
    {
        if (isset($data['status']) && !in_array($data['status'], ['active', 'inactive'])) {
            $this->errors['status'] = 'Invalid club status.';
        }
    }

    // -------------------------
    // GETTERS
    // -------------------------

    public function errors(): array
    {
        return $this->errors;
    }

}