<?php

namespace App\Event\Domain\Repository;


interface EventRepositoryInterface
{

    public function create(array $data);


    public function update(
        int $id,
        array $data
    );


    public function delete(
        int $id
    );


    public function findById(
        int $id
    );


    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    );

    public function count(
        array $filters = []
    ): int;


    public function statistics();


    public function findStudentEvents(
        int $userId
    );


    public function registrationExists(
        int $eventId,
        int $userId
    );


    public function createRegistration(
        int $eventId,
        int $userId,
        ?string $note
    );


    public function cancelRegistration(
        int $eventId,
        int $userId
    );


    public function getRegistrationStatus(
        int $eventId,
        int $userId
    );


    public function getRegistrations(
        int $eventId
    );


    public function approveRegistration(
        int $registrationId,
        int $adminId
    );


    public function rejectRegistration(
        int $registrationId,
        int $adminId
    );
}
