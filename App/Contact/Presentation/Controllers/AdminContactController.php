<?php

namespace App\Contact\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Contact\Application\Services\ContactService;
use App\Shared\Helpers\Flash;


class AdminContactController extends BaseController
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
     * Admin Contact Message List
     */
    public function index()
    {


        $messages =
            $this->contactService
            ->getMessages();



        $this->view(

            'Contact/Presentation/Views/admin/index',

            [

                'title' => 'Contact Messages',

                'messages' => $messages

            ],

            'admin'

        );

    }





    /**
     * Update Contact Status
     */
    public function updateStatus(
        int $id
    ) {


        $status =
            $_POST['status'] ?? 'pending';



        try {


            $this->contactService
                ->updateStatus(

                    $id,

                    $status

                );



            Flash::set(

                'success',

                'Contact status updated'

            );


        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );

        }



        return Response::redirect(
            '/admin/contacts'
        );

    }

}