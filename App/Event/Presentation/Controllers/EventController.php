<?php

namespace App\Event\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Event\Application\Services\EventService;
use App\Shared\Helpers\Flash;
use App\Master\Application\Services\MasterService;
use App\Club\Application\Services\ClubService;


class EventController extends BaseController
{


    private EventService $eventService;
    private MasterService $masterService;
    private ClubService $clubService;



    public function __construct(
        EventService $eventService,
        ClubService $clubService,
        MasterService $masterService
    ) {

        parent::__construct();


        $this->masterService = $masterService;

        $this->eventService = $eventService;

        $this->clubService = $clubService;
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


        $limit = 6;


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

        $clubs = $this->clubService->getActiveClubs();


        $categories = $this->masterService->getEventCategories();

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
                
                'clubs' => $clubs,

                'categories' => $categories,

                'registrationStatus' => $registrationStatus

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