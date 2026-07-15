<?php

namespace App\Club\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Club\Application\Services\ClubService;
use App\Membership\Application\Services\MembershipService;



class UserClubController extends BaseController
{

    private ClubService $clubService;
    private MembershipService $membershipService;


    public function __construct(
        ClubService $clubService,
        MembershipService $membershipService

    ) {

        parent::__construct();


        $this->clubService = $clubService;
        $this->membershipService = $membershipService;
    }


    /**
     * Student Browse Clubs
     */
    public function index()
    {
        $page = isset($_GET['page'])
            ? (int)$_GET['page']
            : 1;


        $filters = [
            'search' => $_GET['search'] ?? null,

            'category_id' =>
            $_GET['category_id'] ?? null
        ];


        $result = $this->clubService
            ->getStudentClubs(
                $filters,
                $page
            );



        $this->view(
            'Club/Presentation/Views/student/index',
            [
                'title' => 'Explore Clubs',

                'clubs' =>
                $result['clubs'],

                'pagination' =>
                $result['pagination']
            ],
            'app'
        );
    }


    /**
     * Student View Club Details
     */
    public function show(int $id)
    {
        // var_dump($id);
        // exit;
        $club =
            $this->clubService
            ->getClub($id);



        if (!$club) {

            return Response::redirect('/clubs');
        }



        $leadership =
            $this->clubService
            ->getLeadership($id);



        $events =
            $this->clubService
            ->getUpcomingEvents($id);



        $membershipStatus = null;



        if (isset($_SESSION['user'])) {

            $membershipStatus =
                $this->membershipService
                ->getMembershipStatus(

                    $id,

                    $_SESSION['user']['id']

                );
        }




        $this->view(

            'Club/Presentation/Views/student/show',

            [

                'title' => 'Club Details',

                'club' => $club,

                'leadership' => $leadership,

                'events' => $events,

                'membershipStatus' => $membershipStatus

            ],

            'app'

        );
    }
}