<?php

namespace App\EventFeedback\Domain\Repository;


use App\EventFeedback\Domain\Entities\EventFeedback;


interface EventFeedbackRepositoryInterface
{


    /**
     * Create feedback
     */
    public function create(
        array $data
    );



    /**
     * Get feedback by event
     */
    public function findByEvent(
        int $eventId
    );

   
    /**
     * Get feedback by user
    //  */
    // public function findByUser(
    //     int $eventId,
    //     int $userId
    // );



    /**
     * Admin feedback list
     */
    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    );



    /**
     * Count feedback
     */
    public function count(
        array $filters = []
    );



    /**
     * Check duplicate feedback
     */
    public function exists(
        int $eventId,
        int $userId
    );





    /**
     * Delete feedback
     */
    public function delete(
        int $id
    );
}