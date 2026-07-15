<?php

namespace App\Announcement\Domain\Repository;


interface AnnouncementRepositoryInterface
{


    /**
     * Create announcement
     */
    public function create(
        array $data
    );



    /**
     * Update announcement
     */
    public function update(
        int $id,
        array $data
    );



    /**
     * Delete announcement
     */
    public function delete(
        int $id
    );



    /**
     * Find announcement by id
     */
    public function findById(
        int $id
    );



    /**
     * Get all announcements
     */
    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    );

     public function count(
        array $filters = []
    ): int;


    /**
     * Get announcements by club
     */
    public function findByClub(
        int $clubId
    );



    /**
     * Get published announcements
     */
    public function findPublished();


}