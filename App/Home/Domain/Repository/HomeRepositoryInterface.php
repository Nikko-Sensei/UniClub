<?php

namespace App\Home\Domain\Repository;


interface HomeRepositoryInterface
{

    /**
     * Homepage Statistics
     */
    public function getStatistics(): array;



    /**
     * Featured Clubs
     */
    public function getFeaturedClubs(
        int $limit
    ): array;



    /**
     * Upcoming Events
     */
    public function getUpcomingEvents(
        int $limit
    ): array;



    /**
     * Latest Announcements
     */
    public function getLatestAnnouncements(
        int $limit
    ): array;

}