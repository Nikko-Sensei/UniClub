<?php

namespace App\Contact\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Contact\Application\Services\ContactService;
use App\Shared\Helpers\Flash;


class ContactController extends BaseController
{


    private ContactService $contactService;



    public function __construct(
        ContactService $contactService
    ) {

        parent::__construct();


        $this->contactService =
            $contactService;
    }




    /**
     * Student Contact Page
     */
    public function index()
    {


        $this->view(

            'Contact/Presentation/Views/student/index',

            [

                'title' => 'Contact Us'

            ],

            'app'

        );
    }




    /**
     * Student Send Contact Message
     */
    public function send()
    {


        $userId =
            $_SESSION['user']['id'] ?? null;



        $name =
            trim($_POST['name'] ?? '');



        $email =
            trim($_POST['email'] ?? '');



        $subject =
            trim($_POST['subject'] ?? '');



        $message =
            trim($_POST['message'] ?? '');



        try {


            if (
                empty($name) ||
                empty($email) ||
                empty($subject) ||
                empty($message)
            ) {

                throw new \Exception(
                    'Please fill all fields'
                );

            }



            $this->contactService
                ->sendMessage(

                    $userId,

                    $name,

                    $email,

                    $subject,

                    $message

                );



            Flash::set(

                'success',

                'Your message has been sent successfully'

            );


        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );

        }



        return Response::redirect(
            '/contact'
        );
    }

}