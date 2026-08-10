<?php

namespace App\EventCertificate\Application\Services;


use App\EventCertificate\Domain\Repository\EventCertificateRepositoryInterface;

use App\Event\Application\Services\EventService;

use App\EventAttendance\Application\Services\EventAttendanceService;

use App\User\Application\Services\UserService;

use Dompdf\Dompdf;
use Dompdf\Options;



class EventCertificateService
{


    private EventCertificateRepositoryInterface $certificateRepository;


    private EventService $eventService;
    private string $certificatePath;
    private EventAttendanceService $attendanceService;
    private UserService $userService;



    public function __construct(

        EventCertificateRepositoryInterface $certificateRepository,

        EventService $eventService,

        EventAttendanceService $attendanceService,

        UserService $userService

    ) {


        $this->certificateRepository = $certificateRepository;

        $this->eventService = $eventService;

        $this->userService = $userService;

        $this->attendanceService = $attendanceService;

        $this->certificatePath =
            BASE_PATH . '/Storage/certificates/';
    }

    /**
     * Generate Certificate
     */
    public function issue(

        array $data

    ) {


        /*
            Check Event
        */

        $event =
            $this->eventService
            ->getEvent(

                $data['event_id']

            );



        if (!$event) {

            throw new \Exception(

                "Event not found."

            );
        }







        /*
            Check Event Completed
        */

        if (
            $event->getStatus()
            !==
            'completed'
        ) {

            throw new \Exception(

                "Certificate can only be issued after event completion."

            );
        }








        /*
            Check Attendance
        */

        if (
            !$this->attendanceService
                ->hasAttended(

                    $data['event_id'],

                    $data['user_id']

                )
        ) {

            throw new \Exception(

                "Student did not attend this event."

            );
        }









        /*
            Prevent Duplicate Certificate
        */

        if (
            $this->certificateRepository
            ->exists(

                $data['event_id'],

                $data['user_id']

            )
        ) {

            throw new \Exception(

                "Certificate already issued."

            );
        }









        /*
            Generate Certificate Number
        */

        $data['certificate_number'] =

            $this->generateCertificateNumber();


        $data['file_path'] =

            $this->generateCertificateFile(
                $data
            );




        return $this->certificateRepository
            ->create(

                $data

            );
    }









    /**
     * Get Student Certificates
     */
    public function getUserCertificates(

        int $userId

    ): array {


        return $this->certificateRepository
            ->findByUser(

                $userId

            );
    }









    /**
     * Get Event Certificates
     */
    public function getEventCertificates(

        int $eventId

    ): array {


        return $this->certificateRepository
            ->findByEvent(

                $eventId

            );
    }









    /**
     * Download Certificate
     */
    public function getCertificate(

        int $eventId,

        int $userId

    ) {


        return $this->certificateRepository
            ->findByEventAndUser(

                $eventId,

                $userId

            );
    }









    /**
     * Generate Unique Number
     */
    private function generateCertificateNumber(): string
    {


        return 'CERT-'
            .
            date('Y')
            .
            '-'
            .
            strtoupper(
                uniqid()
            );
    }


    /**
     * Generate Certificate PDF
     */
    private function generateCertificateFile(

        array $data

    ): string {

        if (!is_dir($this->certificatePath)) {

            mkdir(

                $this->certificatePath,

                0777,

                true

            );
        }



        /*
        File Name
    */

        $fileName =

            $data['certificate_number']
            .
            '.pdf';



        $fullPath =

            $this->certificatePath
            .
            $fileName;



        /*
        Get Event Information
    */

        $event =
            $this->eventService
            ->getEvent(

                $data['event_id']

            );



        /*
        Temporary values

        Later replace with UserService
    */

        $user =
            $this->userService
            ->findById(
                $data['user_id']
            );

        if (!$user) {
            throw new \Exception(
                "Student not found."
            );
        }

        $studentName =
            $user->getName();



        $eventTitle =
            $event->getTitle();



        $eventDate =
            $event->getEventDate();



        $certificateNumber =
            $data['certificate_number'];



        /*
        Load HTML Template
    */

        ob_start();

        require BASE_PATH .
            '/App/EventCertificate/Presentation/Views/pdf/certificate.php';

        $html =
            ob_get_clean();



        /*
        Dompdf
    */

        $options =
            new Options();

        $options->set(

            'isRemoteEnabled',

            true

        );



        $dompdf =
            new Dompdf(

                $options

            );



        $dompdf->loadHtml(

            $html

        );



        $dompdf->setPaper(

            'A4',

            'landscape'

        );



        $dompdf->render();



        /*
        Save PDF
    */

        file_put_contents(

            $fullPath,

            $dompdf->output()

        );



        /*
        Save relative path
    */

        return

            'Storage/certificates/'
            .
            $fileName;
    }

    /**
     * Generate All Certificates
     */
    public function issueForAllParticipants(

        int $eventId

    ): int {

        $participants =
            $this->attendanceService
            ->getEventAttendance(

                $eventId

            );

        $count = 0;

        foreach ($participants as $attendance) {

            if (!$attendance->isPresent()) {
                continue;
            }

            try {

                $this->issue([

                    'event_id' => $eventId,

                    'user_id'  => $attendance->getUserId()

                ]);

                $count++;
            } catch (\Exception $e) {

                /*
                Skip duplicates or invalid records
            */

                continue;
            }
        }

        return $count;
    }
}
