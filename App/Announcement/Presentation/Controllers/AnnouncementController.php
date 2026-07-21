<?php

namespace App\Announcement\Presentation\Controllers;


use App\Announcement\Application\Services\AnnouncementService;
use App\Shared\Core\Auth;
use App\Shared\Core\BaseController;



class AnnouncementController extends BaseController
{


    private AnnouncementService $announcementService;



    public function __construct(
        AnnouncementService $announcementService
    ) {

        parent::__construct();


        $this->announcementService =
            $announcementService;
    }



    /**
     * Display published announcements
     */
    //    public function index()
    // {

    //     $userId = Auth::id();


    //     $announcements =
    //         $this->announcementService
    //             ->getAnnouncementsForUser($userId);



    //     return $this->view(

    //         'Announcement/Presentation/Views/student/index',

    //         [

    //             'announcements' => $announcements

    //         ],

    //         'App'


    //     );

    // }



    public function index()
    {

        $userId = Auth::id();


        $filters = [

            'search' =>
            $_GET['search'] ?? '',


            'priority' =>
            $_GET['priority'] ?? '',


            'time' =>
            $_GET['time'] ?? ''

        ];



        $announcements =
            $this->announcementService
            ->getAnnouncementsForUser(

                $userId,

                $filters

            );



        return $this->view(

            'Announcement/Presentation/Views/student/index',

            [

                'announcements' => $announcements

            ],

            'App'

        );
    }



    /**
     * Show announcement detail
     */
    public function show(
        int $id
    ) {


        $announcement =
            $this->announcementService
            ->getAnnouncement($id);



        return $this->view(

            'Announcement/Presentation/Views/student/show',

            [

                'announcement' => $announcement

            ],

            'App'


        );
    }
}
