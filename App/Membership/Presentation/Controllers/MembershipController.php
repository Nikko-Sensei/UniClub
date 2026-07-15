<?php

namespace App\Membership\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Membership\Application\Services\MembershipService;
use App\Shared\Helpers\Flash;


class MembershipController extends BaseController
{


    private MembershipService $membershipService;



    public function __construct(
        MembershipService $membershipService
    ) {

        parent::__construct();


        $this->membershipService =
            $membershipService;
    }



    /**
     * Student Join Club
     */
    public function join(int $id)
    {


        $userId =
            $_SESSION['user']['id'];



        try {


            $this->membershipService
                ->joinClub(
                    $id,
                    $userId
                );



            Flash::set(
                'success',
                'Membership request submitted'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }



        return Response::redirect(
            '/clubs/' . $id
        );
    }




    /**
     * Get Membership Status
     * Used by Club Details Page
     */
    public function status(
        int $clubId
    ) {


        $userId =
            $_SESSION['user']['id'];



        $status =
            $this->membershipService
            ->getMembershipStatus(
                $clubId,
                $userId
            );



        return $status;
    }




    /**
     * Student My Clubs
     */
    public function myClubs()
    {


        $userId =
            $_SESSION['user']['id'];



        $clubs =
            $this->membershipService
            ->getMyClubs(
                $userId
            );



        $this->view(

            'Membership/Presentation/Views/student/my-clubs',

            [

                'title' => 'My Clubs',

                'clubs' => $clubs

            ],

            'app'

        );
    }

    public function leave(int $id)
    {

        $userId =
            $_SESSION['user']['id'];



        try {


            $this->membershipService
                ->leaveClub(
                    $id,
                    $userId
                );



            Flash::set(
                'success',
                'You have left the club successfully'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }

        return Response::redirect(
            '/my-clubs'
        );
    }
}