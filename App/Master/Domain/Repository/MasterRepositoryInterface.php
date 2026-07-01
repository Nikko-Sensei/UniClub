<?php

namespace App\Master\Domain\Repository;

interface MasterRepositoryInterface
{
    public function getDepartments(): array;

    public function getAcademicYears(): array;

    public function findDepartmentCodeById(int $id): ?string;
}