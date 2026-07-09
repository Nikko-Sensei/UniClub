<?php

namespace App\Admin\UserManagement\Domain\Entity;


class ManagedUser
{

    public function __construct(

        private int $id,

        private string $name,

        private string $email,

        private ?string $studentId,

        private ?string $profileImage,

        private string $roleName,

        private string $status,

        private ?string $departmentName,

        private ?string $academicYearName,

        private ?string $phone,

        private ?string $lastLoginAt,

        private ?string $createdAt,

        private ?string $updatedAt

    ) {}

    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        // var_dump("reach this here  ");
        // exit;
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStudentId(): ?string
    {
        return $this->studentId;
    }


    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }


    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    public function getAcademicYearName(): ?string
    {
        return $this->academicYearName;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
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
