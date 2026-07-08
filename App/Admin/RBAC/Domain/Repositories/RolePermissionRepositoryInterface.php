<?php

namespace App\Admin\RBAC\Domain\Repositories;


interface RolePermissionRepositoryInterface
{

    public function getPermissionIdsByRole(
        int $roleId
    ): array;

    
    public function assignPermission(
        int $roleId,
        int $permissionId
    ): bool;


    public function removePermission(
        int $roleId,
        int $permissionId
    ): bool;


    public function syncPermissions(
        int $roleId,
        array $permissionIds
    ): bool;
}