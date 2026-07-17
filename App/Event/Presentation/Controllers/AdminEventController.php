<?php

namespace App\Event\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;

use App\Event\Application\Services\EventService;
use App\Master\Application\Services\MasterService;
use App\Shared\Application\Services\ImageUploadService;
use App\Club\Application\Services\ClubService;

use App\Shared\Helpers\Flash;



class AdminEventController extends BaseController
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
     * Admin Event List
     */
    public function index()
    {

        $page = max(
            1,
            (int) ($_GET['page'] ?? 1)
        );


        $limit = 10;


        $filters = [

            'search' =>
            trim($_GET['search'] ?? ''),


            'category_id' =>
            $_GET['category_id'] ?? null,


            'status' =>
            $_GET['status'] ?? ''

        ];



        $result =
            $this->eventService
            ->getEvents(
                $page,
                $limit,
                $filters
            );

$statistics = $this->eventService->getStatistics();



        $categories =
            $this->masterService
            ->getEventCategories();



        $this->view(

            'Event/Presentation/Views/admin/index',

            [

                'title' =>
                'Manage Events',


                'events' =>
                $result['events'],


                'categories' =>
                $categories,

                'statistics' => $statistics,


                'filters' =>
                $filters,


                'pagination' =>
                $result['pagination']

            ],

            'admin'

        );
    }

    /**
     * Create Event Page
     */
    public function create()
    {

        $clubs = $this->clubService->getActiveClubs();


        $categories = $this->masterService->getEventCategories();



        $this->view(

            'Event/Presentation/Views/admin/create',

            [

                'title' =>
                'Create Event',


                'clubs' =>
                $clubs,


                'categories' =>
                $categories

            ],

            'admin'

        );
    }


    public function store()
    {


        try {

            $files = $_FILES;

            $data = [

                'club_id' =>
                (int) ($_POST['club_id'] ?? 0),

                'category_id' =>
                (int) ($_POST['category_id'] ?? 0),

                'title' =>
                trim($_POST['title'] ?? ''),

                'description' =>
                trim($_POST['description'] ?? ''),

                'venue' =>
                trim($_POST['venue'] ?? ''),

                'event_date' =>
                $_POST['event_date'] ?? null,

                'start_time' =>
                $_POST['start_time'] ?? null,

                'end_time' =>
                $_POST['end_time'] ?? null,

                'capacity' =>
                (int) ($_POST['capacity'] ?? 0),

                'registration_deadline' =>
                !empty($_POST['registration_deadline'])
                    ? date(
                        'Y-m-d H:i:s',
                        strtotime(
                            $_POST['registration_deadline']
                        )
                    )
                    : null,

                'status' =>
                $_POST['status'] ?? 'draft',

                'created_by' =>
                (int) $_SESSION['user']['id']

            ];






            $this->eventService
                ->create(
                    $data,
                    $files
                );


            Flash::set(
                'success',
                'Event created successfully.'
            );


            return Response::redirect(
                '/admin/events'
            );
        } catch (\Throwable $e) {

            Flash::set(
                'error',
                $e->getMessage()
            );


            return Response::redirect(
                '/admin/events/create'
            );
        }
    }




    /**
     * Store Event
     */
//     public function store()
//     {
// var_dump($_FILES);
// exit;
//         $files = $_FILES;

//         $data = [


//             'club_id'
//             =>
//             $_POST['club_id'],


//             'category_id'
//             =>
//             $_POST['category_id'],


//             'title'
//             =>
//             $_POST['title'],


//             'description'
//             =>
//             $_POST['description'],


//             'venue'
//             =>
//             $_POST['venue'],


//             'event_date'
//             =>
//             $_POST['event_date'],


//             'start_time'
//             =>
//             $_POST['start_time'],


//             'end_time'
//             =>
//             $_POST['end_time'],


//             'capacity'
//             =>
//             $_POST['capacity'],


