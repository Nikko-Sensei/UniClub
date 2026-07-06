<?php

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function create(User $user): bool;

    public function findByEmail(string $email): ?User;

    public function findById(int $id): ?User;

    public function findByStudentId(string $studentId): ?User;

    public function updateLastLogin(int $id): bool;

    public function updatePassword(int $userId, string $password): bool;

    public function findAll(): array;

    public function updateStatus(int $id, string $status): bool;

    public function search(string $keyword): array;

    public function updateProfile(
        int $id,
        string $name,
        ?string $phone,
        ?string $profileImage
    ): bool;
}