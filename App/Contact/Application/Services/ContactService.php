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



    /**
     * Get Contact Messages
     * With Pagination + Search + Status Filter
     */
    public function getMessages(
        int $page,
        int $limit,
        array $filters = []
    ): array
    {

        $page =
            max(
                1,
                $page
            );


        $messages =
            $this->contactRepository
            ->findAll(

                $page,

                $limit,

                $filters

            );


        $total =
            $this->contactRepository
            ->count(

                $filters

            );


        return [

            'messages' =>
                $messages,


            'pagination' => [

                'current_page' =>
                    $page,


                'per_page' =>
                    $limit,


                'total' =>
                    $total,


                'total_pages' =>
                    (int) ceil(

                        $total / $limit

                    )

            ]

        ];

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
            ->findById(

                $id

            );

    }



    public function delete(
        int $id
    ): void {


        $this->contactRepository
            ->delete(

                $id

            );

    }

}