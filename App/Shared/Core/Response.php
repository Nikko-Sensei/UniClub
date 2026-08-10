<?php

namespace App\Shared\Core;


class Response
{


    public static function redirect(
        string $url
    ): void {


        header(
            'Location: ' .
                BASE_URL .
                $url
        );


        exit;
    }




    public static function json(
        array $data,
        int $status = 200
    ): void {


        http_response_code(
            $status
        );


        header(
            'Content-Type: application/json'
        );


        echo json_encode($data);


        exit;
    }





    public static function back(): void
    {


        header(
            'Location: ' .
                ($_SERVER['HTTP_REFERER'] ?? '/')
        );


        exit;
    }





    public static function abort(
        int $status,
        string $message = ''
    ): void {


        http_response_code(
            $status
        );


        $view = BASE_PATH .
            "/App/Shared/Presentation/Views/Errors/{$status}.php";



        if (file_exists($view)) {

            require $view;
        } else {

            echo "Error {$status}: {$message}";
        }


        exit;
    }

    public static function download(
        string $filePath
    ): void {


        $file =
            BASE_PATH . '/' . $filePath;



        if (!file_exists($file)) {

            throw new \Exception(
                "File not found."
            );
        }




        header(
            'Content-Type: application/pdf'
        );



        header(
            'Content-Disposition: attachment; filename="'
                . basename($file) .
                '"'
        );



        header(
            'Content-Length: ' .
                filesize($file)
        );



        readfile($file);



        exit;
    }
}
