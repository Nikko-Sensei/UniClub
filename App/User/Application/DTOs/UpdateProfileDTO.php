<?php

namespace App\User\Application\DTOs;

class UpdateProfileDTO
{
public function __construct(
public readonly int $userId,
public readonly string $name,
public readonly ?string $phone,
public readonly ?string $profileImage
) {}
}