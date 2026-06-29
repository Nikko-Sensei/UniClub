<?php

namespace App\Auth\Application\DTOs;

class RegisterDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $studentId,
        public readonly string $email,
        public readonly string $password,

        public readonly ?int $departmentId = null,
        public readonly ?int $academicYearId = null,

        public readonly ?string $phone = null,
        public readonly ?string $profileImage = null
    ) {}
}