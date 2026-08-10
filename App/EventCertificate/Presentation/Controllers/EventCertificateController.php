<?php

namespace App\EventCertificate\Presentation\Controllers;


use App\Shared\Core\BaseController;

use App\EventCertificate\Application\Services\EventCertificateService;

use App\Shared\Core\Response;

use App\Shared\Helpers\Flash;



class EventCertificateController extends BaseController
{


    private EventCertificateService $certificateService;





    public function __construct(

        EventCertificateService $certificateService

    ) {

        parent::__construct();


        $this->certificateService =
            $certificateService;
    }










    /**
     * My Certificates
     */
    public function index()
    {


        $userId =
            $_SESSION['user']['id'];





        $certificates =
            $this->certificateService
            ->getUserCertificates(

                $userId

            );






        return $this->view(

            'EventCertificate/Presentation/Views/student/index',

            [

                'title' => 'My Certificates',

                'certificates' => $certificates

            ],

            'app'

        );
    }












    /**
     * Download Certificate
     */
    // public function download(

    //     int $eventId

    // ) {


    //     $userId =
    //         $_SESSION['user']['id'];






    //     try {


    //         $certificate =
    //             $this->certificateService
    //             ->getCertificate(

    //                 $eventId,

    //                 $userId

    //             );





    //         if (!$certificate) {

    //             throw new \Exception(

    //                 "Certificate not found."

    //             );
    //         }

    //         $file =
    //             BASE_PATH .
    //             '/' .
    //             ltrim(
    //                 $certificate->getFilePath(),
    //                 '/'
    //             );

    //         if (
    //             !file_exists($file)
    //         ) {
    //             throw new \Exception(
    //                 "Certificate file not available."
    //             );
    //         }

    //         return Response::download(
    //             $file
    //         );
    //     } catch (\Exception $e) {


    //         Flash::set(

    //             'error',

    //             $e->getMessage()

    //         );



    //         return Response::redirect(

    //             '/certificates'

    //         );
    //     }
    // }

    public function download(
        int $eventId
    ) {

        $userId =
            $_SESSION['user']['id'];

        try {

            $certificate =
                $this->certificateService
                ->getCertificate(
                    $eventId,
                    $userId
                );

            if (!$certificate) {

                throw new \Exception(
                    "Certificate not found."
                );
            }

            $filePath =
                $certificate->getFilePath();

            if (!$filePath) {

                throw new \Exception(
                    "Certificate file path is empty."
                );
            }

            return Response::download(
                $filePath
            );
        } catch (\Exception $e) {

            Flash::set(
                'error',
                $e->getMessage()
            );

            return Response::redirect(
                '/certificates'
            );
        }
    }
}
