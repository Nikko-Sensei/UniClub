<?php

namespace App\Admin\Dashboard\Infrastructure\Persistence;

use App\Admin\Dashboard\Domain\Repository\DashboardRepositoryInterface;
use App\Shared\Database\Database;
use PDO;
use App\Shared\Infrastructure\Persistence\BaseRepository;

class DashboardRepository extends BaseRepository implements DashboardRepositoryInterface
{


    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    public function getTotalUsers(): int
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) FROM users"
        );

        return (int) $stmt->fetchColumn();
    }


    public function getTotalClubs(): int
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) FROM clubs"
        );

        return (int) $stmt->fetchColumn();
    }


    public function getTotalEvents(): int
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) FROM events"
        );

        return (int) $stmt->fetchColumn();
    }


    public function getTotalAnnouncements(): int
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) FROM announcements"
        );

        return (int) $stmt->fetchColumn();
    }


    public function getTotalMemberships(): int
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) FROM club_memberships"
        );

        return (int) $stmt->fetchColumn();
    }


    public function getRecentActivities(int $limit = 10): array
    {
        $sql = "
            SELECT 
                action,
                created_at
            FROM audit_logs
            ORDER BY created_at DESC
            LIMIT :limit
        ";


        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(
            ':limit',
            $limit,
            PDO::PARAM_INT
        );

        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersByDepartment(): array
    {
        $sql = "
        SELECT
            departments.name,
            COUNT(users.id) AS total
        FROM users
        INNER JOIN departments
        ON departments.id = users.department_id
        GROUP BY departments.id
    ";


        return $this->db
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventsPerMonth(): array
    {
        $sql = "
        SELECT
            MONTHNAME(event_date) AS month,
            COUNT(id) AS total
        FROM events
        GROUP BY MONTH(event_date)
        ORDER BY MONTH(event_date)
    ";


        return $this->db
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMembershipsByClub(): array
    {
        $sql = "
        SELECT
            clubs.name,
            COUNT(club_memberships.id) AS total
        FROM clubs

        INNER JOIN club_memberships
        ON clubs.id = club_memberships.club_id

        GROUP BY clubs.id
        ORDER BY total DESC
    ";


        return $this->db
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcomingEvents(int $limit = 5): array
    {
        $sql = "
        SELECT
            events.title,
            events.event_date,
            events.start_time,
            events.end_time,
            events.venue,
            clubs.name AS club_name

        FROM events

        INNER JOIN clubs
        ON clubs.id = events.club_id

        WHERE events.event_date >= CURDATE()

        AND events.status = 'published'

        ORDER BY events.event_date ASC

        LIMIT :limit
    ";


        $stmt = $this->db->prepare($sql);


        $stmt->bindValue(
            ':limit',
            $limit,
            PDO::PARAM_INT
        );


        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
