<?php

namespace App\Auth\Domain\Repository;


interface LoginAttemptRepositoryInterface
{

    public function findByEmail(
        string $email
    ): ?array;



    public function increase(
        string $email
    ): bool;



    public function reset(
        string $email
    ): bool;



    public function lock(
        string $email,
        int $minutes
    ): bool;

}