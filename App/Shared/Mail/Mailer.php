<?php

namespace App\Shared\Mail;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer
{

    private PHPMailer $mail;


    public function __construct()
    {
        $this->mail = new PHPMailer(true);


        $this->mail->isSMTP();

        $this->mail->Host = 'smtp.gmail.com';

        $this->mail->SMTPAuth = true;


        $this->mail->Username =
            'thantzin11928@gmail.com';


        $this->mail->Password =
            'pmxqouxanjiglstn';


        $this->mail->SMTPSecure =
            PHPMailer::ENCRYPTION_STARTTLS;


        $this->mail->Port = 587;


        $this->mail->setFrom(
            'thantzin11928@gmail.com',
            'UniClub'
        );
    }


    public function send(
        string $to,
        string $subject,
        string $body
    ): bool {


        try {


            $this->mail->clearAddresses();


            $this->mail->addAddress(
                $to
            );


            $this->mail->isHTML(true);


            $this->mail->Subject =
                $subject;


            $this->mail->Body =
                $body;



            return $this->mail->send();



        } catch(Exception $e){

            error_log(
                $e->getMessage()
            );


            return false;
        }

    }

}