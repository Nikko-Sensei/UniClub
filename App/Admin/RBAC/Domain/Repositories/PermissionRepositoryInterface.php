<?php

namespace App\Admin\RBAC\Domain\Repositories;

use App\Admin\RBAC\Domain\Entities\Permission;


interface PermissionRepositoryInterface
{

    public function findAll(): array;

    public function findByModule(
        string $module
    ): array;

    public function findByRoleId(
        int $roleId
    ): array;

    public function findBySlug(
        string $slug
    ): ?Permission;
}