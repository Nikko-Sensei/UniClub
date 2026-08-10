<?php

namespace App\EventCertificate\Domain\Repository;

use App\EventCertificate\Domain\Entities\EventCertificate;

interface EventCertificateRepositoryInterface
{

    /**
     * Issue certificate
     */
    public function create(
        array $data
    ): EventCertificate;



    /**
     * Update certificate
     */
    public function update(
        array $data
    ): EventCertificate;



    /**
     * Find certificate by id
     */
    public function findById(
        int $id
    ): ?EventCertificate;



    /**
     * Find certificate by event and user
     */
    public function findByEventAndUser(

        int $eventId,

        int $userId

    ): ?EventCertificate;



    /**
     * Find all certificates for an event
     */
    public function findByEvent(
        int $eventId
    ): array;



    /**
     * Find all certificates of a user
     */
    public function findByUser(
        int $userId
    ): array;



    /**
     * Check if certificate already exists
     */
    public function exists(

        int $eventId,

        int $userId

    ): bool;



    /**
     * Certificate statistics
     */
    public function statistics(): array;

}