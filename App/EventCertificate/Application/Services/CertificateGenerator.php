<?php

namespace App\EventCertificate\Application\Services;


class CertificateGenerator
{


    public function generate(
        array $data
    ): string
    {


        $directory =
            BASE_PATH .
            '/storage/certificates/';



        if(!is_dir($directory))
        {

            mkdir(
                $directory,
                0777,
                true
            );

        }




        $fileName =
            'certificate_' .
            $data['user_id'] .
            '_' .
            $data['event_id'] .
            '.pdf';




        $filePath =
            $directory .
            $fileName;





        /**
         * Temporary PDF creation
         * Replace with DomPDF later
         */


        file_put_contents(

            $filePath,

            "Certificate\n\n".
            "Student ID : ".$data['user_id']."\n".
            "Event ID : ".$data['event_id']

        );





        return 
            'storage/certificates/'.$fileName;


    }



}