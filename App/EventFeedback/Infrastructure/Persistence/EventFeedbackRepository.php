<?php

namespace App\EventFeedback\Infrastructure\Persistence;


use App\EventFeedback\Domain\Repository\EventFeedbackRepositoryInterface;
use App\EventFeedback\Domain\Entities\EventFeedback;

use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;



class EventFeedbackRepository extends BaseRepository implements EventFeedbackRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(
            Database::getConnection()
        );

    }



    public function create(
        array $data
    )
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_create(?,?,?,?)"

        );


        $stmt->execute([

            $data['event_id'],

            $data['user_id'],

            $data['rating'],

            $data['comment']

        ]);



        $result =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $result;

    }





    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    )
    {


        $offset =
            ($page - 1) * $limit;



        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_find_all(?,?,?,?,?)"

        );



        $stmt->execute([

            $offset,

            $limit,

            $filters['search'] ?? null,

            $filters['rating'] ?? null,

            $filters['event_id'] ?? null

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $feedbacks = [];



        foreach ($rows as $row) {


            $feedbacks[] =
                $this->mapToFeedback($row);

        }



        return $feedbacks;

    }






    public function count(
        array $filters = []
    )
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_count(?,?,?)"

        );



        $stmt->execute([


            $filters['search'] ?? null,


            $filters['rating'] ?? null,


            $filters['event_id'] ?? null


        ]);



        $result =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return (int)$result['total'];

    }






    public function exists(
        int $eventId,
        int $userId
    )
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_exists(?,?)"

        );



        $stmt->execute([

            $eventId,

            $userId

        ]);



        $result =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $result['total'] > 0;

    }






    public function findByEvent(
        int $eventId
    )
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_find_by_event(?)"

        );



        $stmt->execute([

            $eventId

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $feedbacks = [];



        foreach ($rows as $row) {


            $feedbacks[] =
                $this->mapToFeedback($row);

        }



        return $feedbacks;

    }







    public function delete(
        int $id
    )
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_feedback_delete(?)"

        );



        return $stmt->execute([

            $id

        ]);

    }






    private function mapToFeedback(
    array $row
): EventFeedback
{

    return new EventFeedback(

        $row['id'],

        $row['event_id'],

        $row['user_id'],

        $row['rating'],

        $row['comment'],

        $row['created_at'],

       $row['user_name'] ?? null,

        $row['event_title'] ?? null
        

    );

}


}