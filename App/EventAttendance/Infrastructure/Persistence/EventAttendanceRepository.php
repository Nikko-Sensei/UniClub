<?php

namespace App\EventAttendance\Infrastructure\Persistence;


use App\EventAttendance\Domain\Repository\EventAttendanceRepositoryInterface;

use App\EventAttendance\Domain\Entities\EventAttendance;


use App\Shared\Infrastructure\Persistence\BaseRepository;

use App\Shared\Database\Database;



class EventAttendanceRepository extends BaseRepository implements EventAttendanceRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(

            Database::getConnection()

        );
    }






    public function create(
        array $data
    ): EventAttendance {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_create(?,?,?,?)"

        );



        $stmt->execute([


            $data['event_id'],


            $data['user_id'],


            $data['attendance_status'],


            $data['checked_by'] ?? null


        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $this->mapToAttendance($row);
    }







    public function update(
        array $data
    ): EventAttendance {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_update(?,?,?,?)"

        );



        $stmt->execute([


            $data['event_id'],


            $data['user_id'],


            $data['attendance_status'],


            $data['checked_by'] ?? null


        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $this->mapToAttendance($row);
    }







    public function findByEventId(
        int $eventId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_find_by_event(?)"

        );



        $stmt->execute([

            $eventId

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $result = [];



        foreach ($rows as $row) {

            $result[] =
                $this->mapToAttendance($row);
        }



        return $result;
    }







    public function findByUserId(
        int $userId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_find_by_user(?)"

        );



        $stmt->execute([

            $userId

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $result = [];



        foreach ($rows as $row) {

            $result[] =
                $this->mapToAttendance($row);
        }



        return $result;
    }







    public function exists(

        int $eventId,

        int $userId

    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_exists(?,?)"

        );



        $stmt->execute([

            $eventId,

            $userId

        ]);



        $row = $stmt->fetch(\PDO::FETCH_ASSOC);


        $stmt->closeCursor();


        return $row['total'] > 0;
    }

    public function findByEventIdAndUserId(

        int $eventId,

        int $userId

    ): ?EventAttendance {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_find_by_event_user(?,?)"

        );

        $stmt->execute([

            $eventId,

            $userId

        ]);



        $row = $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        if (!$row) {
            return null;
        }



        return $this->mapToAttendance($row);
    }

    public function statistics(
        int $eventId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_event_attendance_statistics(?)"

        );


        $stmt->execute([

            $eventId

        ]);



        $result =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return [

            'total' =>
            (int)$result['total'],


            'present' =>
            (int)$result['present'],


            'absent' =>
            (int)$result['absent'],


            'percentage' =>
            (float)$result['percentage']

        ];
    }

    private function mapToAttendance(

        array $row

    ): EventAttendance {


        return new EventAttendance(


            $row['id'],


            $row['event_id'],


            $row['user_id'],


            $row['attendance_status'],


            $row['checked_by'] ?? null,


            $row['checked_at'] ?? null,


            $row['updated_at'] ?? null


        );
    }
}