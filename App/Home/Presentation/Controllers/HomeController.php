<?php

namespace App\Home\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Home\Application\Services\HomeService;

class HomeController extends BaseController
{

    private HomeService $homeService;


    public function __construct(
        HomeService $homeService
    ) {

        parent::__construct();

        $this->homeService =
            $homeService;
    }



    /**
     * Home Page
     */
    public function index()
    {

        $statistics =
            $this->homeService
            ->getStatistics();


        $clubs =
            $this->homeService
            ->getFeaturedClubs(
                6
            );


        $events =
            $this->homeService
            ->getUpcomingEvents(
                6
            );


        $announcements =
            $this->homeService
            ->getLatestAnnouncements(
                5
            );



        $this->view(

            'Home/Presentation/Views/index',

            [

                'title' => 'Home',

                'statistics' => $statistics,

                'clubs' => $clubs,

                'events' => $events,

                'announcements' => $announcements

            ],

            'app'

        );

    }

}