<?php

namespace App\Admin\RBAC\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;

use App\Admin\RBAC\Application\Services\RolePermissionService;
use App\Admin\RBAC\Domain\Repositories\RoleRepositoryInterface;
use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;


class RolePermissionController extends BaseController
{

    private RolePermissionService $rolePermissionService;
    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;


    public function __construct(
        RolePermissionService $rolePermissionService,
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {

        parent::__construct();

        $this->rolePermissionService = $rolePermissionService;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }



    /**
     * Show role list
     */
    public function index(): void
    {

        $roles = $this->roleRepository
            ->findAll();


        $this->view(
            'Admin/RBAC/Presentation/Views/roles/index',
            [
                'title' => 'Role Management',
                'roles' => $roles
            ],
            'admin'
        );
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

            Response::redirect(
                '/admin/settings/roles'
            );

            return;
        }



        $permissions = $this->permissionRepository
            ->findAll();



        $selectedPermissions = $this->rolePermissionService
            ->getRolePermissions(
                $roleId
            );



        $this->view(
            'Admin/RBAC/Presentation/Views/roles/permissions',
            [
                'title' => 'Role Permissions',
                'role' => $role,
                'permissions' => $permissions,
                'selectedPermissions' => $selectedPermissions
            ],
            'admin'
        );
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