<?php

namespace App\Membership\Domain\Repository;


interface MembershipRepositoryInterface
{


    public function exists(
        int $clubId,
        int $userId
    ): bool;



    public function create(
        int $clubId,
        int $userId,
        int $clubRoleId
    ): bool;



    public function getStatus(
        int $clubId,
        int $userId
    ): ?string;



    public function getMyClubs(
        int $userId
    ): array;


    public function leave(
        int $clubId,
        int $userId
    ): bool;

    public function getPendingMemberships(): array;

    public function approveMembership(
        int $membershipId,
        int $adminId
    ): bool;


   public function rejectMembership(
        int $membershipId,
        int $adminId
    ): bool;

    public function getStatistics(): array;

}