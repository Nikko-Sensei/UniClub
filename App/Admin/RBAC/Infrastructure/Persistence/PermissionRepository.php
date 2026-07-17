<?php

namespace App\Admin\RBAC\Infrastructure\Persistence;

use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;
use App\Admin\RBAC\Domain\Entities\Permission;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use PDO;


class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }

    public function findAll(): array
    {

        $sql = "
        SELECT
            id,
            name,
            slug,
            description

        FROM permissions

        ORDER BY id ASC
    ";


        $stmt = $this->db->query($sql);


        $permissions = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


            $permissions[] = new Permission(

                (int) $row['id'],

                $row['name'],

                $row['slug'],

                $row['description']

            );
        }


        return $permissions;
    }


    public function findByModule(
        string $module
    ): array {

        $sql = "
        SELECT
            id,
            name,
            slug,
            description

        FROM permissions

        WHERE module = :module

        ORDER BY id ASC
    ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([
            'module' => $module
        ]);


        $permissions = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


            $permissions[] = new Permission(
                (int)$row['id'],
                $row['name'],
                $row['slug'],
                $row['description']
            );
        }


        return $permissions;
    }

    public function findByRoleId(
        int $roleId
    ): array {

        $sql = "
            SELECT
                permissions.id,
                permissions.name,
                permissions.slug,
                permissions.description

            FROM permissions

            INNER JOIN role_permissions

            ON permissions.id = role_permissions.permission_id

            WHERE role_permissions.role_id = :role_id
        ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([
            'role_id' => $roleId
        ]);


        $permissions = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $permissions[] = new Permission(

                (int) $row['id'],

                $row['name'],

                $row['slug'],

                $row['description']

            );
        }


        return $permissions;
    }


    public function findBySlug(
        string $slug
    ): ?Permission {

        $sql = "
            SELECT
                id,
                name,
                slug,
                description

            FROM permissions

            WHERE slug = :slug

            LIMIT 1
        ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([
            'slug' => $slug
        ]);


        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$row) {
            return null;
        }


        return new Permission(

            (int) $row['id'],

            $row['name'],

            $row['slug'],

            $row['description']

        );
    }

    public function hasPermission(
        int $roleId,
        string $slug
    ): bool {


        $sql = "
        SELECT 1

        FROM role_permissions

        INNER JOIN permissions

        ON permissions.id = role_permissions.permission_id

        WHERE role_permissions.role_id = :role_id

        AND permissions.slug = :slug

        LIMIT 1
    ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([

            'role_id' => $roleId,

            'slug' => $slug

        ]);


        return (bool)$stmt->fetchColumn();
    }
}
