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
     * Admin Update Message Status
     */
    public function updateStatus(
        int $id
    ) {


        $status =
            $_POST['status'] ?? '';



        try {


            if (
                empty($status)
            ) {

                throw new \Exception(
                    'Invalid status'
                );
            }





            $this->contactService
                ->updateStatus(

                    $id,

                    $status

                );





            Flash::set(

                'success',

                'Contact status updated successfully'

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


    /**
     * Admin Contact Detail
     */
    public function show(
        int $id
    ) {


        $message =
            $this->contactService
            ->getMessage($id);



        if (!$message) {

            Flash::set(
                'error',
                'Message not found'
            );


            return Response::redirect(
                '/admin/contacts'
            );
        }



        $this->view(

            'Contact/Presentation/Views/admin/show',

            [

                'title' => 'Contact Detail',

                'message' => $message

            ],

            'admin'

        );
    }


    public function delete($id)
    {

        $this->contactService->delete(
            (int)$id
        );


        Flash::set(
            'success',
            'Contact message deleted successfully.'
        );


        Response::redirect(
            '/admin/contacts'
        );
    }
}