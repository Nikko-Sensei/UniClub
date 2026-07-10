<?php

namespace App\Club\Infrastructure\Persistence;

use App\Club\Domain\Entities\Club;
use App\Club\Domain\Repository\ClubRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use PDO;


class ClubRepository extends BaseRepository  implements ClubRepositoryInterface
{


    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }

    public function create(
        Club $club
    ): int {


        $stmt = $this->db->prepare(
            "CALL sp_club_create(
                :category_id,
                :name,
                :short_name,
                :description,
                :mission,
                :vision,
                :logo,
                :banner,
                :email,
                :phone,
                :established_date,
                :member_limit,
                :created_by
            )"
        );


        $stmt->execute([

            'category_id' => $club->getCategoryId(),

            'name' => $club->getName(),

            'short_name' => $club->getShortName(),

            'description' => $club->getDescription(),

            'mission' => $club->getMission(),

            'vision' => $club->getVision(),

            'logo' => $club->getLogo(),

            'banner' => $club->getBanner(),

            'email' => $club->getEmail(),

            'phone' => $club->getPhone(),

            'established_date' => $club->getEstablishedDate(),

            'member_limit' => $club->getMemberLimit(),

            'created_by' => $club->getCreatedBy()

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['id'];
    }

    public function update(
        Club $club
    ): bool {


        $stmt = $this->db->prepare(
            "CALL sp_club_update(
                :id,
                :category_id,
                :name,
                :short_name,
                :description,
                :mission,
                :vision,
                :logo,
                :banner,
                :email,
                :phone,
                :established_date,
                :member_limit,
                :status
            )"
        );


        $stmt->execute([

            'id' => $club->getId(),

            'category_id' => $club->getCategoryId(),

            'name' => $club->getName(),

            'short_name' => $club->getShortName(),

            'description' => $club->getDescription(),

            'mission' => $club->getMission(),

            'vision' => $club->getVision(),

            'logo' => $club->getLogo(),

            'banner' => $club->getBanner(),

            'email' => $club->getEmail(),

            'phone' => $club->getPhone(),

            'established_date' => $club->getEstablishedDate(),

            'member_limit' => $club->getMemberLimit(),

            'status' => $club->getStatus()

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }

    public function delete(
        int $id
    ): bool {


        $stmt = $this->db->prepare(
            "CALL sp_club_delete(:id)"
        );


        $stmt->execute([

            'id' => $id

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }

    public function findById(
        int $id
    ): ?Club {


        $stmt = $this->db->prepare(
            "CALL sp_club_find_by_id(:id)"
        );


        $stmt->execute([

            'id' => $id

        ]);


        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        return $row
            ? $this->mapToClub($row)
            : null;
    }

    public function findAll(
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array {

        $stmt = $this->db->prepare(
            "CALL sp_club_find_all(
                :search,
                :category_id,
                :status,
                :limit,
                :offset
            )"
        );

        $stmt->execute([

            'search' =>
            $filters['search'] ?? null,


            'category_id' =>
            $filters['category_id'] ?? null,


            'status' =>
            $filters['status'] ?? null,


            'limit' =>
            $limit,


            'offset' =>
            $offset

        ]);

        $clubs = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $clubs[] = $this->mapToClub($row);
        }

        return $clubs;
    }

    public function count(
        array $filters = []
    ): int {


        $stmt = $this->db->prepare(
            "CALL sp_club_count(
                :search,
                :category_id,
                :status
            )"
        );


        $stmt->execute([

            'search' =>
            $filters['search'] ?? null,


            'category_id' =>
            $filters['category_id'] ?? null,


            'status' =>
            $filters['status'] ?? null

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['total'];
    }

    public function findStudentClubs(
        array $filters = [],
        int $limit = 6,
        int $offset = 0
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_student_club_find_all(
            :search,
            :category_id,
            :limit,
            :offset
        )"

        );


        $stmt->execute([

            'search' =>
            $filters['search']
                ?? null,


            'category_id' =>
            $filters['category_id']
                ?? null,


            'limit' =>
            $limit,


            'offset' =>
            $offset

        ]);


        $clubs = [];


        while (
            $row =
            $stmt->fetch(PDO::FETCH_ASSOC)
        ) {

            $clubs[] =
                $this->mapToClub($row);
        }


        return $clubs;
    }

    public function countStudentClubs(
        array $filters = []
    ): int {


        $stmt = $this->db->prepare(

            "CALL sp_student_club_count(
            :search,
            :category_id
        )"

        );


        $stmt->execute([

            'search' =>
            $filters['search']
                ?? null,


            'category_id' =>
            $filters['category_id']
                ?? null

        ]);


        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['total'];
    }

    public function existsByName(
        string $name
    ): bool {


        $stmt = $this->db->prepare(
            "CALL sp_club_exists_by_name(:name)"
        );


        $stmt->execute([

            'name' => $name

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['total'] > 0;
    }

    public function existsByNameExcept(
        string $name,
        int $id
    ): bool {


        $stmt = $this->db->prepare(
            "CALL sp_club_exists_by_name_except(
                :id,
                :name
            )"
        );


        $stmt->execute([

            'id' => $id,

            'name' => $name

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['total'] > 0;
    }

    public function findByCreator(
        int $createdBy
    ): array {


        $stmt = $this->db->prepare(
            "CALL sp_club_find_by_creator(:created_by)"
        );


        $stmt->execute([

            'created_by' => $createdBy

        ]);


        $clubs = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $clubs[] = $this->mapToClub($row);
        }


        return $clubs;
    }

    public function findActiveClubs(): array
    {

        $stmt = $this->db->prepare(
            "CALL sp_club_find_active()"
        );


        $stmt->execute();


        $clubs = [];


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $clubs[] = $this->mapToClub($row);
        }


        return $clubs;
    }

    public function getStatistics(): array
    {


        $stmt = $this->db->prepare(
            "CALL sp_club_statistics()"
        );


        $stmt->execute();


        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }
    public function findLeadership(
        int $clubId
    ): array {

        $stmt = $this->db->prepare(
            "CALL sp_club_find_leadership(
            :club_id
        )"
        );


        $stmt->execute([

            'club_id' =>
            $clubId

        ]);


        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function findUpcomingEvents(int $clubId): array
    {
        $stmt = $this->db->prepare(
            "CALL sp_get_upcoming_events_by_club(:club_id)"
        );


        $stmt->execute([
            'club_id' => $clubId
        ]);


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    private function mapToClub(
        array $row
    ): Club {


        return new Club(

            id: isset($row['id'])
                ? (int)$row['id']
                : null,


            categoryId: (int)$row['category_id'],


            name: $row['name'],


            shortName: $row['short_name'] ?? null,


            description: $row['description'] ?? null,


            mission: $row['mission'] ?? null,


            vision: $row['vision'] ?? null,


            logo: $row['logo'] ?? null,


            banner: $row['banner'] ?? null,


            email: $row['email'] ?? null,


            phone: $row['phone'] ?? null,


            establishedDate: $row['established_date'] ?? null,


            memberLimit: isset($row['member_limit'])
                ? (int)$row['member_limit']
                : null,

            memberCount: (int)($row['member_count'] ?? 0),

            status: $row['status'] ?? 'active',


            createdBy: isset($row['created_by'])
                ? (int)$row['created_by']
                : null,


            deletedAt: $row['deleted_at'] ?? null,


            createdAt: $row['created_at'] ?? null,


            updatedAt: $row['updated_at'] ?? null

        );
    }
}