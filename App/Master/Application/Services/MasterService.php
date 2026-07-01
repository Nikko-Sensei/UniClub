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
}