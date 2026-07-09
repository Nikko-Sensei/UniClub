<?php

namespace App\Club\Application\Services;


use App\Club\Domain\Repository\ClubRepositoryInterface;
use App\Club\Domain\Entities\Club;
use App\Club\Application\Validators\ClubValidator;


class ClubService
{
    public function __construct(

        private ClubRepositoryInterface $repository,

        private ClubValidator $validator

    ) {}

    public function create(
        array $data,
        int $userId
    ): int {


        $errors =
            $this->validator
            ->validateCreate($data);



        if (!empty($errors)) {

            throw new \Exception(
                json_encode($errors)
            );
        }

        if (
            $this->repository
            ->existsByName($data['name'])
        ) {

            throw new \Exception(
                "Club name already exists."
            );
        }

        $club = new Club(

            id: null,

            categoryId: (int)$data['category_id'],

            name: $data['name'],

            shortName: $data['short_name'] ?? null,

            description: $data['description'] ?? null,

            mission: $data['mission'] ?? null,

            vision: $data['vision'] ?? null,

            logo: $data['logo'] ?? null,

            banner: $data['banner'] ?? null,

            email: $data['email'] ?? null,

            phone: $data['phone'] ?? null,

            establishedDate: $data['established_date'] ?? null,

            memberLimit: $data['member_limit'] ?? null,

            status: 'active',

            createdBy: $userId

        );

        return $this->repository
            ->create($club);
    }

    public function update(
        int $id,
        array $data
    ): bool {


        $errors =
            $this->validator
            ->validateUpdate($data);



        if (!empty($errors)) {

            throw new \Exception(
                json_encode($errors)
            );
        }


        if (
            $this->repository
            ->existsByNameExcept(
                $data['name'],
                $id
            )
        ) {

            throw new \Exception(
                "Club name already exists."
            );
        }

        $existing =
            $this->repository
            ->findById($id);

        if (!$existing) {

            throw new \Exception(
                "Club not found."
            );
        }

        $club = new Club(

            id: $id,

            categoryId: (int)$data['category_id'],

            name: $data['name'],

            shortName: $data['short_name'] ?? null,

            description: $data['description'] ?? null,

            mission: $data['mission'] ?? null,

            vision: $data['vision'] ?? null,

            logo: $data['logo'] ?? $existing->getLogo(),

            banner: $data['banner'] ?? $existing->getBanner(),

            email: $data['email'] ?? null,

            phone: $data['phone'] ?? null,

            establishedDate: $data['established_date'] ?? null,

            memberLimit: $data['member_limit'] ?? null,

            status: $data['status'] ?? $existing->getStatus(),

            createdBy: $existing->getCreatedBy()

        );

        return $this->repository
            ->update($club);
    }

    public function delete(
        int $id
    ): bool {


        return $this->repository
            ->delete($id);
    }

    public function getClub(
        int $id
    ): ?Club {

        return $this->repository
            ->findById($id);
    }

    public function getClubs(
    array $filters = [],
    int $page = 1
): array {

    $limit = 10;

    $offset = ($page - 1) * $limit;


    $clubs = $this->repository->findAll(
        $filters,
        $limit,
        $offset
    );


    $total = $this->repository->count(
        $filters
    );


    return [

        'clubs' => $clubs,

        'pagination' => [

            'current_page' => $page,

            'per_page' => $limit,

            'total' => $total,

            'total_pages' => ceil($total / $limit)

        ]

    ];
}

    public function getStatistics(): array
    {

        return $this->repository
            ->getStatistics();
    }
}