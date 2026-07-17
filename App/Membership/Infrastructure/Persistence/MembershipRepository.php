<?php

namespace App\Membership\Infrastructure\Persistence;


use App\Membership\Domain\Repository\MembershipRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use PDO;



class MembershipRepository extends BaseRepository implements MembershipRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(
            Database::getConnection()
        );
    }



    public function exists(
        int $clubId,
        int $userId
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_membership_exists(
                :club_id,
                :user_id
            )"

        );


        $stmt->execute([

            'club_id' => $clubId,

            'user_id' => $userId

        ]);



        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);



        return (int)$result['total'] > 0;
    }




    public function create(
        int $clubId,
        int $userId,
        int $clubRoleId
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_membership_create(
                :club_id,
                :user_id,
                :club_role_id
            )"

        );



        $stmt->execute([

            'club_id' => $clubId,

            'user_id' => $userId,

            'club_role_id' => $clubRoleId

        ]);



        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }





    public function getStatus(
        int $clubId,
        int $userId
    ): ?string {


        $stmt = $this->db->prepare(

            "CALL sp_membership_get_status(
                :club_id,
                :user_id
            )"

        );



        $stmt->execute([

            'club_id' => $clubId,

            'user_id' => $userId

        ]);



        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);



        return $result['status']
            ?? null;
    }





    public function getMyClubs(
        int $userId,
        int $page,
        int $limit
    ): array {


        $offset = ($page - 1) * $limit;


        $stmt = $this->db->prepare(

            "CALL sp_membership_my_clubs(
            :user_id,
            :offset,
            :limit
        )"

        );


        $stmt->execute([

            'user_id' => $userId,

            'offset' => $offset,

            'limit' => $limit

        ]);



        $clubs =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return $clubs;
    }

    /**
     * Get Total Approved Clubs Count
     */
    public function getMyClubsCount(
        int $userId
    ): int {


        $stmt = $this->db->prepare(

            "CALL sp_membership_my_clubs_count(
            :user_id
        )"

        );


        $stmt->execute([

            'user_id' => $userId

        ]);



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );



        $stmt->closeCursor();



        return (int)(
            $result['total'] ?? 0
        );
    }

    public function leave(
        int $clubId,
        int $userId
    ): bool {
        $stmt = $this->db->prepare(
            "CALL sp_membership_leave(
            :club_id,
            :user_id
        )"
        );



        $dataResult =  $stmt->execute([

            'club_id' => $clubId,

            'user_id' => $userId

        ]);



        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }

    public function getPendingMemberships(): array
    {

        $stmt =
            $this->db
            ->prepare(
                "CALL sp_membership_pending_list()"
            );


        $stmt->execute();


        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function approveMembership(
        int $membershipId,
        int $adminId
    ): bool {

        $stmt =
            $this->db
            ->prepare(
                "CALL sp_membership_approve(
                :membership_id,
                :admin_id
            )"
            );


        $stmt->execute([

            'membership_id' =>
            $membershipId,

            'admin_id' =>
            $adminId

        ]);


        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return (int)(
            $result['affected']
            ?? 0
        ) > 0;
    }


    public function rejectMembership(
        int $membershipId,
        int $adminId
    ): bool {

        $stmt =
            $this->db
            ->prepare(
                "CALL sp_membership_reject(
                :membership_id,
                :admin_id
            )"
            );


        $stmt->execute([

            'membership_id' =>
            $membershipId,

            'admin_id' =>
            $adminId

        ]);


        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return (int)(
            $result['affected']
            ?? 0
        ) > 0;
    }

    public function getStatistics(): array
    {
        $stmt =
            $this->db
            ->prepare(
                "CALL sp_membership_statistics()"
            );

        $stmt->execute();

        $statistics =
            $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->closeCursor();

        return $statistics;
    }

    public function updateRole(
        int $membershipId,
        int $roleId
    ): bool {

        $stmt = $this->db->prepare(
            "CALL sp_membership_update_role(
            :id,
            :role_id
        )"
        );


        $stmt->execute([

            'id' => $membershipId,

            'role_id' => $roleId

        ]);


        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }

    public function getMembersByClub(
        int $clubId,
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array {

        $stmt = $this->db->prepare(

            "CALL sp_membership_find_by_club(
            :club_id,
            :search,
            :role_id,
            :status,
            :limit,
            :offset
        )"

        );


        $stmt->execute([

            'club_id' => $clubId,

            'search' =>
            $filters['search'] ?? null,

            'role_id' =>
            $filters['role_id'] ?? null,

            'status' =>
            $filters['status'] ?? null,

            'limit' => $limit,

            'offset' => $offset

        ]);


        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function countMembersByClub(
        int $clubId,
        array $filters = []
    ): int {

        $stmt = $this->db->prepare(

            "CALL sp_membership_count_by_club(
            :club_id,
            :search,
            :role_id,
            :status
        )"

        );


        $stmt->execute([

            'club_id' => $clubId,

            'search' =>
            $filters['search'] ?? null,

            'role_id' =>
            $filters['role_id'] ?? null,

            'status' =>
            $filters['status'] ?? null

        ]);



        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);



        return (int)$result['total'];
    }

    public function getById(
        int $id
    ): ?array {

        $stmt = $this->db->prepare(
            "CALL sp_membership_find_by_id(
            :id
        )"
        );


        $stmt->execute([

            'id' => $id

        ]);


        return $stmt->fetch(
            PDO::FETCH_ASSOC
        ) ?: null;
    }

    public function getRoles(): array
    {

        $stmt = $this->db->prepare(
            "CALL sp_club_roles_find_all()"
        );


        $stmt->execute();


        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function remove(
        int $membershipId
    ): bool {

        $stmt = $this->db->prepare(
            "CALL sp_membership_remove(:id)"
        );


        $stmt->execute([

            'id' => $membershipId

        ]);


        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['affected'] > 0;
    }

    public function existsLeadershipRole(
        int $clubId,
        int $roleId
    ): bool {

        $stmt = $this->db->prepare(
            "CALL sp_membership_exists_leadership_role(
            :club_id,
            :role_id
        )"
        );


        $stmt->execute([

            'club_id' => $clubId,

            'role_id' => $roleId

        ]);


        $result =
            $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['total'] > 0;
    }
}