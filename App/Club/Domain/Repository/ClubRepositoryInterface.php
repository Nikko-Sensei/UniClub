<?php

namespace App\Club\Domain\Repository;

use App\Club\Domain\Entities\Club;


interface ClubRepositoryInterface
{

    public function create(
        Club $club
    ): int;

    public function update(
        Club $club
    ): bool;

    public function delete(
        int $id
    ): bool;

    public function findById(
        int $id
    ): ?Club;

    public function findAll(
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array;

    public function count(
        array $filters = []
    ): int;

    public function findStudentClubs(
        array $filters = [],
        int $limit = 6,
        int $offset = 0
    ): array;


    public function countStudentClubs(
        array $filters = []
    ): int;

    public function existsByName(
        string $name
    ): bool;

    public function existsByNameExcept(
        string $name,
        int $id
    ): bool;

    public function findByCreator(
        int $createdBy
    ): array;

    public function findActiveClubs(): array;

    public function getStatistics(): array;

    public function findLeadership(
        int $clubId
    ): array;

    public function findUpcomingEvents(
        int $clubId
    ): array;
}
