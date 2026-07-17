<?php

namespace App\Club\Application\Services;

use App\Club\Domain\Repository\ClubRepositoryInterface;
use App\Club\Domain\Entities\Club;
use App\Club\Application\Validators\ClubValidator;
use App\Shared\Application\Services\ImageUploadService;
use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;

class ClubService
{
    public function __construct(

        private ClubRepositoryInterface $repository,

        private ClubValidator $validator,

        private ImageUploadService $imageUploadService,

        private AuditLogger $auditLogger

    ) {}

    /**
     * Create Club
     */
    public function create(
        array $data,
        array $files,
        int $userId
    ): int {

        $errors = $this->validator
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

        $this->handleImages(
            $files,
            $data
        );

        $club = new Club(

            id: null,

            categoryId: (int)$data['category_id'],

            categoryName: $row['category_name'] ?? null,

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

            memberLimit: isset($data['member_limit'])
                ? (int)$data['member_limit']
                : null,

            status: 'active',

            createdBy: $userId

        );

        $clubId = $this->repository
            ->create($club);


        $this->auditLogger->log(

            AuditAction::CREATE_CLUB,

            $userId,

            'Club',

            $clubId,

            [
                'name' => $club->getName()
            ]

        );

        return $clubId;
    }


    /**
     * Update Club
     */
    public function update(
        int $id,
        array $data,
        array $files
    ): bool {

        $errors = $this->validator
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

        $existing = $this->repository
            ->findById($id);

        if (!$existing) {

            throw new \Exception(
                "Club not found."
            );
        }

        $this->handleImages(
            $files,
            $data
        );

        $club = new Club(

            id: $id,

            categoryId: (int)$data['category_id'],

            categoryName: $row['category_name'] ?? null,

            name: $data['name'],

            shortName: $data['short_name']
                ?? $existing->getShortName(),

            description: $data['description']
                ?? $existing->getDescription(),

            mission: $data['mission']
                ?? $existing->getMission(),

            vision: $data['vision']
                ?? $existing->getVision(),

            logo: $data['logo']
                ?? $existing->getLogo(),

            banner: $data['banner']
                ?? $existing->getBanner(),

            email: $data['email']
                ?? $existing->getEmail(),

            phone: $data['phone']
                ?? $existing->getPhone(),

            establishedDate: $data['established_date']
                ?? $existing->getEstablishedDate(),

            memberLimit: isset($data['member_limit'])
                ? (int)$data['member_limit']
                : $existing->getMemberLimit(),

            status: $data['status']
                ?? $existing->getStatus(),

            createdBy: $existing->getCreatedBy()

        );


        $result = $this->repository
            ->update($club);


        if ($result) {

            $this->auditLogger->log(

                AuditAction::UPDATE_CLUB,

                $_SESSION['user']['id'],

                'Club',

                $id,

                [
                    'name' => $club->getName()
                ]

            );
        }


        return $result;
    }


    /**
     * Delete Club
     */
    public function delete(
        int $id
    ): bool {

        $club = $this->repository
            ->findById($id);


        $result = $this->repository
            ->delete($id);


        if ($result) {

            $this->auditLogger->log(

                AuditAction::DELETE_CLUB,

                $_SESSION['user']['id'],

                'Club',

                $id,

                [
                    'name' => $club?->getName()
                ]

            );
        }


        return $result;
    }


    /**
     * Get Single Club
     */
    public function getClub(
        int $id
    ): ?Club {

        return $this->repository
            ->findById($id);
    }


    /**
     * Pagination
     */
    public function getClubs(
        array $filters = [],
        int $page = 1
    ): array {

        $limit = 10;

        $offset =
            ($page - 1)
            * $limit;


        $clubs = $this->repository
            ->findAll(
                $filters,
                $limit,
                $offset
            );


        $total = $this->repository
            ->count($filters);


        return [

            'clubs' => $clubs,

            'pagination' => [

                'current_page' => $page,

                'per_page' => $limit,

                'total' => $total,

                'total_pages' =>
                ceil($total / $limit)

            ]

        ];
    }

    public function getStudentClubs(
        array $filters = [],
        int $page = 1
    ): array {

        $limit = 6;


        $offset =
            ($page - 1)
            * $limit;


        $clubs =
            $this->repository
            ->findStudentClubs(
                $filters,
                $limit,
                $offset
            );


        $total =
            $this->repository
            ->countStudentClubs(
                $filters
            );


        return [

            'clubs' =>
            $clubs,


            'pagination' => [

                'current_page' =>
                $page,

                'per_page' =>
                $limit,

                'total' =>
                $total,


                'total_pages' =>
                ceil(
                    $total / $limit
                )
            ]
        ];
    }

    public function getFeaturedClub(): ?Club
{
    return $this->repository->findMostPopularClub();
}


    /**
     * Statistics
     */
    public function getStatistics(): array
    {
        return $this->repository
            ->getStatistics();
    }


    /**
     * Upload Club Images
     */
    private function handleImages(
        array $files,
        array &$data
    ): void {

        if (
            isset($files['logo']) &&
            $files['logo']['error']
            === UPLOAD_ERR_OK
        ) {

            $data['logo'] =
                $this->imageUploadService
                ->upload(
                    $files['logo'],
                    'clubs'
                );
        }


        if (
            isset($files['banner']) &&
            $files['banner']['error']
            === UPLOAD_ERR_OK
        ) {

            $data['banner'] =
                $this->imageUploadService
                ->upload(
                    $files['banner'],
                    'clubs'
                );
        }
    }

    public function getActiveClubs(): array
    {

        return $this->repository
            ->findActiveClubs();
    }

    public function getLeadership(
        int $clubId
    ): array {

        return $this->repository
            ->findLeadership($clubId);
    }

    public function getMembers(
    int $clubId
): array
{

    return $this->repository
        ->findMembers(
            $clubId
        );

}

public function getClubRoles(): array
{

    return $this->repository
        ->findRoles();

}

    public function getUpcomingEvents(
        int $clubId
    ): array {

        return $this->repository
            ->findUpcomingEvents(
                $clubId
            );
    }
}