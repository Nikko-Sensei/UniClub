<?php

namespace App\EventAttendance\Application\Services;


use App\EventAttendance\Domain\Repository\EventAttendanceRepositoryInterface;

use App\EventAttendance\Domain\Entities\EventAttendance;


use App\Event\Application\Services\EventService;

use App\Event\Domain\Exceptions\EventNotFoundException;



class EventAttendanceService
{
    private EventAttendanceRepositoryInterface $attendanceRepository;

    private EventService $eventService;

    public function __construct(

        EventAttendanceRepositoryInterface $attendanceRepository,

        EventService $eventService

    ) {


        $this->attendanceRepository = $attendanceRepository;

        $this->eventService =  $eventService;
    }



    /**
     * Create attendance record after registration approval
     */
    public function createAttendance(
        int $eventId,
        int $userId
    ): EventAttendance {


        $exists =
            $this->attendanceRepository
            ->exists(
                $eventId,
                $userId
            );


        if ($exists) {

            return $this->attendanceRepository
                ->findByEventIdAndUserId(
                    $eventId,
                    $userId
                );
        }



        return $this->attendanceRepository
            ->create([

                'event_id' =>
                $eventId,

                'user_id' =>
                $userId,

                'attendance_status' =>
                'absent'

            ]);
    }

    /**
     * Mark Student Attendance
     */
    public function markAttendance(
        array $data
    ): EventAttendance {


        $event =
            $this->eventService
            ->findById(
                $data['event_id']
            );



        if (!$event) {

            throw new EventNotFoundException();
        }

       






        /*
            Check Event Started
        */

        if (!$event->hasStarted()) {

            throw new \Exception(
                "Attendance cannot be marked before event starts."
            );
        }





        /*
            Check Approved Registration
        */

        $approved =
            $this->eventService
            ->isRegistrationApproved(

                $data['event_id'],

                $data['user_id']

            );



        if (!$approved) {

            throw new \Exception(
                "Student is not approved for this event."
            );
        }








        /*
            Check Existing Attendance
        */

        $exists =
            $this->attendanceRepository
            ->exists(

                $data['event_id'],

                $data['user_id']

            );
       


        if ($exists) {

            return $this->attendanceRepository
                ->update($data);
        }









        return $this->attendanceRepository
            ->create($data);
    }









    /**
     * Get Event Attendance List
     *
     * @return EventAttendance[]
     */
    public function getEventAttendance(
        int $eventId
    ): array {


        return $this->attendanceRepository
            ->findByEventId($eventId);
    }









    /**
     * Get User Attendance History
     *
     * @return EventAttendance[]
     */
    public function getUserAttendance(
        int $userId
    ): array {


        return $this->attendanceRepository
            ->findByUserId($userId);
    }









    /**
     * Check User Attended Event
     */
    public function hasAttended(

        int $eventId,

        int $userId

    ): bool {


        $attendance =
            $this->attendanceRepository
            ->findByEventIdAndUserId(

                $eventId,

                $userId

            );



        if (!$attendance) {
            return false;
        }



        return $attendance->isPresent();
    }

    public function getStatistics(
        int $eventId
    ): array {

        return $this->attendanceRepository
            ->statistics(
                $eventId
            );
    }

    /**
     * Get participants with attendance
     */
    public function getAttendanceSheet(
        int $eventId
    ): array {


        $participants =
            $this->eventService
            ->getApprovedParticipants(
                $eventId
            );



        $attendanceList = [];



        foreach ($participants as $participant) {


            $attendance =
                $this->attendanceRepository
                ->findByEventIdAndUserId(

                    $eventId,

                    $participant['user_id']

                );



            $attendanceList[] = [


                'user_id' =>
                $participant['user_id'],


                'name' =>
                $participant['name'],


                'student_id' =>
                $participant['student_id'],


                'attendance' =>
                $attendance


            ];
        }



        return $attendanceList;
    }
}