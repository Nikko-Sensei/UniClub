<?php

namespace App\User\Application\DTOs;

class UserDTO
{
    public function __construct(
        public int $roleId,

        public ?int $departmentId,
        public ?int $academicYearId,

        public ?string $studentId,

        public string $name,
        public string $email,

        public string $password,
        public ?string $phone,

        public ?string $profileImage,

        public string $status = 'active'
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            roleId: (int) $data['role_id'],

            departmentId: isset($data['department_id'])
                ? (int) $data['department_id']
                : null,

            academicYearId: isset($data['academic_year_id'])
                ? (int) $data['academic_year_id']
                : null,

            studentId: $data['student_id'] ?? null,

            name: $data['name'],
            email: $data['email'],

            password: $data['password'],
            phone: $data['phone'] ?? null,

            profileImage: $data['profile_image'] ?? null,

            status: $data['status'] ?? 'active'
        );
    }
}