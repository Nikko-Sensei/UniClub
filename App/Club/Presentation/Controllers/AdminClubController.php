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
        $page = (int)($_GET['page'] ?? 1);

        $filters = [
            'search' => $_GET['search'] ?? null,
            'category_id' => $_GET['category_id'] ?? null,
            'status' => $_GET['status'] ?? null
        ];

        $data = $this->clubService->getClubs(
            $filters,
            $page
        );

        $categories = $this->masterService
            ->getClubCategories();


        $this->view(
            'Club/Presentation/Views/index',
            [
                'clubs' => $data['clubs'],

                'pagination' => $data['pagination'],

                'filters' => $filters,

                'categories' => $categories,

                'statistics' => $this->clubService->getStatistics()
            ],
            'admin'
        );
    }


    /**
     * Show Club Details
     */
    public function show(int $id)
    {
        $club = $this->clubService
            ->getClub($id);


        if (!$club) {

            return Response::redirect(
                '/admin/clubs'
            );
        }


        $this->view(
            'Club/Presentation/Views/show',
            [
                'title' => 'Club Details',

                'club' => $club
            ],
            'admin'
        );
    }


    public function create()
    {
        $categories = $this->masterService
            ->getClubCategories();


        $this->view(
            'Club/Presentation/Views/create',
            [
                'title' => 'Create Club',

                'categories' => $categories
            ],
            'admin'
        );
    }


    public function store()
    {
        $data = $_POST;


        // Handle logo upload
        if (!empty($_FILES['logo']['name'])) {

            $data['logo'] = $this->uploadImage(
                $_FILES['logo'],
                'clubs'
            );
        }


        // Handle banner upload
        if (!empty($_FILES['banner']['name'])) {

            $data['banner'] = $this->uploadImage(
                $_FILES['banner'],
                'clubs'
            );
        }


        $this->clubService
            ->create(
                $data,
                $_SESSION['user']['id']
            );


        return Response::redirect(
            '/admin/clubs'
        );
    }


    public function edit(int $id)
    {
        $club = $this->clubService
            ->getClub($id);


        $categories = $this->masterService
            ->getClubCategories();


        $this->view(
            'Club/Presentation/Views/edit',
            [
                'club' => $club,

                'categories' => $categories
            ],
            'admin'
        );
    }


    public function update(int $id)
{
    $data = $_POST;


    $club = $this->clubService
        ->getClub($id);


    if (!empty($_FILES['logo']['name'])) {

        $data['logo'] = $this->uploadImage(
            $_FILES['logo'],
            'clubs'
        );

    } else {

        $data['logo'] = $club->getLogo();

    }


    if (!empty($_FILES['banner']['name'])) {

        $data['banner'] = $this->uploadImage(
            $_FILES['banner'],
            'clubs'
        );

    } else {

        $data['banner'] = $club->getBanner();

    }


    $this->clubService
        ->update(
            $id,
            $data
        );


    return Response::redirect(
        '/admin/clubs'
    );
}


    public function delete(int $id)
    {
        $this->clubService
            ->delete($id);


        return Response::redirect(
            '/admin/clubs'
        );
    }

    private function uploadImage(
    array $file,
    string $folder
): ?string {


    $uploadDir = 
        __DIR__ . '/../../../../public/uploads/' . $folder . '/';


    if (!is_dir($uploadDir)) {

        mkdir(
            $uploadDir,
            0777,
            true
        );

    }


    $extension = pathinfo(
        $file['name'],
        PATHINFO_EXTENSION
    );


    $filename = uniqid()
        . '.'
        . strtolower($extension);


    move_uploaded_file(
        $file['tmp_name'],
        $uploadDir . $filename
    );


    return $filename;
}
}