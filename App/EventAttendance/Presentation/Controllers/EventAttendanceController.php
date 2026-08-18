<?php

namespace App\EventAttendance\Presentation\Controllers;


use App\Shared\Core\BaseController;


use App\EventAttendance\Application\Services\EventAttendanceService;



class EventAttendanceController extends BaseController
{


    private EventAttendanceService $attendanceService;





    public function __construct(

        EventAttendanceService $attendanceService

    )
    {

        parent::__construct();


        $this->attendanceService = $attendanceService;

    }

    /**
     * Student Attendance History
     */
    public function history()
    {


        $userId =
            $_SESSION['user']['id'];



        $attendances =
            $this->attendanceService
                 ->getUserAttendance(
                    $userId
                 );





        $this->view(

            'EventAttendance/Presentation/Views/student/history',

            [

                'title'=>'My Attendance History',

                'attendances'=>$attendances

            ],

            'app'

        );


    }

   




}