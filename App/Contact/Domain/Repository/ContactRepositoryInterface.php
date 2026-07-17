<?php

namespace App\Contact\Domain\Repository;


use App\Contact\Domain\Entities\ContactMessage;


interface ContactRepositoryInterface
{

    public function create(
        ContactMessage $contactMessage
    ): bool;



    public function findAll(): array;



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
