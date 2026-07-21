<?php

namespace App\Membership\Domain\Repository;


interface MembershipRepositoryInterface
{


    public function exists(
        int $clubId,
        int $userId
    ): bool;


    public function findByUserAndClub(
        int $clubId,
        int $userId
    ): ?array;

    public function rejoin(
        int $clubId,
        int $userId,
        int $clubRoleId
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
        int $userId,
        int $page,
        int $limit
    ): array;

    public function getMyClubsCount(
        int $userId
    ): int;


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

    public function getStudentStatistics(
        int $userId
    ): array;

    public function updateRole(
        int $membershipId,
        int $roleId
    ): bool;

    public function getMembersByClub(
        int $clubId,
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array;

    public function getById(
        int $id
    ): ?array;

    public function getRoles(): array;

    public function remove(
        int $membershipId
    ): bool;

    public function existsLeadershipRole(
        int $clubId,
        int $roleId
    ): bool;

    public function countMembersByClub(
        int $clubId,
        array $filters = []
    ): int;

    public function getPendingMembershipCount(
        int $userId
    ): int;

    public function getUpcomingEventCount(
        int $userId
    ): int;
}
