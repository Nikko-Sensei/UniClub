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

        private ?string $academicYearName

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
}