<?php

namespace App\Home\Infrastructure\Persistence;

use App\Home\Domain\Repository\HomeRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use PDO;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    /**
     * Homepage Statistics
     */
    public function getStatistics(): array
    {

        $stmt =
            $this->db->prepare(
                "CALL sp_home_statistics()"
            );


        $stmt->execute();


        $statistics =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return $statistics;

    }



    /**
     * Featured Clubs
     */
    public function getFeaturedClubs(
        int $limit
    ): array
    {

        $stmt =
            $this->db->prepare(

                "CALL sp_home_featured_clubs(
                    :limit
                )"

            );


        $stmt->execute([

            'limit' => $limit

        ]);


        $clubs =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return $clubs;

    }



    /**
     * Upcoming Events
     */
    public function getUpcomingEvents(
        int $limit
    ): array
    {

        $stmt =
            $this->db->prepare(

                "CALL sp_home_upcoming_events(
                    :limit
                )"

            );


        $stmt->execute([

            'limit' => $limit

        ]);


        $events =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return $events;

    }



    /**
     * Latest Announcements
     */
    public function getLatestAnnouncements(
        int $limit
    ): array
    {

        $stmt =
            $this->db->prepare(

                "CALL sp_home_latest_announcements(
                    :limit
                )"

            );


        $stmt->execute([

            'limit' => $limit

        ]);


        $announcements =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return $announcements;

    }

}