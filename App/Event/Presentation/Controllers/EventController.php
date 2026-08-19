<?php

namespace App\Event\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Event\Application\Services\EventService;
use App\Shared\Helpers\Flash;
use App\Master\Application\Services\MasterService;
use App\Club\Application\Services\ClubService;
use App\User\Application\Services\UserService;
use App\EventAttendance\Application\Services\EventAttendanceService;
use App\EventCertificate\Application\Services\EventCertificateService;

class EventController extends BaseController
{


    private EventService $eventService;
    private MasterService $masterService;
    private ClubService $clubService;
    private UserService $userService;
    private EventAttendanceService $attendanceService;
    private EventCertificateService $eventCertificateService;


    public function __construct(
        EventService $eventService,
        ClubService $clubService,
        MasterService $masterService,
        UserService $userService,
        EventAttendanceService $attendanceService,
        EventCertificateService $eventCertificateService
    ) {

        parent::__construct();


        $this->masterService = $masterService;

        $this->eventService = $eventService;

        $this->clubService = $clubService;

        $this->userService = $userService;

        $this->attendanceService = $attendanceService;

        $this->eventCertificateService = $eventCertificateService;
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
            $_GET['status'] ?? '',

            'event_filter' =>
            $_GET['event_filter'] ?? ''

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

                'totalEvents' =>
                $result['totalEvents'],

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
    // public function show(
    //     int $id
    // ) {


    //     $event =
    //         $this->eventService
    //         ->getEvent(
    //             $id
    //         );

    //     $clubs = $this->clubService->getActiveClubs();


    //     $categories = $this->masterService->getEventCategories();

    //     $userId =
    //         $_SESSION['user']['id'];



    //     $registrationStatus =
    //         $this->eventService
    //         ->getRegistrationStatus(

    //             $id,

    //             $userId

    //         );



    //     $this->view(

    //         'Event/Presentation/Views/student/show',

    //         [

    //             'title' => $event->getTitle(),

    //             'event' => $event,

    //             'clubs' => $clubs,

    //             'categories' => $categories,

    //             'registrationStatus' => $registrationStatus

    //         ],

    //         'app'

    //     );
    // }

    public function show(
        int $id
    ) {


        $event =
            $this->eventService
            ->getEvent(
                $id
            );

        $capacity =
            $this->eventService
            ->getEventCapacity($id);


        $clubs =
            $this->clubService
            ->getActiveClubs();



        $categories =
            $this->masterService
            ->getEventCategories();



        $userId =
            $_SESSION['user']['id'];


        $profile = $this->userService->getProfileData($userId);

        /*
    |--------------------------------------------------------------------------
    | Registration
    |--------------------------------------------------------------------------
    */

        $registrationStatus =
            $this->eventService
            ->getRegistrationStatus(

                $id,

                $userId

            );

        $attendance = $this->attendanceService->getAttendanceByUserEvent($id, $userId);

        $certificate = $this->eventCertificateService->getCertificate($id, $userId);

        $feedbackSubmitted = false;

        //     /*
        // |--------------------------------------------------------------------------
        // | Feedback
        // |--------------------------------------------------------------------------
        // */

        //     $feedbackSubmitted =
        //         $this->eventFeedbackService
        //         ->hasSubmitted(

        //             $userId,

        //             $id

        //         );




        $this->view(

            'Event/Presentation/Views/student/show',

            [

                'title' => $event->getTitle(),


                'event' => $event,


                'clubs' => $clubs,


                'categories' => $categories,


                'registrationStatus' => $registrationStatus,


                'attendance' => $attendance,

                'certificate' => $certificate,

                'feedbackSubmitted' => $feedbackSubmitted,

                'student' => $profile['user'],

                'departmentName' => $profile['departmentName'],

                'academicYearName' => $profile['academicYearName'],

                'roleName' => $profile['roleName'],

                'capacity' => $capacity

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