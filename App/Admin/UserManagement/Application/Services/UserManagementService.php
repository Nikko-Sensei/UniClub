<?php

namespace App\Admin\UserManagement\Application\Services;

use App\Admin\UserManagement\Domain\Repository\UserManagementRepositoryInterface;
use App\Admin\UserManagement\Domain\Entity\ManagedUser;

class UserManagementService
{
    public function __construct(
        private UserManagementRepositoryInterface $repository
    ) {}
    public function getUsers(
        int $page = 1,
        array $filters = []
    ): array {

        $limit = 10;

        $offset = ($page - 1) * $limit;


        $users = $this->repository->findAll(
            $filters,
            $limit,
            $offset
        );


        $total = $this->repository->count(
            $filters
        );

        return [

            'users' => $users,

            'pagination' => [

                'current_page' => $page,

                'per_page' => $limit,

                'total' => $total,

                'total_pages' => ceil($total / $limit)
            ]

        ];
    }

    public function search(
        string $keyword
    ): array {

        return $this->repository->search(
            $keyword
        );
    }

    public function getUser(
        int $id
    ): ?ManagedUser {

        return $this->repository->findById(
            $id
        );
    }

    public function updateUser(
        int $id,
        array $data
    ): bool {

        return $this->repository->update(
            $id,
            $data
        );
    }
}
