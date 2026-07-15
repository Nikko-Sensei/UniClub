<?php

namespace App\Event\Infrastructure\Persistence;


use App\Event\Domain\Repository\EventRepositoryInterface;

use App\Event\Domain\Entities\Event;

use App\Shared\Database\Database;

use App\Shared\Infrastructure\Persistence\BaseRepository;


class EventRepository extends BaseRepository implements EventRepositoryInterface
{


    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function create(array $data)
    {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_create(?,?,?,?,?,?,?,?,?,?,?,?)"
            );


        $stmt->execute([

            $data['club_id'],

            $data['category_id'],

            $data['title'],

            $data['description'],

            $data['venue'],

            $data['event_date'],

            $data['start_time'],

            $data['end_time'],

            $data['capacity'],

            $data['registration_deadline'],

            $data['banner'] ?? null,

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
                "CALL sp_event_update(?,?,?,?,?,?,?,?,?,?,?,?)"
            );


        return $stmt->execute([

            $id,

            $data['club_id'],

            $data['category_id'],

            $data['title'],

            $data['description'],

            $data['venue'],

            $data['event_date'],

            $data['start_time'],

            $data['end_time'],

            $data['capacity'],

            $data['registration_deadline'],
            
            $data['banner'] ?? null,

        ]);
    }



    public function delete(
        int $id
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_delete(?)"
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
                "CALL sp_event_find_by_id(?)"
            );


        $stmt->execute([

            $id

        ]);


        $event = $stmt->fetch();


        if (!$event) {

            return null;
        }


        return $this->mapToEvent($event);
    }



    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    ) {

        $offset = ($page - 1) * $limit;


        $search = $filters['search'] ?? '';

        $categoryId = !empty($filters['category_id'])
            ? (int)$filters['category_id']
            : null;


        $status = $filters['status'] ?? '';



        $stmt = $this->db->prepare(
            "CALL sp_event_find_all(?,?,?,?,?)"
        );


        $stmt->execute([

            $search,

            $categoryId,

            $status,

            $limit,

            $offset

        ]);



        $events = [];



        // Fetch first result set
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $events[] = $this->mapToEvent($row);
        }



        // Important for stored procedure
        while ($stmt->nextRowset()) {
            // clear remaining result sets
        }


        $stmt->closeCursor();



        return $events;
    }

    public function count(
        array $filters = []
    ): int {

        $statement =
            $this->db->prepare(
                'CALL sp_event_count(
                :search,
                :category_id,
                :status
            )'
            );

        $statement->execute([
            'search' =>
            $filters['search'] ?? '',

            'category_id' =>
            !empty($filters['category_id'])
                ? (int) $filters['category_id']
                : null,

            'status' =>
            $filters['status'] ?? ''
        ]);

        $result =
            $statement->fetch();

        $statement->closeCursor();

        return (int) (
            $result['total'] ?? 0
        );
    }



    public function statistics()
    {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_statistics()"
            );


        $stmt->execute();


        return $stmt->fetch();
    }



    public function findStudentEvents(
        int $userId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_student_event_find_all(?)"
            );


        $stmt->execute([

            $userId

        ]);


        return $stmt->fetchAll();
    }



    public function registrationExists(
        int $eventId,
        int $userId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_exists(?,?)"
            );


        $stmt->execute([

            $eventId,

            $userId

        ]);


        return $stmt->fetch();
    }



    public function createRegistration(
        int $eventId,
        int $userId,
        ?string $note
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_create(?,?,?)"
            );


        return $stmt->execute([

            $eventId,

            $userId,

            $note

        ]);
    }



    public function cancelRegistration(
        int $eventId,
        int $userId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_cancel(?,?)"
            );


        return $stmt->execute([

            $eventId,

            $userId

        ]);
    }



    public function getRegistrationStatus(
        int $eventId,
        int $userId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_exists(?,?)"
            );


        $stmt->execute([

            $eventId,

            $userId

        ]);


        $row = $stmt->fetch();


        return $row['status'] ?? null;
    }



    public function getRegistrations(
        int $eventId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_list(?)"
            );


        $stmt->execute([

            $eventId

        ]);


        return $stmt->fetchAll();
    }



    public function approveRegistration(
        int $registrationId,
        int $adminId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_approve(?,?)"
            );


        return $stmt->execute([

            $registrationId,

            $adminId

        ]);
    }



    public function rejectRegistration(
        int $registrationId,
        int $adminId
    ) {

        $stmt = $this->db
            ->prepare(
                "CALL sp_event_registration_reject(?,?)"
            );


        return $stmt->execute([

            $registrationId,

            $adminId

        ]);
    }



    private function mapToEvent(
        array $row
    ): Event {


        return new Event(

            $row['id'],

            $row['club_id'],

            $row['category_id'],

            $row['title'],

            $row['description'],

            $row['venue'],

            $row['event_date'],

            $row['start_time'],

            $row['end_time'],

            $row['capacity'],

            $row['registration_deadline'],

            $row['banner'],

            (bool)$row['certificate_enabled'],

            $row['status'],

            $row['created_by'],

            $row['created_at'],

            $row['updated_at']

        );
    }
}