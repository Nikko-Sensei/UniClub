<?php

namespace App\Admin\RBAC\Application\Services;


use App\Admin\RBAC\Domain\Repositories\RolePermissionRepositoryInterface;


class RolePermissionService
{
    private RolePermissionRepositoryInterface $repository;

    public function __construct(
        RolePermissionRepositoryInterface $repository
    ) {

        $this->repository = $repository;

    }

    /**
     * Get selected permission IDs of a role
     */
    public function getRolePermissions(
        int $roleId
    ): array {


        return $this->repository
            ->getPermissionIdsByRole(
                $roleId
            );

    }

    /**
     * Assign one permission
     */
    public function assign(
        int $roleId,
        int $permissionId
    ): bool {


        return $this->repository
            ->assignPermission(
                $roleId,
                $permissionId
            );

    }

    /**
     * Remove one permission
     */
    public function remove(
        int $roleId,
        int $permissionId
    ): bool {


        return $this->repository
            ->removePermission(
                $roleId,
                $permissionId
            );

    }

    /**
     * Replace all permissions of role
     */
    public function sync(
        int $roleId,
        array $permissionIds
    ): bool {


        return $this->repository
            ->syncPermissions(
                $roleId,
                $permissionIds
            );

    }

}