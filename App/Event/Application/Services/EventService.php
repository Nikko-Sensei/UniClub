<?php

namespace App\Event\Application\Services;


use App\Event\Domain\Repository\EventRepositoryInterface;

use App\Event\Domain\Exceptions\EventNotFoundException;

use App\Event\Domain\Exceptions\EventRegistrationException;

use App\Shared\Application\Services\ImageUploadService;

use App\Notification\Application\Services\NotificationService;



class EventService
{

    private EventRepositoryInterface $eventRepository;

    private ImageUploadService $imageUploadService;

    private NotificationService $notificationService;


    public function __construct(

        EventRepositoryInterface $eventRepository,

        ImageUploadService $imageUploadService,

        NotificationService $notificationService

    ) {

        $this->eventRepository = $eventRepository;

        $this->imageUploadService = $imageUploadService;

        $this->notificationService = $notificationService;
    }



    public function create(
        array $data,
        array $files
    ) {


        $this->handleImages(
            $files,
            $data
        );

        // return $this->eventRepository
        //     ->create($data);

        $event =
            $this->eventRepository
            ->create($data);



        if (
            $event &&
            $data['status'] === 'published'
        ) {

            $members =
                $this->eventRepository
                ->findClubMembers(
                    $data['club_id']
                );



            foreach ($members as $member) {

                $this->notificationService
                    ->notifyNewEvent(

                        $member['user_id'],

                        $event['id'],

                        $data['title']

                    );
            }
        }



        return $event;
    }



    // public function update(
    //     int $id,
    //     array $data,
    //     array $files
    // ) {

    //     $event =
    //         $this->eventRepository
    //         ->findById($id);


    //     if (!$event) {

    //         throw new EventNotFoundException();
    //     }

    //     $data['banner'] =
    //         $event->getBanner();

    //     $this->handleImages(
    //         $files,
    //         $data
    //     );



    //     return $this->eventRepository
    //         ->update(
    //             $id,
    //             $data
    //         );
    // }

    public function update(
        int $id,
        array $data,
        array $files
    ) {

        $event =
            $this->eventRepository
            ->findById($id);


        if (!$event) {

            throw new EventNotFoundException();
        }


        $oldStatus =
            $event->getStatus();



        $data['banner'] =
            $event->getBanner();



        $this->handleImages(
            $files,
            $data
        );



        $result =
            $this->eventRepository
            ->update(
                $id,
                $data
            );



        if (
            $result &&
            $oldStatus !== 'published'
            &&
            $data['status'] === 'published'
        ) {


            $members =
                $this->eventRepository
                ->findClubMembers(
                    $event->getClubId()
                );



            foreach ($members as $member) {

                $this->notificationService
                    ->notifyNewEvent(

                        $member['user_id'],

                        $id,

                        $data['title']

                    );
            }
        }


        return $result;
    }



    public function delete(
        int $id
    ) {

        $event = $this->eventRepository
            ->findById($id);


        if (!$event) {

            throw new EventNotFoundException();
        }


        return $this->eventRepository
            ->delete($id);
    }
    public function getEvent(
        int $id
    ) {

        $event = $this->eventRepository
            ->findById($id);


        if (!$event) {

            throw new EventNotFoundException();
        }


        return $event;
    }



    public function getEvents(
        int $page,
        int $limit,
        array $filters = []
    ): array {


        $page = max(1, $page);


        $events =
            $this->eventRepository
            ->findAll(
                $page,
                $limit,
                $filters
            );


        $total =
            $this->eventRepository
            ->count(
                $filters
            );


        return [

            'events' => $events,


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



    public function getStatistics()
    {

        return $this->eventRepository
            ->statistics();
    }



    /*
    |--------------------------------------------------------------------------
    | Student Registration
    |--------------------------------------------------------------------------
    */


    /**
     * Register Student Event
     */
    public function registerEvent(
        int $eventId,
        int $userId,
        ?string $note
    ) {


        $exists =
            $this->eventRepository
            ->registrationExists(
                $eventId,
                $userId
            );



        if ($exists) {

            throw new \Exception(
                'Already registered for this event'
            );
        }



        return $this->eventRepository
            ->createRegistration(
                $eventId,
                $userId,
                $note
            );
    }

    /**
     * Get Event Registrations
     */
    public function getRegistrations(
        int $eventId
    ) {


        return $this->eventRepository
            ->getRegistrations(
                $eventId
            );
    }


    public function cancelRegistration(
        int $eventId,
        int $userId
    ) {


        $registration =
            $this->eventRepository
            ->registrationExists(
                $eventId,
                $userId
            );


        if (!$registration) {

            throw new EventRegistrationException(
                "Registration not found."
            );
        }



        return $this->eventRepository
            ->cancelRegistration(
                $eventId,
                $userId
            );
    }



    public function getRegistrationStatus(
        int $eventId,
        int $userId
    ) {

        return $this->eventRepository
            ->getRegistrationStatus(
                $eventId,
                $userId
            );
    }



    /*
    |--------------------------------------------------------------------------
    | Admin Registration Management
    |--------------------------------------------------------------------------
    */


    public function registrations(
        int $eventId
    ) {

        return $this->eventRepository
            ->getRegistrations(
                $eventId
            );
    }



    public function approveRegistration(
        int $registrationId,
        int $adminId
    ) {

        return $this->eventRepository
            ->approveRegistration(
                $registrationId,
                $adminId
            );
    }



    public function rejectRegistration(
        int $registrationId,
        int $adminId
    ) {

        return $this->eventRepository
            ->rejectRegistration(
                $registrationId,
                $adminId
            );
    }



    public function getStudentEvents(
        int $userId,
        int $page,
        int $limit,
        array $filters = []
    ) {

        $events =
            $this->eventRepository
            ->findStudentEvents(
                $userId,
                $page,
                $limit,
                $filters
            );


        $total =
            $this->eventRepository
            ->countStudentEvents(

                $userId,

                $filters

            );


        return [

            'events' =>
            $events,


            'pagination' => [

                'total' =>
                $total,


                'current_page' =>
                $page,


                'total_pages' =>
                ceil(
                    $total / $limit
                )

            ]

        ];
    }

    

    private function handleImages(
        array $files,
        array &$data
    ): void {


        if (
            isset($files['banner']) &&
            $files['banner']['error']
            === UPLOAD_ERR_OK
        ) {


            $data['banner'] =
                $this->imageUploadService
                ->upload(
                    $files['banner'],
                    'events'
                );
        }
    }
}