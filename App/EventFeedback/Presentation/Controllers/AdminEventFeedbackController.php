<?php

namespace App\EventFeedback\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;

use App\EventFeedback\Application\Services\EventFeedbackService;

use App\Shared\Helpers\Flash;



class AdminEventFeedbackController extends BaseController
{


    private EventFeedbackService $feedbackService;



    public function __construct(
        EventFeedbackService $feedbackService
    ) {

        parent::__construct();


        $this->feedbackService =
            $feedbackService;
    }





    /**
     * Feedback List
     */
    public function index()
    {


        $page =
            max(
                1,
                (int)(
                    $_GET['page'] ?? 1
                )
            );



        $limit = 10;



        $filters = [


            'search' =>
            trim(
                $_GET['search'] ?? ''
            ),


            'rating' =>
            !empty($_GET['rating'])
                ? (int)$_GET['rating']
                : null,


            'event_id' =>
            !empty($_GET['event_id'])
                ? (int)$_GET['event_id']
                : null

        ];



        $result =
            $this->feedbackService
            ->getFeedbacks(

                $page,

                $limit,

                $filters

            );



        $this->view(

            'EventFeedback/Presentation/Views/admin/index',

            [

                'title' => 'Event Feedback',


                'feedbacks' =>
                $result['feedbacks'],


                'filters' =>
                $filters,


                'pagination' =>
                $result['pagination']

            ],

            'admin'

        );
    }





    /**
     * Delete Feedback
     */
    public function delete(
        int $id
    ) {


        try {


            $this->feedbackService
                ->delete(
                    $id
                );



            Flash::set(

                'success',

                'Feedback deleted successfully.'

            );
        } catch (\Exception $e) {



            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(

            '/admin/feedbacks'

        );
    }
}
