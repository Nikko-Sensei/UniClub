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


    public function findAll(): array
    {

        $statement =
            $this->db->prepare(
                "CALL sp_contact_find_all()"
            );


        $statement->execute();


        $contacts = [];


        while ($row = $statement->fetch()) {

            $contacts[] =
                $this->mapToEntity($row);

        }


        $statement->closeCursor();


        return $contacts;
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

}