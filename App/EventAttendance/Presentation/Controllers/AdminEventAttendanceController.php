<?php

namespace App\EventAttendance\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;

use App\EventAttendance\Application\Services\EventAttendanceService;

use App\Shared\Helpers\Flash;

use App\Event\Application\Services\EventService;



class AdminEventAttendanceController extends BaseController
{


    private EventAttendanceService $attendanceService;


    private EventService $eventService;


    public function __construct(

        EventAttendanceService $attendanceService,

        EventService $eventService

    )
    {


        parent::__construct();

        $this->attendanceService = $attendanceService;

        $this->eventService = $eventService;

    }





    /**
     * Attendance List
     */
    public function index(

        int $eventId

    )
    {


        $event =
            $this->eventService
                 ->findById(

                    $eventId

                 );


        $attendances =
            $this->attendanceService
            ->getAttendanceSheet(
                $eventId
            );


        $statistics =
            $this->attendanceService
            ->getStatistics(
                $eventId
            );


        $this->view(

            'EventAttendance/Presentation/Views/admin/index',

            [

                'title' => 'Manage Attendance',
                
                'event'=>$event,

                'eventId' => $eventId,

                'statistics' => $statistics,

                'attendances' => $attendances,

                'activeTab' => 'attendance'

            ],

            'admin'

        );
    }









    /**
     * Mark Attendance
     */
    public function store(
        int $eventId
    ) {


        $data = [


            'event_id' =>
            $eventId,


            'user_id' =>
            $_POST['user_id'],


            'attendance_status' =>
            $_POST['attendance_status'],


            'checked_by' =>
            $_SESSION['user']['id']



        ];






        try {


            $this->attendanceService
                ->markAttendance(
                    $data
                );



            Flash::set(

                'success',

                'Attendance marked successfully.'

            );



            return Response::redirect(

                '/admin/events/' . $eventId . '/attendance'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );



            return Response::redirect(

                '/admin/events/' . $eventId . '/attendance'

            );
        }
    }

    /**
     * Update Attendance
     */
    public function update(
        int $eventId
    ) {


        $data = [


            'event_id' =>
            $eventId,


            'user_id' =>
            $_POST['user_id'],


            'attendance_status' =>
            $_POST['attendance_status'],


            'checked_by' =>
            $_SESSION['user']['id']



        ];

        try {


            $result = $this->attendanceService
                ->markAttendance(
                    $data
                );



            Flash::set(

                'success',

                'Attendance updated successfully.'

            );



            return Response::redirect(

                '/admin/events/' . $eventId . '/attendance'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );



            return Response::redirect(

                '/admin/events/' . $eventId . '/attendance'

            );
        }
    }
}