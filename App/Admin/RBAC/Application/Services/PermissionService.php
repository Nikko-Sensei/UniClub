<?php

namespace App\Admin\RBAC\Application\Services;

use App\Admin\RBAC\Domain\Repositories\RoleRepositoryInterface;


class PermissionService
{

    private RoleRepositoryInterface $roleRepository;


    public function __construct(
        RoleRepositoryInterface $roleRepository
    ) {

        $this->roleRepository = $roleRepository;

    }

    public function can(
        int $roleId,
        string $permission
    ): bool {


        $role = $this->roleRepository->findById($roleId);

        if (!$role) {

            return false;

        }

        return $role->hasPermission(
            $permission
        );
    }
}