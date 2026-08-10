<?php

namespace App\EventCertificate\Application\Services;


use Dompdf\Dompdf;



class CertificatePdfService
{


    private string $storagePath;





    public function __construct()
    {


        $this->storagePath =
            BASE_PATH .
            '/storage/certificates/';



        if(!is_dir($this->storagePath))
        {

            mkdir(

                $this->storagePath,

                0777,

                true

            );

        }


    }









    /**
     * Generate Certificate PDF
     */
    public function generate(

        string $studentName,

        string $eventName,

        string $certificateNumber

    ): string
    {


        $dompdf =
            new Dompdf();





        $html = "

        <html>

        <body style='text-align:center;font-family:Arial;'>


            <h1>
                Certificate of Participation
            </h1>


            <br>


            <p>
                This certificate is proudly presented to
            </p>


            <h2>
                {$studentName}
            </h2>


            <p>
                for successfully participating in
            </p>


            <h2>
                {$eventName}
            </h2>



            <br>


            <p>
                Certificate No:
                {$certificateNumber}
            </p>


            <p>
                Date:
                ".date('Y-m-d')."
            </p>


        </body>

        </html>

        ";






        $dompdf->loadHtml(

            $html

        );



        $dompdf->setPaper(

            'A4',

            'landscape'

        );



        $dompdf->render();







        $filename =

            $certificateNumber
            .
            '.pdf';





        $path =

            $this->storagePath
            .
            $filename;







        file_put_contents(

            $path,

            $dompdf->output()

        );






        return $path;


    }



}