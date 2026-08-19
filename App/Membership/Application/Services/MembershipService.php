<?php

namespace App\Membership\Application\Services;


use App\Membership\Domain\Repository\MembershipRepositoryInterface;
use App\Notification\Application\Services\NotificationService;
use App\User\Application\Services\UserService;
use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;
use App\Payment\Domain\Repository\PaymentRepositoryInterface;
use App\Club\Application\Services\ClubService;


class MembershipService
{

    private MembershipRepositoryInterface $membershipRepository;
    private NotificationService $notificationService;
    private UserService $userService;
    private AuditLogger $auditLogger;

    private ClubService $clubService;


    public function __construct(
        MembershipRepositoryInterface $membershipRepository,
        NotificationService $notificationService,
        UserService $userService,
        AuditLogger $auditLogger,
        ClubService $clubService
    ) {

        $this->membershipRepository = $membershipRepository;

        $this->notificationService = $notificationService;

        $this->userService = $userService;

        $this->auditLogger = $auditLogger;

        $this->clubService = $clubService;
    }


    public function joinClub(
        int $clubId,
        int $userId
    ): int {

        $memberRoleId = 4;


        /*
        Get club
    */
        $club =
            $this->clubService
            ->getClub($clubId);


        if (!$club) {

            throw new \Exception(
                "Club not found."
            );
        }



        /*
        Check existing membership
    */
        $membership =
            $this->membershipRepository
            ->findByUserAndClub(
                $clubId,
                $userId
            );



        if ($membership) {


            if ($membership['status'] === 'pending') {

                throw new \Exception(
                    "Your request is waiting for approval."
                );
            }


            if ($membership['status'] === 'approved') {

                throw new \Exception(
                    "You are already a member of this club."
                );
            }


            if ($membership['status'] === 'left') {

                return $this->membershipRepository
                    ->rejoin(

                        $clubId,

                        $userId,

                        $memberRoleId

                    );
            }

            if ($membership['status'] === 'rejected') {


                $membershipId =
                    $this->membershipRepository
                    ->rejoin(
                        $clubId,
                        $userId,
                        $memberRoleId
                    );


                if (!$membershipId) {

                    throw new \Exception(
                        "Could not rejoin club."
                    );
                }


                return $membershipId;
            }
        }


        /*
Paid Club
*/
        //     if ($club->getMembershipFee() > 0) {

        //         // var_dump("reach here");
        //         // exit;

        //         /*
        //     Step 1:
        //     Create membership request
        //     Get membership ID
        // */
        //         $membershipId =
        //             $this->membershipRepository
        //             ->create(

        //                 $clubId,

        //                 $userId,

        //                 $memberRoleId

        //             );


        //         if (!$membershipId) {

        //             throw new \Exception(
        //                 "Could not create membership request."
        //             );
        //         }




        //         /*
        //     Step 2:
        //     Create payment linked with membership
        // */
        //         $paymentCreated =
        //             $this->paymentRepository
        //             ->create(

        //                 $userId,

        //                 $clubId,

        //                 $membershipId,

        //                 $club->getMembershipFee(),

        //                 'bank_transfer',

        //                 null,

        //                 null

        //             );



        //         if (!$paymentCreated) {

        //             throw new \Exception(
        //                 "Payment creation failed."
        //             );
        //         }



        //         return true;
        //     }




        /*
        Free Club
    */
        $created =
            $this->membershipRepository
            ->create(

                $clubId,

                $userId,

                $memberRoleId

            );

        // var_dump($created);
        // exit;



        if (!$created) {

            return false;
        }



        $this->auditLogger->log(

            AuditAction::JOIN_CLUB,

            $userId,

            'Membership',

            $clubId,

            [
                'action' =>
                'Student requested to join club'
            ]

        );



        /*
    Free club -> Notify admins immediately.
    Paid club -> Notification will be sent after payment submission.
*/
        if ($club->getMembershipFee() <= 0) {

            $this->notifyAdmins(
                $clubId,
                $userId
            );
        }

        return $created;
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


        $result =
            $this->membershipRepository
            ->leave(
                $clubId,
                $userId
            );


        if ($result) {


            $this->auditLogger->log(

                AuditAction::LEAVE_CLUB,

                $userId,

                'Membership',

                $clubId,

                [
                    'action' => 'Student left club'
                ]

            );
        }


        return $result;
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

        $this->auditLogger->log(

            AuditAction::APPROVE_MEMBERSHIP,

            $adminId,

            'Membership',

            $membershipId,

            [
                'user_id' => $membership['user_id'],
                'club_id' => $membership['club_id'],
                'action' => 'Membership approved'
            ]

        );
    }


    // public function rejectMembership(
    //     int $membershipId,
    //     int $adminId
    // ): void {

    //     $rejected =
    //         $this->membershipRepository
    //         ->rejectMembership(
    //             $membershipId,
    //             $adminId
    //         );


    //     if (!$rejected) {

    //         throw new \Exception(
    //             'Membership request could not be rejected'
    //         );
    //     }

    //     $this->auditLogger->log(

    //         AuditAction::REJECT_MEMBERSHIP,

    //         $adminId,

    //         'Membership',

    //         $membershipId,

    //         [
    //             'action' => 'Membership rejected'
    //         ]

    //     );
    // }


    public function rejectMembership(
        int $membershipId,
        int $adminId
    ): void {

        /*
     * Get membership before rejection
     * so we know who to notify.
     */
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


        /*
     * Reject membership
     */
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


        /*
     * Notify student
     */
        $this->notificationService
            ->create(
                $membership['user_id'],
                'Membership Rejected',
                "Your request to join {$membership['club_name']} has been rejected.",
                'membership_rejected',
                'club',
                $membership['club_id']
            );


        /*
     * Audit log
     */
        $this->auditLogger->log(

            AuditAction::REJECT_MEMBERSHIP,

            $adminId,

            'Membership',

            $membershipId,

            [
                'user_id' => $membership['user_id'],
                'club_id' => $membership['club_id'],
                'action' => 'Membership rejected'
            ]

        );
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



        $result =
            $this->membershipRepository
            ->updateRole(
                $membershipId,
                $roleId
            );


        if ($result) {


            $this->auditLogger->log(

                AuditAction::UPDATE_MEMBER_ROLE,

                $_SESSION['user']['id'],

                'Membership',

                $membershipId,

                [
                    'new_role_id' => $roleId
                ]

            );
        }


        return $result;
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



        $result =
            $this->membershipRepository
            ->remove(
                $membershipId
            );


        if ($result) {


            $this->auditLogger->log(

                AuditAction::REMOVE_MEMBER,

                $_SESSION['user']['id'],

                'Membership',

                $membershipId,

                [
                    'action' => 'Member removed'
                ]

            );
        }


        return $result;
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
