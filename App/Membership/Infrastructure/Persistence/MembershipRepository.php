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
        int $userId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_membership_my_clubs(
                :user_id
            )"

        );



        $stmt->execute([

            'user_id' => $userId

        ]);



        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
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
}