<?php

namespace App\EventFeedback\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;

use App\EventFeedback\Application\Services\EventFeedbackService;

use App\Shared\Helpers\Flash;



class EventFeedbackController extends BaseController
{


    private EventFeedbackService $feedbackService;



    public function __construct(
        EventFeedbackService $feedbackService
    )
    {

        parent::__construct();


        $this->feedbackService =
            $feedbackService;

    }





    /**
     * Feedback page
     */
    public function create(
        int $eventId
    )
    {


        $this->view(

            'EventFeedback/Presentation/Views/student/feedback',

            [

                'title'=>'Submit Feedback',

                'eventId'=>$eventId

            ],

            'student'

        );

    }





    /**
     * Store feedback
     */
    public function store(
        int $eventId
    )
    {


        $data = [


            'event_id'=>
                $eventId,


            'user_id'=>
                $_SESSION['user']['id'],


            'rating'=>
                $_POST['rating'],


            'comment'=>
                trim(
                    $_POST['comment']
                )

        ];




        try {


            $this->feedbackService
                ->create(
                    $data
                );



            Flash::set(

                'success',

                'Feedback submitted successfully.'

            );



            return Response::redirect(

                '/events/'.$eventId

            );


        } catch(\Exception $e){



            Flash::set(

                'error',

                $e->getMessage()

            );



            return Response::redirect(

                '/events/'.$eventId.'/feedback'

            );

        }


    }





}