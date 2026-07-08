<?php

namespace App\Admin\RBAC\Domain\Repositories;

use App\Admin\RBAC\Domain\Entities\Role;


interface RoleRepositoryInterface
{

    public function findAll(): array;


    public function findById(
        int $id
    ): ?Role;


    public function findByName(
        string $name
    ): ?Role;

}