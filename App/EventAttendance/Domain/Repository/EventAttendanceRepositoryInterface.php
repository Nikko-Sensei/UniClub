<?php

namespace App\EventAttendance\Domain\Repository;


use App\EventAttendance\Domain\Entities\EventAttendance;



interface EventAttendanceRepositoryInterface
{


    public function create(
        array $data
    ): EventAttendance;




    public function update(
        array $data
    ): EventAttendance;




    public function findByEventId(
        int $eventId
    ): array;




    public function findByUserId(
        int $userId
    ): array;




    public function exists(

        int $eventId,

        int $userId

    ): bool;




    public function findByEventIdAndUserId(

        int $eventId,

        int $userId

    ): ?EventAttendance;

    public function statistics(
        int $eventId
    ): array;
}
