<?php

namespace App\EventFeedback\Application\Services;


use App\EventFeedback\Domain\Repository\EventFeedbackRepositoryInterface;

use App\Event\Domain\Repository\EventRepositoryInterface;

use App\EventFeedback\Domain\Exceptions\FeedbackNotFoundException;



class EventFeedbackService
{


    private EventFeedbackRepositoryInterface $feedbackRepository;

    private EventRepositoryInterface $eventRepository;



    public function __construct(

        EventFeedbackRepositoryInterface $feedbackRepository,

        EventRepositoryInterface $eventRepository

    ) {


        $this->feedbackRepository = $feedbackRepository;

        $this->eventRepository = $eventRepository;

    }





    /**
     * Student submit feedback
     */
    public function create(
        array $data
    )
    {


        /*
        |--------------------------------------------------------------------------
        | Check Event Exists
        |--------------------------------------------------------------------------
        */


        $event =
            $this->eventRepository
            ->findById(
                $data['event_id']
            );



        if (!$event) {


            throw new \Exception(

                "Event not found."

            );

        }





        /*
        |--------------------------------------------------------------------------
        | Check Event Completed
        |--------------------------------------------------------------------------
        */


        $eventEnd = strtotime(

            $event->getEventDate()
            .
            ' '
            .
            $event->getEndTime()

        );



        if ($eventEnd >= time()) {


            throw new \Exception(

                "Feedback is only available after event completion."

            );

        }







        /*
        |--------------------------------------------------------------------------
        | Check Student Registered
        |--------------------------------------------------------------------------
        */


        $registered =
            $this->eventRepository
            ->registrationExists(

                $data['event_id'],

                $data['user_id']

            );



        if (!$registered) {


            throw new \Exception(

                "You can only submit feedback for attended events."

            );

        }







        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Feedback
        |--------------------------------------------------------------------------
        */


        $exists =
            $this->feedbackRepository
            ->exists(

                $data['event_id'],

                $data['user_id']

            );



        if ($exists) {


            throw new \Exception(

                "You already submitted feedback."

            );

        }








        /*
        |--------------------------------------------------------------------------
        | Create Feedback
        |--------------------------------------------------------------------------
        */


        return $this->feedbackRepository
            ->create(

                $data

            );

    }









    /**
     * Get feedback by event
     */
    public function getEventFeedback(
        int $eventId
    )
    {


        return $this->feedbackRepository
            ->findByEvent(

                $eventId

            );

    }









    /**
     * Get user's feedback for event
     */







    /**
     * Admin feedback list
     */
    public function getFeedbacks(

        int $page,

        int $limit,

        array $filters = []

    ): array
    {


        $page =
            max(

                1,

                $page

            );



        $feedbacks =
            $this->feedbackRepository
            ->findAll(

                $page,

                $limit,

                $filters

            );



        $total =
            $this->feedbackRepository
            ->count(

                $filters

            );




        return [


            'feedbacks' => $feedbacks,



            'pagination' => [


                'current_page' =>
                    $page,


                'per_page' =>
                    $limit,


                'total' =>
                    $total,


                'total_pages' =>
                    (int) ceil(

                        $total / $limit

                    )


            ]

        ];

    }









    /**
     * Delete feedback (Admin)
     */
    public function delete(
        int $id
    )
    {


        // $feedback =
        //     $this->feedbackRepository
        //     ->findById(

        //         $id

        //     );



        // if (!$feedback) {


        //     throw new FeedbackNotFoundException();

        // }



        return $this->feedbackRepository
            ->delete(

                $id

            );

    }




}



 