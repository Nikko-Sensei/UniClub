<?php

namespace App\Admin\UserManagement\Application\DTOs;

class ManagedUserDTO
{
    public function __construct(

        public int $id,

        public string $name,

        public string $email,

        public ?string $studentId,

        public ?string $profileImage,

        public string $roleName,

        public string $status,

        public ?string $departmentName,

        public ?string $academicYearName

    ) {}
}
