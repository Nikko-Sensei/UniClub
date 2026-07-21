<?php

namespace App\Membership\Application\Services;


use App\Membership\Domain\Repository\MembershipRepositoryInterface;
use App\Notification\Application\Services\NotificationService;
use App\User\Application\Services\UserService;


class MembershipService
{

    private MembershipRepositoryInterface $membershipRepository;
    private NotificationService $notificationService;

    private UserService $userService;



    public function __construct(
        MembershipRepositoryInterface $membershipRepository,
        NotificationService $notificationService,
        UserService $userService
    ) {

        $this->membershipRepository = $membershipRepository;


        $this->notificationService = $notificationService;


        $this->userService = $userService;
    }



    // public function joinClub(
    //     int $clubId,
    //     int $userId
    // ): bool {


    //     if (
    //         $this->membershipRepository
    //         ->exists(
    //             $clubId,
    //             $userId
    //         )
    //     ) {

    //         throw new \Exception(
    //             "You already requested this club"
    //         );
    //     }


    //     /*
    //         Default club role:
    //         4 = Member

    //         Change this if your
    //         club_roles table uses another ID
    //     */

    //     $memberRoleId = 4;



    //     return $this->membershipRepository
    //         ->create(
    //             $clubId,
    //             $userId,
    //             $memberRoleId
    //         );
    // }
    public function joinClub(
        int $clubId,
        int $userId
    ): bool {


        $memberRoleId = 4;


        $membership =
            $this->membershipRepository
            ->findByUserAndClub(
                $clubId,
                $userId
            );


        /*
        Existing membership found
    */
        if ($membership) {


            if (
                $membership['status'] === 'pending'
            ) {

                throw new \Exception(
                    "Your request is waiting for approval."
                );
            }



            if (
                $membership['status'] === 'approved'
            ) {

                throw new \Exception(
                    "You are already a member of this club."
                );
            }



            if (
                $membership['status'] === 'left'
            ) {


                $rejoined =
                    $this->membershipRepository
                    ->rejoin(
                        $clubId,
                        $userId,
                        $memberRoleId
                    );


                if (!$rejoined) {

                    throw new \Exception(
                        "Could not send join request again."
                    );
                }


                /*
                Notify Admins after rejoin
            */
                $this->notifyAdmins(
                    $clubId,
                    $userId
                );


                return true;
            }
        }



        /*
        New membership
    */

        $created =
            $this->membershipRepository
            ->create(
                $clubId,
                $userId,
                $memberRoleId
            );



        if (!$created) {

            return false;
        }



        /*
        Notify Admins after new request
    */

        $this->notifyAdmins(
            $clubId,
            $userId
        );


        return true;
    }



    public function getMembershipStatus(
        int $clubId,
        int $userId
    ): ?string {

        return $this->membershipRepository
            ->getStatus(
                $clubId,
                $userId
            );
    }



    /**
     * Get Student Clubs With Pagination
     */
    // public function getMyClubs(
    //     int $userId,
    //     int $page,
    //     int $limit
    // ): array {


    //     $clubs =
    //         $this->membershipRepository
    //         ->getMyClubs(
    //             $userId,
    //             $page,
    //             $limit
    //         );



    //     $total =
    //         $this->membershipRepository
    //         ->getMyClubsCount(
    //             $userId
    //         );



    //     $totalPages =
    //         (int)ceil(
    //             $total / $limit
    //         );



    //     return [

    //         'data' => $clubs,

    //         'current_page' => $page,

    //         'total_pages' => $totalPages

    //     ];
    // }


    /**
     * Get Student Clubs With Pagination + Dashboard Statistics
     */
    public function getMyClubs(
        int $userId,
        int $page,
        int $limit
    ): array {


        $clubs =
            $this->membershipRepository
            ->getMyClubs(
                $userId,
                $page,
                $limit
            );


        $total =
            $this->membershipRepository
            ->getMyClubsCount(
                $userId
            );


        return [

            'data' => $clubs,


            'pagination' => [

                'current_page' =>
                $page,


                'total_pages' =>
                ceil(
                    $total / $limit
                ),


                'total' =>
                $total

            ]

        ];
    }

    public function getStudentStatistics(
        int $userId
    ): array {


        return $this->membershipRepository
            ->getStudentStatistics(
                $userId
            );
    }


