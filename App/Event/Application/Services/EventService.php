<?php

namespace App\Event\Application\Services;


use App\Event\Domain\Repository\EventRepositoryInterface;

use App\Event\Domain\Exceptions\EventNotFoundException;

use App\Event\Domain\Exceptions\EventRegistrationException;

use App\Shared\Application\Services\ImageUploadService;

use App\Notification\Application\Services\NotificationService;

use App\Shared\Logging\AuditLogger;

use App\Shared\Logging\AuditAction;



class EventService
{

    private EventRepositoryInterface $eventRepository;

    private ImageUploadService $imageUploadService;

    private NotificationService $notificationService;

    private AuditLogger $auditLogger;

    public function __construct(

        EventRepositoryInterface $eventRepository,

        ImageUploadService $imageUploadService,

        NotificationService $notificationService,

        AuditLogger $auditLogger

    ) {

        $this->eventRepository = $eventRepository;

        $this->imageUploadService = $imageUploadService;

        $this->notificationService = $notificationService;

        $this->auditLogger = $auditLogger;
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



        if ($event) {

            $this->auditLogger->log(

                AuditAction::CREATE_EVENT,

                $data['created_by'] ?? null,

                'Event',

                $event['id'],

                [
                    'title' => $data['title']
                ]

            );
        }



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

        if ($result) {

            $this->auditLogger->log(

                AuditAction::UPDATE_EVENT,

                $_SESSION['user']['id'],

                'Event',

                $id,

                [
                    'title' => $data['title']
                ]

            );
        }

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


        $result =
            $this->eventRepository
            ->delete($id);


        if ($result) {

            $this->auditLogger->log(

                AuditAction::DELETE_EVENT,

                $_SESSION['user']['id'],

                'Event',

                $id,

                [
                    'title' => $event->getTitle()
                ]

            );
        }


        return $result;
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


        $result =
            $this->eventRepository
            ->createRegistration(
                $eventId,
                $userId,
                $note
            );


        if ($result) {

            $this->auditLogger->log(

                AuditAction::REGISTER_EVENT,

                $userId,

                'Event',

                $eventId,

                [
                    'message' => 'Student registered for event'
                ]

            );
        }


        return $result;
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



        $result =
            $this->eventRepository
            ->cancelRegistration(
                $eventId,
                $userId
            );


        if ($result) {

            $this->auditLogger->log(

                AuditAction::CANCEL_EVENT_REGISTRATION,

                $userId,

                'Event',

                $eventId,

                [
                    'message' =>
                    'Cancelled event registration'
                ]

            );
        }


        return $result;
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
