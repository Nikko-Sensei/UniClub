<?php

namespace App\Club\Club\Application\Services;

use App\Club\Club\Application\DTOs\ClubDTO;
use App\Club\Club\Domain\Repository\ClubRepositoryInterface;
use App\Club\Club\Domain\Exceptions\DuplicateClubException;
use App\Club\Club\Domain\Exceptions\ClubNotFoundException;
use App\Club\Club\Domain\Entities\Club;

class ClubService
{
    public function __construct(
        private ClubRepositoryInterface $clubRepository
    ) {}

    public function create(ClubDTO $dto): int
    {
        $this->ensureNameIsUnique($dto->name);

        return $this->clubRepository->create($dto);
    }

    public function update(int $id, ClubDTO $dto): bool
    {
        $club = $this->getClubOrFail($id);

        $this->ensureNameIsUniqueExcept($id, $dto->name);

        return $this->clubRepository->update($id, $dto);
    }

    public function delete(int $id): bool
    {
        $this->getClubOrFail($id);

        return $this->clubRepository->delete($id);
    }

    public function getAll(): array
    {
        return $this->clubRepository->findAllWithDetails();
    }

    public function getById(int $id): Club
    {
        return $this->getClubOrFail($id);
    }

    public function statistics(): array
    {
        return $this->clubRepository->getStatistics();
    }

    // =========================
    // PRIVATE HELPERS (CLEAN)
    // =========================

    private function getClubOrFail(int $id): Club
    {
        $club = $this->clubRepository->findById($id);

        if (!$club) {
            throw new ClubNotFoundException();
        }

        return $club;
    }

    private function ensureNameIsUnique(string $name): void
    {
        if ($this->clubRepository->existsByName($name)) {
            throw new DuplicateClubException();
        }
    }

    private function ensureNameIsUniqueExcept(int $id, string $name): void
    {
        if ($this->clubRepository->existsByNameExcept($id, $name)) {
            throw new DuplicateClubException();
        }
    }
}