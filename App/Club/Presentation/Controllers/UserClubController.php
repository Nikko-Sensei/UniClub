<?php

namespace App\Club\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Club\Application\Services\ClubService;
use App\Membership\Application\Services\MembershipService;
use App\Master\Application\Services\MasterService;



class UserClubController extends BaseController
{

    private ClubService $clubService;
    private MembershipService $membershipService;

    private MasterService $masterService;


    public function __construct(
        ClubService $clubService,
        MembershipService $membershipService,
        MasterService $masterService

    ) {

        parent::__construct();


        $this->clubService = $clubService;
        $this->membershipService = $membershipService;
        $this->masterService = $masterService;
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
            'search' =>
            trim(
                $_GET['search'] ?? ''
            ),



            'category_id' =>
            !empty($_GET['category_id'])
                ? (int)$_GET['category_id']
                : null,
        ];


        $result = $this->clubService
            ->getStudentClubs(
                $filters,
                $page
            );

        $featuredClub = $this->clubService->getFeaturedClub();

        $categories =
            $this->masterService
            ->getClubCategories();

        $this->view(
            'Club/Presentation/Views/student/index',
            [
                'title' => 'Explore Clubs',

                'clubs' =>
                $result['clubs'],

                'featuredClub' => $featuredClub,

                'categories' =>
                $categories,

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
        
        $club =
            $this->clubService
            ->getClub($id);

// var_dump($club);
//         exit;

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