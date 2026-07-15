<?php

namespace App\Announcement\Presentation\Controllers;


use App\Announcement\Application\Services\AnnouncementService;

use App\Shared\Core\BaseController;

use App\Shared\Core\Response;

use App\Shared\Helpers\Flash;



class AdminAnnouncementController extends BaseController
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
     * Display all announcements
     */
    public function index()
{

    $page = max(
        1,
        (int) ($_GET['page'] ?? 1)
    );


    $limit = 10;



    $filters = [

        'search' =>
            trim($_GET['search'] ?? ''),


        'priority' =>
            $_GET['priority'] ?? '',


        'status' =>
            $_GET['status'] ?? ''

    ];



    $result =
        $this->announcementService
            ->getAnnouncements(
                $page,
                $limit,
                $filters
            );




    return $this->view(

        'Announcement/Presentation/Views/admin/index',

        [

            'title' =>
                'Announcement Management',


            'announcements' =>
                $result['announcements'],


            'filters' =>
                $filters,


            'pagination' =>
                $result['pagination']

        ],

        'admin'

    );

}



    /**
     * Show create announcement page
     */
    public function create()
    {

        // $clubs =
        //     $this->clubService
        //     ->getClubs();


        return $this->view(

            'Announcement/Presentation/Views/admin/create',

            [

                'clubs' => $clubs

            ],

            'admin'

        );
    }



    /**
     * Store announcement
     */
    public function store()
    {


        $data = [

            'club_id' =>
            $_POST['club_id'],

            'title' =>
            $_POST['title'],

            'content' =>
            $_POST['content'],

            'priority' =>
            $_POST['priority'],

            'image' =>
            $_POST['image'] ?? null,

            'status' =>
            $_POST['status'],

            'created_by' =>
            $_SESSION['user']['id']

        ];



        $this->announcementService
            ->create($data);



        Flash::set(
            'success',
            'Announcement created successfully.'
        );



        Response::redirect(
            'Announcement/Presentation/Views/admin/announcements'
        );
    }



    /**
     * Show edit announcement page
     */
    public function edit(
        int $id
    ) {

        $announcement =
            $this->announcementService
            ->getAnnouncement($id);



        return $this->view(

            'Announcement/Presentation/Views/admin/edit',

            [

                'announcement' => $announcement

            ],

            'admin'

        );
    }



    /**
     * Update announcement
     */
    public function update(
        int $id
    ) {

        $data = [

            'title' =>
            $_POST['title'],

            'content' =>
            $_POST['content'],

            'priority' =>
            $_POST['priority'],

            'image' =>
            $_POST['image'] ?? null,

            'status' =>
            $_POST['status']

        ];



        $this->announcementService
            ->update(
                $id,
                $data
            );



        Flash::set(
            'success',
            'Announcement updated successfully.'
        );



        Response::redirect(
            'Announcement/Presentation/Views/admin/announcements'
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

            'Announcement/Presentation/Views/admin/show',

            [

                'announcement' => $announcement

            ],

            'admin'

        );
    }



    /**
     * Delete announcement
     */
    public function delete(
        int $id
    ) {

        $this->announcementService
            ->delete($id);



        Flash::set(
            'success',
            'Announcement deleted successfully.'
        );



        Response::redirect(
            'Announcement/Presentation/Views/admin/announcements'
        );
    }
}