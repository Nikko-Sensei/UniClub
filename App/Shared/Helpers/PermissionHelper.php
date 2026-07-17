<?php

namespace App\Shared\Helpers;

use App\Admin\RBAC\Application\Services\PermissionService;
use App\Shared\Core\Auth;

class PermissionHelper
{

    private PermissionService $permissionService;


    public function __construct(
        PermissionService $permissionService
    ) {

        $this->permissionService =
            $permissionService;

    }



    public function can(
        string $permission
    ): bool {

        if (!Auth::check()) {

            return false;

        }


        $roleId =
            Auth::roleId();


        if (!$roleId) {

            return false;

        }


        return $this->permissionService->can(
            $roleId,
            $permission
        );

    }

}