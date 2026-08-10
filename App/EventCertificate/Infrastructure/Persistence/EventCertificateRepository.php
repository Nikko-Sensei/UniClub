<?php

namespace App\EventCertificate\Infrastructure\Persistence;


use App\EventCertificate\Domain\Repository\EventCertificateRepositoryInterface;

use App\EventCertificate\Domain\Entities\EventCertificate;


use App\Shared\Infrastructure\Persistence\BaseRepository;

use App\Shared\Database\Database;



class EventCertificateRepository extends BaseRepository implements EventCertificateRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(

            Database::getConnection()

        );
    }





    public function create(
        array $data
    ): EventCertificate {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_create(?,?,?,?,?)"

        );



        $stmt->execute([


            $data['event_id'],


            $data['user_id'],


            $data['certificate_number'],


            $data['file_path'] ?? null,
            

            $data['issued_by'] ?? null


        ]);



        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        $stmt->closeCursor();

        return $this->mapToCertificate($row);
    }

    public function update(
        array $data
    ): EventCertificate {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_update(?,?,?)"

        );



        $stmt->execute([


            $data['id'],


            $data['certificate_number'],


            $data['file_path'] ?? null


        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $this->mapToCertificate($row);
    }








    public function findById(
        int $id
    ): ?EventCertificate {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_find_by_id(?)"

        );



        $stmt->execute([

            $id

        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        if (!$row) {

            return null;
        }



        return $this->mapToCertificate($row);
    }










    public function findByEventAndUser(

        int $eventId,

        int $userId

    ): ?EventCertificate {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_find_by_event_user(?,?)"

        );



        $stmt->execute([


            $eventId,


            $userId


        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        if (!$row) {

            return null;
        }



        return $this->mapToCertificate($row);
    }









    public function findByEvent(
        int $eventId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_find_by_event(?)"

        );



        $stmt->execute([

            $eventId

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $certificates = [];



        foreach ($rows as $row) {

            $certificates[] =
                $this->mapToCertificate($row);
        }



        return $certificates;
    }









    public function findByUser(
        int $userId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_find_by_user(?)"

        );



        $stmt->execute([

            $userId

        ]);



        $rows =
            $stmt->fetchAll(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        $certificates = [];



        foreach ($rows as $row) {

            $certificates[] =
                $this->mapToCertificate($row);
        }



        return $certificates;
    }









    public function exists(

        int $eventId,

        int $userId

    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_exists(?,?)"

        );



        $stmt->execute([


            $eventId,


            $userId


        ]);



        $row =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $row['total'] > 0;
    }









    public function statistics(): array
    {


        $stmt = $this->db->prepare(

            "CALL sp_event_certificate_statistics()"

        );



        $stmt->execute();



        $result =
            $stmt->fetch(\PDO::FETCH_ASSOC);



        $stmt->closeCursor();



        return $result ?? [];
    }









    private function mapToCertificate(

        array $row

    ): EventCertificate {


        return new EventCertificate(


            $row['id'],


            $row['event_id'],


            $row['user_id'],


            $row['certificate_number'],


            $row['file_path'] ?? null,


            $row['issued_by'] ?? null,


            $row['issued_at'] ?? null,


            $row['created_at'] ?? null,


            $row['updated_at'] ?? null


        );
    }
}