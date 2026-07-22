<?php

namespace App\Contact\Domain\Repository;


use App\Contact\Domain\Entities\ContactMessage;


interface ContactRepositoryInterface
{

    public function create(
        ContactMessage $contactMessage
    ): bool;



    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    ): array;

    public function count(
        array $filters = []
    ): int;



    public function findById(
        int $id
    ): ?ContactMessage;



    public function updateStatus(
        int $id,
        string $status
    ): bool;

    public function delete(
        int $id
    ): bool;
}