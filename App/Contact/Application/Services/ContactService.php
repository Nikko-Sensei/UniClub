<?php

namespace App\Contact\Application\Services;


use App\Contact\Domain\Entities\ContactMessage;
use App\Contact\Domain\Repository\ContactRepositoryInterface;


class ContactService
{

    private ContactRepositoryInterface $contactRepository;


    public function __construct(
        ContactRepositoryInterface $contactRepository
    ) {
        $this->contactRepository = $contactRepository;
    }



    public function sendMessage(
        ?int $userId,
        string $name,
        string $email,
        string $subject,
        string $message
    ): bool {


        $contactMessage =
            new ContactMessage(

                null,

                $userId,

                $name,

                $email,

                $subject,

                $message

            );


        return $this->contactRepository
            ->create($contactMessage);
    }



    public function getMessages(): array
    {

        return $this->contactRepository
            ->findAll();
    }



    public function updateStatus(
        int $id,
        string $status
    ): bool {


        return $this->contactRepository
            ->updateStatus(
                $id,
                $status
            );
    }

    public function getMessage(
        int $id
    ): ?ContactMessage {

        return $this->contactRepository
            ->findById($id);
    }

    public function delete(
        int $id
    ): void {

   

        $this->contactRepository->delete(
            $id
        );
    }
}