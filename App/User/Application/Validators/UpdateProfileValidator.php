<?php

namespace App\User\Application\Validators;

use App\User\Application\DTOs\UpdateProfileDTO;

class UpdateProfileValidator
{
    private array $errors = [];

    public function validate(array $data, array $files = []): bool
    {
        $this->errors = [];

        // NAME
        if (empty(trim($data['name'] ?? ''))) {
            $this->errors['name'] = 'Name is required';
        }

        // PHONE
        if (!empty($data['phone']) && !preg_match('/^[0-9+\-\s]{6,20}$/', $data['phone'])) {
            $this->errors['phone'] = 'Invalid phone number';
        }

        // IMAGE
        if (!empty($files['profile_image']['name'])) {

            $allowed = ['jpg', 'jpeg', 'png', 'webp'];
            $ext = strtolower(pathinfo($files['profile_image']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                $this->errors['profile_image'] = 'Only JPG, PNG, WEBP allowed';
            }

            if ($files['profile_image']['size'] > 2 * 1024 * 1024) {
                $this->errors['profile_image'] = 'Image must be under 2MB';
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function getDTO(array $data, int $userId): UpdateProfileDTO
    {
        return new UpdateProfileDTO(
            $userId,
            $data['name'],
            $data['phone'] ?? null,
            null // image handled separately
        );
    }
}
