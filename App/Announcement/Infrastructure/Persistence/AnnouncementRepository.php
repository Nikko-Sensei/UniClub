<?php

namespace App\Announcement\Infrastructure\Persistence;

use App\Announcement\Domain\Repository\AnnouncementRepositoryInterface;
use App\Announcement\Domain\Entities\Announcement;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;

class AnnouncementRepository extends BaseRepository implements AnnouncementRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    public function create(
        array $data
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_create(?,?,?,?,?,?,?,?)"
            );

        $stmt->execute([

            $data['club_id'],

            $data['title'],

            $data['content'],

            $data['priority'],

            $data['image'] ?? null,

            $data['status'],

            $data['visibility'] ?? 'all',

            $data['created_by']

        ]);

        return $stmt->fetch();
    }


    public function update(
        int $id,
        array $data
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_update(?,?,?,?,?,?,?)"
            );

        return $stmt->execute([

            $id,

            $data['title'],

            $data['content'],

            $data['priority'],

            $data['image'] ?? null,

            $data['status'],

            $data['visibility'] ?? 'all'

        ]);
    }


    public function delete(
        int $id
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_delete(?)"
            );

        return $stmt->execute([

            $id

        ]);
    }


    public function findById(
        int $id
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_find_by_id(?)"
            );

        $stmt->execute([

            $id

        ]);

        $announcement = $stmt->fetch();

        if (!$announcement) {

            return null;
        }

        return $this->mapToAnnouncement($announcement);
    }


    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    ) {

        $offset =
            ($page - 1) * $limit;

        $search =
            $filters['search'] ?? '';

        $priority =
            $filters['priority'] ?? '';

        $status =
            $filters['status'] ?? '';

        $stmt = $this->db->prepare(

            "CALL sp_announcement_find_all(?,?,?,?,?)"

        );

        $stmt->execute([

            $search,

            $priority,

            $status,

            $limit,

            $offset

        ]);

        $announcements = [];

        while (
            $row =
            $stmt->fetch(\PDO::FETCH_ASSOC)
        ) {

            $announcements[] =
                $this->mapToAnnouncement($row);
        }

        while (
            $stmt->nextRowset()
        ) {
        }

        $stmt->closeCursor();

        return $announcements;
    }


    public function count(
        array $filters = []
    ): int {

        $stmt =
            $this->db->prepare(

                "CALL sp_announcement_count(?,?,?)"

            );

        $stmt->execute([

            $filters['search'] ?? '',

            $filters['priority'] ?? '',

            $filters['status'] ?? ''

        ]);

        $result =
            $stmt->fetch();

        $stmt->closeCursor();

        return (int)(
            $result['total'] ?? 0
        );
    }

    public function findForUser(

        int $userId,

        array $filters = []

    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_announcement_find_for_user(?,?,?,?)"

        );



        $stmt->execute([


            $userId,


            $filters['search'] ?? '',


            $filters['priority'] ?? '',


            $filters['time'] ?? ''


        ]);



        $announcements = [];



        while (
            $row = $stmt->fetch(\PDO::FETCH_ASSOC)
        ) {

            $announcements[] =
                $this->mapToAnnouncement($row);
        }



        $stmt->closeCursor();



        return $announcements;
    }


    public function findByClub(
        int $clubId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_find_by_club(?)"
            );

        $stmt->execute([

            $clubId

        ]);

        return $stmt->fetchAll();
    }


    public function findPublished()
    {

        $stmt = $this->db
            ->prepare(
                "CALL sp_announcement_find_published()"
            );

        $stmt->execute();

        $announcements = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $announcements[] =
                $this->mapToAnnouncement($row);
        }

        $stmt->closeCursor();

        return $announcements;
    }


    public function findClubMembers(
        int $clubId
    ): array {

        $stmt = $this->db->prepare(
            "
        SELECT user_id
        FROM club_memberships
        WHERE club_id = ?
        AND status = 'approved'
        "
        );

        $stmt->execute([
            $clubId
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    private function mapToAnnouncement(
        array $row
    ): Announcement {

        return new Announcement(

            $row['id'],

            $row['club_id'],

            $row['title'],

            $row['content'],

            $row['priority'],

            $row['image'],

            $row['status'],

            $row['visibility'] ?? 'all',

            $row['created_by_name'] ?? null,

            $row['created_by'],

            $row['created_at'],

            $row['published_at'] ?? null,

            $row['updated_at'] ?? null

        );
    }
}
