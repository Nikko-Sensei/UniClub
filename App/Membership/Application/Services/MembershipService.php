<?php

namespace App\Membership\Application\Services;


use App\Membership\Domain\Repository\MembershipRepositoryInterface;


class MembershipService
{

    private MembershipRepositoryInterface $membershipRepository;


    public function __construct(
        MembershipRepositoryInterface $membershipRepository
    ) {

        $this->membershipRepository = $membershipRepository;
    }



    public function joinClub(
        int $clubId,
        int $userId
    ): bool {


        if (
            $this->membershipRepository
            ->exists(
                $clubId,
                $userId
            )
        ) {

            throw new \Exception(
                "You already requested this club"
            );
        }


        /*
            Default club role:
            4 = Member

            Change this if your
            club_roles table uses another ID
        */

        $memberRoleId = 4;



        return $this->membershipRepository
            ->create(
                $clubId,
                $userId,
                $memberRoleId
            );
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



    public function getMyClubs(
        int $userId
    ): array {

        return $this->membershipRepository
            ->getMyClubs(
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

    public function approveMembership(
        int $membershipId,
        int $adminId
    ): void {

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
}