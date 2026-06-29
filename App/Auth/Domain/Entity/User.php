<?php

namespace App\Auth\Domain\Entity;

class User
{

    public function __construct(
        private ?int $id,
        private int $roleId,

        private ?int $departmentId,
        private ?int $academicYearId,

        private ?string $studentId,

        private string $name,
        private string $email,

        private string $password,
        private ?string $phone,

        private ?string $profileImage,
        private string $status = 'active',

        private ?string $lastLoginAt = null,
        private ?string $createdAt = null,
        private ?string $updatedAt = null
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function getStudentId(): ?string
    {
        return $this->studentId;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }
    public function getDepartmentId(): ?int
    {
        return $this->departmentId;
    }

    public function getAcademicYearId(): ?int
    {
        return $this->academicYearId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getLastLoginAt(): ?string
    {
        return $this->lastLoginAt;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }
}