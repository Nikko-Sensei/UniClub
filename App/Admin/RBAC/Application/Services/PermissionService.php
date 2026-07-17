<?php

namespace App\Admin\RBAC\Application\Services;


use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;


class PermissionService
{

    private PermissionRepositoryInterface $permissionRepository;


    public function __construct(
        PermissionRepositoryInterface $permissionRepository
    ) {

        $this->permissionRepository =
            $permissionRepository;

    }


    public function can(
        int $roleId,
        string $permission
    ): bool {


        return $this->permissionRepository
            ->hasPermission(
                $roleId,
                $permission
            );

    }

}