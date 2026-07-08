<?php

namespace App\Admin\RBAC\Presentation\Controllers;


use App\Admin\RBAC\Application\Services\RolePermissionService;
use App\Admin\RBAC\Domain\Repositories\RoleRepositoryInterface;
use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;
use App\Shared\Core\Response;


class RolePermissionController
{

    public function __construct(
        private RolePermissionService $rolePermissionService,
        private RoleRepositoryInterface $roleRepository,
        private PermissionRepositoryInterface $permissionRepository
    ) {}

    /**
     * Show role list
     */
    public function index(): void
    {

        $roles = $this->roleRepository
            ->findAll();


        require BASE_PATH .
            '/App/Admin/RBAC/Presentation/Views/roles/index.php';
    }

    /**
     * Show permission assignment page
     */
    public function permissions(
        int $roleId
    ): void {


        $role = $this->roleRepository
            ->findById($roleId);

        if (!$role) {

            echo "Role not found";
            exit;
        }

        $permissions = $this->permissionRepository
            ->findByRoleId($roleId);

        $selectedPermissions = $this->rolePermissionService
            ->getRolePermissions(
                $roleId
            );

        require BASE_PATH .
            '/App/Admin/RBAC/Presentation/Views/roles/permissions.php';
    }





    /**
     * Save permissions
     */
    public function update(
        int $roleId
    ): void {


        $permissionIds = $_POST['permissions'] ?? [];



        $this->rolePermissionService
            ->sync(
                $roleId,
                $permissionIds
            );



        Response::redirect(
            '/admin/settings/roles'
        );
    }
}