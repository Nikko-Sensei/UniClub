<?php

namespace App\Admin\UserManagement\Domain\Repository;

use App\Admin\UserManagement\Domain\Entity\ManagedUser;

interface UserManagementRepositoryInterface
{
    public function findAll(
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array;


    public function count(
        array $filters = []
    ): int;


    public function search(
        string $keyword
    ): array;


    public function findById(
        int $id
    ): ?ManagedUser;

    public function update(
        int $id,
        array $data
    ): bool;

    public function delete(
        int $id
    ): bool;
}