    public function leaveClub(
        int $clubId,
        int $userId
    ): bool {


        return $this->membershipRepository
            ->leave(
                $clubId,
                $userId
            );
    }

    public function getPendingMemberships(): array
    {

        return $this->membershipRepository
            ->getPendingMemberships();
    }

    // public function approveMembership(
    //     int $membershipId,
    //     int $adminId
    // ): void {

    //     $approved =
    //         $this->membershipRepository
    //         ->approveMembership(
    //             $membershipId,
    //             $adminId
    //         );


    //     if (!$approved) {

    //         throw new \Exception(
    //             'Membership request could not be approved'
    //         );
    //     }
    // }

    public function approveMembership(
        int $membershipId,
        int $adminId
    ): void {


        $membership =
            $this->membershipRepository
            ->getById(
                $membershipId
            );


        if (!$membership) {

            throw new \Exception(
                'Membership not found'
            );
        }



        $approved =
            $this->membershipRepository
            ->approveMembership(
                $membershipId,
                $adminId
            );



        if (!$approved) {

            throw new \Exception(
                'Membership request could not be approved'
            );
        }



        $this->notificationService
            ->create(
                $membership['user_id'],
                'Membership Approved',
                "Your request to join {$membership['club_name']} has been approved.",
                'membership_approved',
                'club',
                $membership['club_id']
            );
    }


    public function rejectMembership(
        int $membershipId,
        int $adminId
    ): void {

        $rejected =
            $this->membershipRepository
            ->rejectMembership(
                $membershipId,
                $adminId
            );


        if (!$rejected) {

            throw new \Exception(
                'Membership request could not be rejected'
            );
        }
    }

    public function getStatistics(): array
    {
        return
            $this->membershipRepository
            ->getStatistics();
    }

    public function updateRole(
        int $membershipId,
        int $roleId
    ): bool {

        $membership =
            $this->membershipRepository
            ->getById(
                $membershipId
            );


        if (!$membership) {

            throw new \Exception(
                'Membership not found'
            );
        }



        if (
            $this->membershipRepository
            ->existsLeadershipRole(
                $membership['club_id'],
                $roleId
            )
        ) {

            throw new \Exception(
                'This leadership role is already assigned.'
            );
        }



        return $this->membershipRepository
            ->updateRole(
                $membershipId,
                $roleId
            );
    }
    public function getMembersByClub(
        int $clubId,
        array $filters = [],
        int $page = 1
    ): array {

        $limit = 10;


        $offset =
            ($page - 1) * $limit;



        $members =
            $this->membershipRepository
            ->getMembersByClub(
                $clubId,
                $filters,
                $limit,
                $offset
            );


        $total =
            $this->membershipRepository
            ->countMembersByClub(
                $clubId,
                $filters
            );


        return [

            'members' => $members,


            'pagination' => [

                'current_page' =>
                $page,


                'total_pages' =>
                ceil(
                    $total / $limit
                ),


                'total' =>
                $total

            ]

        ];
    }

    public function getMembershipById(
        int $id
    ): ?array {

        return $this->membershipRepository
            ->getById(
                $id
            );
    }

    public function getRoles(): array
    {

        return $this->membershipRepository
            ->getRoles();
    }

    public function removeMember(
        int $membershipId
    ): bool {

        $membership =
            $this->membershipRepository
            ->getById(
                $membershipId
            );


        if (!$membership) {

            throw new \Exception(
                'Member not found'
            );
        }



        if (
            in_array(
                $membership['role'],
                [
                    'President',
                    'Vice President',
                    'Secretary'
                ]
            )
        ) {

            throw new \Exception(
                'Please assign another leader before removing this member.'
            );
        }



        return $this->membershipRepository
            ->remove(
                $membershipId
            );
    }

    private function notifyAdmins(
        int $clubId,
        int $userId
    ): void {


        $membership =
            $this->membershipRepository
            ->findByUserAndClub(
                $clubId,
                $userId
            );


        if (!$membership) {

            return;
        }



        $admins =
            $this->userService
            ->getAdmins();



        foreach ($admins as $admin) {

            $this->notificationService
                ->create(
                    $admin->getId(),
                    'New Membership Request',
                    "{$membership['name']} requested to join {$membership['club_name']}.",
                    'membership_request',
                    'club',
                    $clubId
                );
        }
    }
}
