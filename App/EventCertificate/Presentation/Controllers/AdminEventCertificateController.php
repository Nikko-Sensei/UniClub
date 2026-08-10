<?php

namespace App\EventCertificate\Presentation\Controllers;


use App\Shared\Core\BaseController;

use App\EventCertificate\Application\Services\EventCertificateService;

use App\Shared\Core\Response;

use App\Shared\Helpers\Flash;

use App\Event\Application\Services\EventService;


class AdminEventCertificateController extends BaseController
{


    private EventCertificateService $certificateService;

    private EventService $eventService;


    public function __construct(

        EventCertificateService $certificateService,
        EventService $eventService

    ) {


        parent::__construct();


        $this->certificateService = $certificateService;

        $this->eventService = $eventService;
    }


    /**
     * Event Certificate List
     */
    public function index(

        int $eventId

    ) {


        $event =
            $this->eventService
            ->findById(

                $eventId

            );

        $certificates =
            $this->certificateService
            ->getEventCertificates(

                $eventId

            );



        return $this->view(

            'EventCertificate/Presentation/Views/admin/index',

            [

                'title' => 'Manage Certificates',

                'event' => $event,

                'eventId' => $eventId,

                'certificates' => $certificates,

                'activeTab' => 'certificates'

            ],

            'admin'

        );
    }









    /**
     * Issue Certificate
     */
    public function store(

        int $eventId

    ) {


        $data = [


            'event_id' =>
            $eventId,


            'user_id' =>
            $_POST['user_id'],


            'file_path' =>
            $_POST['file_path'] ?? null,


            'issued_by' =>
            $_SESSION['user']['id']


        ];




        try {


            $this->certificateService
                ->issue(

                    $data

                );



            Flash::set(

                'success',

                'Certificate issued successfully.'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }





        return Response::redirect(

            '/admin/events/' . $eventId . '/certificates'

        );
    }

    public function generate(

        int $eventId,

        int $userId

    ) {


        $data = [


            'event_id' => $eventId,


            'user_id' => $userId


        ];





        try {


            $this->certificateService
                ->issue(

                    $data

                );




            Flash::set(

                'success',

                'Certificate generated successfully.'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }






        return Response::redirect(

            '/admin/events/' . $eventId . '/certificates'

        );
    }

    /**
     * Generate All Certificates
     */
    public function generateAll(

        int $eventId

    ) {


        try {


            $count =
                $this->certificateService
                ->issueForAllParticipants(

                    $eventId

                );




            Flash::set(

                'success',

                $count . ' certificates generated successfully.'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }




        return Response::redirect(

            '/admin/events/'
                .
                $eventId
                .
                '/certificates'

        );
    }
}
