<?php

namespace App\Contact\Infrastructure\Persistence;


use App\Contact\Domain\Entities\ContactMessage;
use App\Contact\Domain\Repository\ContactRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;


class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    public function create(
        ContactMessage $contactMessage
    ): bool {

        $statement =
            $this->db->prepare(
                "CALL sp_contact_create(?,?,?,?,?)"
            );


        $statement->execute([
            $contactMessage->getUserId(),
            $contactMessage->getName(),
            $contactMessage->getEmail(),
            $contactMessage->getSubject(),
            $contactMessage->getMessage()
        ]);


        $statement->closeCursor();


        return true;
    }


    public function findAll(
        int $page,
        int $limit,
        array $filters = []
    ): array {

        $offset =
            ($page - 1) * $limit;


        $statement =
            $this->db->prepare(

                "CALL sp_contact_find_all(?,?,?,?)"

            );


        $statement->execute([

            $offset,

            $limit,

            $filters['search'] ?? null,

            $filters['status'] ?? null

        ]);


        $contacts = [];


        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

            $contacts[] =
                $this->mapToEntity($row);
        }


        $statement->closeCursor();


        return $contacts;
    }


    public function count(
        array $filters = []
    ): int {

        $statement =
            $this->db->prepare(

                "CALL sp_contact_count(?,?)"

            );


        $statement->execute([

            $filters['search'] ?? null,

            $filters['status'] ?? null

        ]);


        $result =
            $statement->fetch(\PDO::FETCH_ASSOC);


        $statement->closeCursor();


        return (int) $result['total'];
    }

    public function updateStatus(
        int $id,
        string $status
    ): bool {


        $statement =
            $this->db->prepare(
                "CALL sp_contact_update_status(?,?)"
            );


        $statement->execute([
            $id,
            $status
        ]);


        $statement->closeCursor();


        return true;
    }



    private function mapToEntity(
        array $row
    ): ContactMessage {


        return new ContactMessage(

            (int)$row['id'],

            isset($row['user_id'])
                ? (int)$row['user_id']
                : null,

            $row['name'],

            $row['email'],

            $row['subject'],

            $row['message'],

            $row['status'],

            $row['created_at'] ?? null,

            $row['updated_at'] ?? null

        );
    }

    public function findById(
        int $id
    ): ?ContactMessage {


        $statement =
            $this->db->prepare(
                "CALL sp_contact_find_by_id(?)"
            );


        $statement->execute([
            $id
        ]);



        $row =
            $statement->fetch();



        $statement->closeCursor();



        if (!$row) {

            return null;
        }



        return $this->mapToEntity(
            $row
        );
    }

    public function delete(
        int $id
    ): bool {


        $sql = "
        UPDATE contact_messages
        SET deleted_at = NOW()
        WHERE id = ?
    ";


        $stmt =
            $this->db->prepare($sql);


        return $stmt->execute([
            $id
        ]);
    }
}