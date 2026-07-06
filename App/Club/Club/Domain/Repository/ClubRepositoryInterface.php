<?php

namespace App\Club\Club\Domain\Repository;

use App\Club\Club\Application\DTOs\ClubDTO;
use App\Club\Club\Domain\Entities\Club;

interface ClubRepositoryInterface
{
    public function create(ClubDTO $dto): int;

    public function update(int $id, ClubDTO $dto): bool;

    public function delete(int $id): bool;

    public function findAll(): array;

    public function findAllWithDetails(): array;

    public function findById(int $id): ?Club;

    public function existsByName(string $name): bool;

    public function existsByNameExcept(int $id, string $name): bool;

    public function getStatistics(): array;
}