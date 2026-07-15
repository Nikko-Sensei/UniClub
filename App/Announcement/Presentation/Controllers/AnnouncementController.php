<?php

namespace App\Announcement\Presentation\Controllers;


use App\Announcement\Application\Services\AnnouncementService;

use App\Shared\Core\BaseController;



class AnnouncementController extends BaseController
{


    private AnnouncementService $announcementService;



    public function __construct(
        AnnouncementService $announcementService
    )
    {

        parent::__construct();


        $this->announcementService =
            $announcementService;

    }



    /**
     * Display published announcements
     */
    public function index()
    {


        $announcements =
            $this->announcementService
                ->getPublishedAnnouncements();



        return $this->view(

            'Announcement/Presentation/Views/student/index',

            [

                'announcements' => $announcements

            ],

            'app'


        );

    }



    /**
     * Show announcement detail
     */
    public function show(
        int $id
    )
    {


        $announcement =
            $this->announcementService
                ->getAnnouncement($id);



        return $this->view(

            'Announcement/Presentation/Views/student/show',

            [

                'announcement' => $announcement

            ],

            'app'


        );

    }


}