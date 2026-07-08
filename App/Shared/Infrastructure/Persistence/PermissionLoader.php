<?php

namespace App\Shared\Infrastructure\Persistence;

use PDO;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;

class PermissionLoader extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }

    public function loadByRoleId(int $roleId): array
    {
        $sql = "
            SELECT p.name
            FROM permissions p
            INNER JOIN role_permissions rp
                ON rp.permission_id = p.id
            WHERE rp.role_id = ?
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$roleId]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}