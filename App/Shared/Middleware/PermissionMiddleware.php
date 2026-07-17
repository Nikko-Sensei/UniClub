<?php

namespace App\Shared\Middleware;

use App\Admin\RBAC\Application\Services\PermissionService;
use App\Shared\Core\Auth;
use App\Shared\Core\Response;


class PermissionMiddleware
{

    private PermissionService $permissionService;


    public function __construct(
        PermissionService $permissionService
    ) {

        $this->permissionService =
            $permissionService;

    }



    public function handle(
        string $permission
    ): void {


        // Check login

        if (!Auth::check()) {

            Response::redirect('/login');

            exit;

        }



        // Get current user's role

        $roleId = Auth::roleId();



        if (!$roleId) {

            http_response_code(403);

            echo "Role not assigned";

            exit;

        }



        // Check permission

        $hasPermission =
            $this->permissionService
            ->can(
                $roleId,
                $permission
            );



        if (!$hasPermission) {

            http_response_code(403);

            echo "403 Forbidden";

            exit;

        }

    }

}