<?php

namespace App\Master\Infrastructure\Persistence;

use App\Master\Domain\Repository\MasterRepositoryInterface;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;

class MasterRepository extends BaseRepository implements MasterRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    public function getDepartments(): array
    {
        $sql = "
            SELECT 
                id,
                code,
                name
            FROM departments
            ORDER BY name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }


    public function getAcademicYears(): array
    {
        $sql = "
            SELECT 
                id,
                name
            FROM academic_years
            ORDER BY id ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function findDepartmentCodeById(
        int $id
    ): ?string {

        $stmt = $this->db->prepare(
            "
        SELECT code
        FROM departments
        WHERE id = :id
        LIMIT 1
        "
        );

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetchColumn() ?: null;
    }
}
