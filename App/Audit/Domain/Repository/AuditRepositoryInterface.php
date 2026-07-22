<?php

namespace App\Audit\Domain\Repository;


interface AuditRepositoryInterface
{

    public function findAll(
        int $limit,
        int $offset,
        array $filters = []
    ): array;



    public function count(
        array $filters = []
    ): int;

}