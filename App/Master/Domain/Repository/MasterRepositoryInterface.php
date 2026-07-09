<?php

namespace App\Master\Domain\Repository;

interface MasterRepositoryInterface
{
    public function getDepartments(): array;

    public function getAcademicYears(): array;

    public function findDepartmentCodeById(int $id): ?string;

    public function findDepartmentNameById(int $id): ?string;

    public function findAcademicYearNameById(int $id): ?string;

    public function findRoleNameById(int $id): ?string;

    public function getRoles(): array;
}