//             'registration_deadline'
//             =>
//             $_POST['registration_deadline'],


//             'created_by'
//             =>
//             $_SESSION['user']['id']

//         ];



//         try {


//             $this->eventService
//                 ->create(
//                     $data,
//                     $files
//                 );



//             Flash::set(

//                 'success',

//                 'Event created successfully'

//             );



//             return Response::redirect(

//                 '/admin/events'

//             );
//         } catch (\Exception $e) {


//             Flash::set(

//                 'error',

//                 $e->getMessage()

//             );



//             return Response::redirect(

//                 '/admin/events'

//             );
//         }
//     }





    /**
     * Event Details
     */
    public function show(
        int $id
    ) {


        $clubs = $this->clubService->getActiveClubs();


        $categories = $this->masterService->getEventCategories();

        $event =
            $this->eventService
            ->getEvent(
                $id
            );



        $this->view(

            'Event/Presentation/Views/admin/show',

            [

                'title' => 'Event Details',

                'event' => $event,
                
                'clubs' => $clubs,


                'categories' => $categories

            ],

            'admin'

        );
    }





    /**
     * Edit Event Page
     */
    public function edit(
        int $id
    ) {


        $event =
            $this->eventService
            ->getEvent(
                $id
            );

        $clubs = $this->clubService->getActiveClubs();


        $categories = $this->masterService->getEventCategories();


        // var_dump($categories);
        // exit;


        $this->view(

            'Event/Presentation/Views/admin/edit',

            [

                'title' => 'Edit Event',

                'event' => $event,

                'clubs' => $clubs,

                'categories' => $categories

            ],

            'admin'

        );
    }





    /**
     * Update Event
     */
    public function update(
        int $id
    ) {

        $files = $_FILES;
        $data = [


            'club_id'
            =>
            $_POST['club_id'],


            'category_id'
            =>
            $_POST['category_id'],


            'title'
            =>
            $_POST['title'],


            'description'
            =>
            $_POST['description'],


            'venue'
            =>
            $_POST['venue'],


            'event_date'
            =>
            $_POST['event_date'],


            'start_time'
            =>
            $_POST['start_time'],


            'end_time'
            =>
            $_POST['end_time'],


            'capacity'
            =>
            $_POST['capacity'],


            'registration_deadline'
            =>
            $_POST['registration_deadline'],

            'status' => $_POST['status'] ?? 'draft',

        ];



        try {


            $this->eventService
                ->update(

                    $id,

                    $data,

                    $files

                );



            Flash::set(

                'success',

                'Event updated successfully'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            '/admin/events'

        );
    }





    /**
     * Delete Event
     */
    public function delete(
        int $id
    ) {


        try {


            $this->eventService
                ->delete(
                    $id
                );



            Flash::set(

                'success',

                'Event deleted successfully'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            '/admin/events'

        );
    }





    /**
     * Event Registrations
     */
    public function registrations(
        int $id
    ) {


        $registrations =
            $this->eventService
            ->getRegistrations(
                $id
            );



        $this->view(

            'Event/Presentation/Views/admin/registrations',

            [

                'title' => 'Event Registrations',

                'registrations' => $registrations

            ],

            'admin'

        );
    }





    /**
     * Approve Registration
     */
    public function approveRegistration(
        int $id
    ) {


        $adminId =
            $_SESSION['user']['id'];



        try {


            $this->eventService
                ->approveRegistration(

                    $id,

                    $adminId

                );



            Flash::set(

                'success',

                'Registration approved'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            $_SERVER['HTTP_REFERER']

        );
    }





    /**
     * Reject Registration
     */
    public function rejectRegistration(
        int $id
    ) {


        $adminId =
            $_SESSION['user']['id'];



        try {


            $this->eventService
                ->rejectRegistration(

                    $id,

                    $adminId

                );



            Flash::set(

                'success',

                'Registration rejected'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            $_SERVER['HTTP_REFERER']

        );
    }
}