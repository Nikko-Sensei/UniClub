<?php

namespace App\Club\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Club\Application\Services\ClubService;
use App\Master\Application\Services\MasterService;



class AdminClubController extends BaseController
{

    private ClubService $clubService;

    private MasterService $masterService;



    public function __construct(
        ClubService $clubService,
        MasterService $masterService
    ) {

        parent::__construct();


        $this->clubService = $clubService;

        $this->masterService = $masterService;
    }



    public function index()
    {

        $page = (int)(
            $_GET['page'] ?? 1
        );


        $filters = [

            'search' =>
                $_GET['search'] ?? null,


            'category_id' =>
                $_GET['category_id'] ?? null,


            'status' =>
                $_GET['status'] ?? null

        ];



        $data =
            $this->clubService
            ->getClubs(
                $filters,
                $page
            );



        $categories =
            $this->masterService
            ->getClubCategories();




        $this->view(
            'Club/Presentation/Views/index',

            [

                'clubs' =>
                    $data['clubs'],


                'pagination' =>
                    $data['pagination'],


                'filters' =>
                    $filters,


                'categories' =>
                    $categories,


                'statistics' =>
                    $this->clubService
                    ->getStatistics()

            ],

            'admin'
        );

    }




    public function show(
        int $id
    ) {


        $club =
            $this->clubService
            ->getClub($id);



        if (!$club) {

            return Response::redirect(
                '/admin/clubs'
            );

        }



        $this->view(
            'Club/Presentation/Views/show',

            [

                'title' =>
                    'Club Details',


                'club' =>
                    $club

            ],

            'admin'
        );

    }





    public function create()
    {


        $categories =
            $this->masterService
            ->getClubCategories();



        $this->view(
            'Club/Presentation/Views/create',

            [

                'title' =>
                    'Create Club',


                'categories' =>
                    $categories

            ],

            'admin'
        );

    }





    public function store()
    {


        $this->clubService
            ->create(

                $_POST,

                $_FILES,

                $_SESSION['user']['id']

            );



        return Response::redirect(
            '/admin/clubs'
        );

    }





    public function edit(
        int $id
    ) {


        $club =
            $this->clubService
            ->getClub($id);



        $categories =
            $this->masterService
            ->getClubCategories();




        $this->view(
            'Club/Presentation/Views/edit',

            [

                'club' =>
                    $club,


                'categories' =>
                    $categories

            ],

            'admin'
        );

    }





    public function update(
        int $id
    ) {


        $this->clubService
            ->update(

                $id,

                $_POST,

                $_FILES

            );



        return Response::redirect(
            '/admin/clubs'
        );

    }





    public function delete(
        int $id
    ) {


        $this->clubService
            ->delete($id);



        return Response::redirect(
            '/admin/clubs'
        );

    }


}