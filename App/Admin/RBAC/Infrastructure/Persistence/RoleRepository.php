<?php

namespace App\Admin\RBAC\Infrastructure\Persistence;


use App\Admin\RBAC\Domain\Repositories\RoleRepositoryInterface;
use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;
use App\Admin\RBAC\Domain\Entities\Role;

use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;


class RoleRepository
extends BaseRepository
implements RoleRepositoryInterface
{


    private PermissionRepositoryInterface $permissionRepository;



    public function __construct(
        PermissionRepositoryInterface $permissionRepository
    ) {

        parent::__construct(
            Database::getConnection()
        );


        $this->permissionRepository =
            $permissionRepository;
    }

    public function findById(
        int $id
    ): ?Role {


        $stmt = $this->db->prepare(
            "
            SELECT
                id,
                name

            FROM roles

            WHERE id = :id

            LIMIT 1
            "
        );


        $stmt->execute([
            'id' => $id
        ]);



        $row = $stmt->fetch();



        if (!$row) {

            return null;
        }



        $permissions =
            $this->permissionRepository
            ->findByRoleId(
                (int)$row['id']
            );



        return new Role(
            (int)$row['id'],
            $row['name'],
            $permissions
        );
    }

    public function findByName(
        string $name
    ): ?Role {


        $stmt = $this->db->prepare(
            "
            SELECT
                id,
                name

            FROM roles

            WHERE name = :name

            LIMIT 1
            "
        );


        $stmt->execute([
            'name' => $name
        ]);



        $row = $stmt->fetch();



        if (!$row) {

            return null;
        }



        $permissions =
            $this->permissionRepository
            ->findByRoleId(
                (int)$row['id']
            );



        return new Role(
            (int)$row['id'],
            $row['name'],
            $permissions
        );
    }

    public function findAll(): array
    {

        $sql = "
        SELECT
            id,
            name

        FROM roles

        ORDER BY id ASC
    ";


        $stmt = $this->db->query($sql);


        $roles = [];



        while ($row = $stmt->fetch()) {


            $permissions =
                $this->permissionRepository
                ->findByRoleId(
                    (int)$row['id']
                );



            $roles[] = new Role(

                (int)$row['id'],

                $row['name'],

                $permissions

            );
        }



        return $roles;
    }
}
