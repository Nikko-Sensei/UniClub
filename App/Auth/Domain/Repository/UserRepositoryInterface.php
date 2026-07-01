<?php

namespace App\Auth\Domain\Repository;

use App\Auth\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function create( User $user): bool;

    public function findByEmail( string $email): ?User;

    public function findById( int $id): ?User;

    public function findByStudentId(string $studentId): ?User;

    public function updateLastLogin(int $id): bool;

    public function updatePassword(int $userId,string $password): bool;
    
}