<?php

namespace App\Admin\RBAC\Domain\Entities;

class Role
{
    private int $id;

    private string $name;

    /**
     * @var Permission[]
     */
    private array $permissions;


    public function __construct(
        int $id,
        string $name,
        array $permissions = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->permissions = $permissions;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return Permission[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }


    public function addPermission(
        Permission $permission
    ): void {
        $this->permissions[] = $permission;
    }


    public function hasPermission(
        string $permissionSlug
    ): bool {

        foreach ($this->permissions as $permission) {

            if ($permission->getSlug() === $permissionSlug) {
                return true;
            }
        }

        return false;
    }
}