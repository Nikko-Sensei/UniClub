<?php

namespace App\Home\Application\Services;

use App\Home\Domain\Repository\HomeRepositoryInterface;

class HomeService
{

    private HomeRepositoryInterface $homeRepository;


    public function __construct(
        HomeRepositoryInterface $homeRepository
    ) {

        $this->homeRepository =
            $homeRepository;
    }



    /**
     * Homepage Statistics
     */
    public function getStatistics(): array
    {

        return
            $this->homeRepository
            ->getStatistics();

    }



    /**
     * Featured Clubs
     */
    public function getFeaturedClubs(
        int $limit = 6
    ): array {

        return
            $this->homeRepository
            ->getFeaturedClubs(
                $limit
            );

    }



    /**
     * Upcoming Events
     */
    public function getUpcomingEvents(
        int $limit = 6
    ): array {

        return
            $this->homeRepository
            ->getUpcomingEvents(
                $limit
            );

    }



    /**
     * Latest Announcements
     */
    public function getLatestAnnouncements(
        int $limit = 5
    ): array {

        return
            $this->homeRepository
            ->getLatestAnnouncements(
                $limit
            );

    }

}