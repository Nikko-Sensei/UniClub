<?php

namespace App\Admin\RBAC\Infrastructure\Persistence;


use App\Admin\RBAC\Domain\Repositories\RolePermissionRepositoryInterface;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;


class RolePermissionRepository 
    extends BaseRepository 
    implements RolePermissionRepositoryInterface
{


    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function getPermissionIdsByRole(
        int $roleId
    ): array {


        $sql = "
            SELECT permission_id

            FROM role_permissions

            WHERE role_id = :role_id
        ";



        $stmt = $this->db->prepare($sql);



        $stmt->execute([
            'role_id' => $roleId
        ]);



        return array_map(
            'intval',
            $stmt->fetchAll(\PDO::FETCH_COLUMN)
        );

    }




    public function assignPermission(
        int $roleId,
        int $permissionId
    ): bool {


        $sql = "
            INSERT INTO role_permissions
            (
                role_id,
                permission_id
            )

            VALUES
            (
                :role_id,
                :permission_id
            )
        ";



        $stmt = $this->db->prepare($sql);



        return $stmt->execute([

            'role_id' => $roleId,

            'permission_id' => $permissionId

        ]);

    }




    public function removePermission(
        int $roleId,
        int $permissionId
    ): bool {


        $sql = "
            DELETE FROM role_permissions

            WHERE role_id = :role_id

            AND permission_id = :permission_id
        ";



        $stmt = $this->db->prepare($sql);



        return $stmt->execute([

            'role_id' => $roleId,

            'permission_id' => $permissionId

        ]);

    }




    public function syncPermissions(
        int $roleId,
        array $permissionIds
    ): bool {


        try {


            $this->db->beginTransaction();



            // remove old permissions

            $delete = $this->db->prepare("
                DELETE FROM role_permissions

                WHERE role_id = :role_id
            ");



            $delete->execute([

                'role_id' => $roleId

            ]);




            // insert new permissions

            $insert = $this->db->prepare("
                INSERT INTO role_permissions
                (
                    role_id,
                    permission_id
                )

                VALUES
                (
                    :role_id,
                    :permission_id
                )
            ");




            foreach($permissionIds as $permissionId){


                $insert->execute([

                    'role_id' => $roleId,

                    'permission_id' => $permissionId

                ]);

            }



            $this->db->commit();



            return true;



        } catch(\Exception $e){


            $this->db->rollBack();


            return false;

        }

    }

}