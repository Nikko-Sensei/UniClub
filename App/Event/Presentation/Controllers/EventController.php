<?php

namespace App\Event\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Event\Application\Services\EventService;
use App\Shared\Helpers\Flash;


class EventController extends BaseController
{


    private EventService $eventService;



    public function __construct(
        EventService $eventService
    ) {

        parent::__construct();


        $this->eventService =
            $eventService;
    }



    /**
     * Student Event List
     */
    public function index()
    {
          

        $page = max(
            1,
            (int)($_GET['page'] ?? 1)
        );


        $limit = 9;


        $userId =
            $_SESSION['user']['id'];



        $filters = [

            'search' =>
            trim($_GET['search'] ?? ''),


            'status' =>
            $_GET['status'] ?? ''

        ];



        $result =
            $this->eventService
            ->getStudentEvents(

                $userId,

                $page,

                $limit,

                $filters

            );



        $this->view(

            'Event/Presentation/Views/student/index',

            [

                'title' => 'Events',

                'events' =>
                $result['events'],

                'pagination' =>
                $result['pagination'],

                'filters' =>
                $filters

            ],

            'app'

        );
    }




    /**
     * Student Event Details
     */
    public function show(
        int $id
    ) {


        $event =
            $this->eventService
            ->getEvent(
                $id
            );



        $userId =
            $_SESSION['user']['id'];



        $registrationStatus =
            $this->eventService
            ->getRegistrationStatus(

                $id,

                $userId

            );



        $this->view(

            'Event/Presentation/Views/student/show',

            [

                'title' => $event->getTitle(),

                'event' => $event,

                'registrationStatus'
                => $registrationStatus

            ],

            'app'

        );
    }




    /**
     * Student Register Event
     */
    public function register(int $id)
    {

        $userId =
            $_SESSION['user']['id'];


        $note =
            $_POST['note'] ?? null;



        try {


            $this->eventService
                ->registerEvent(
                    $id,
                    $userId,
                    $note
                );



            Flash::set(
                'success',
                'Event registration submitted'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }



        return Response::redirect(
            '/events/' . $id
        );
    }




    /**
     * Student Cancel Event Registration
     */
    public function cancelRegistration(
        int $id
    ) {


        $userId =
            $_SESSION['user']['id'];



        try {


            $this->eventService
                ->cancelRegistration(

                    $id,

                    $userId

                );



            Flash::set(

                'success',

                'Event registration cancelled'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            '/events/' . $id

        );
    }
}