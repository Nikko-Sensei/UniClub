<?php

namespace App\Master\Application\Services;

use App\Master\Domain\Repository\MasterRepositoryInterface;


class MasterService
{

    public function __construct(
        private MasterRepositoryInterface $masterRepository
    ) {}


    public function getDepartments(): array
    {
        return $this->masterRepository->getDepartments();
    }


    public function getAcademicYears(): array
    {
        return $this->masterRepository->getAcademicYears();
    }

    public function getDepartmentCode(
        int $departmentId
    ): ?string {

        return $this->masterRepository->findDepartmentCodeById(
            $departmentId
        );
    }

    public function getDepartmentName(int $id): ?string
    {
        return $this->masterRepository->findDepartmentNameById($id);
    }

    public function getAcademicYearName(int $id): ?string
    {
        return $this->masterRepository->findAcademicYearNameById($id);
    }

    public function getRoleName(int $id): ?string
    {
        return $this->masterRepository->findRoleNameById($id);
    }
}
