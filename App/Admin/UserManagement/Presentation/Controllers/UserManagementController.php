<?php

namespace App\Admin\UserManagement\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Admin\UserManagement\Application\Services\UserManagementService;
use App\Master\Application\Services\MasterService;

class UserManagementController extends BaseController
{
    private UserManagementService $userManagementService;

    private MasterService $masterService;


    public function __construct(
        UserManagementService $userManagementService,
        MasterService $masterService
    ) {
        parent::__construct();

        $this->userManagementService = $userManagementService;

        $this->masterService = $masterService;
    }

    public function index()
    {
        $keyword = $_GET['search'] ?? null;

        $page = (int)($_GET['page'] ?? 1);

        // var_dump($_GET['academic_year_id']);
        // exit;

        $filters = [

            'department_id' => $_GET['department_id'] ?? null,

            'academic_year_id' => $_GET['academic_year_id'] ?? null

        ];

        if (!empty($keyword)) {

            $users = $this->userManagementService
                ->search($keyword);

            $pagination = null;
        } else {

            $result = $this->userManagementService
                ->getUsers(
                    $page,
                    $filters
                );


            $users = $result['users'];

            $pagination = $result['pagination'];
        }

        $departments = $this->masterService
            ->getDepartments();

        $academicYears = $this->masterService
            ->getAcademicYears();

        $userStatistics =
            $this->userManagementService
            ->getUserStatistics();


        $this->view(
            'Admin/UserManagement/Presentation/Views/users/index',
            [

                'title' => 'User Management',

                'users' => $users,

                'pagination' => $pagination,

                'filters' => $filters,

                'departments' => $departments,

                'academicYears' => $academicYears,

                'userStatistics' => $userStatistics

            ],
            'admin'
        );
    }


    /**
     * Show User Details
     */
    public function show(int $id)
    {
        $user = $this->userManagementService->getUser($id);


        if (!$user) {

            return Response::redirect(
                '/admin/users'
            );
        }


        $this->view(
            'Admin/UserManagement/Presentation/Views/users/show',
            [
                'title' => 'User Details',
                'user' => $user
            ],
            'admin'
        );
    }

    public function edit(int $id)
    {
        $user = $this->userManagementService
            ->getUser($id);


        $departments = $this->masterService
            ->getDepartments();


        $academicYears = $this->masterService
            ->getAcademicYears();

        $roles = $this->masterService
            ->getRoles();


        $this->view(
            'Admin/UserManagement/Presentation/Views/users/edit',
            [
                'user' => $user,
                'departments' => $departments,
                'academicYears' => $academicYears,
                'roles' => $roles
            ],
            'admin'
        );
    }

    public function update(int $id)
    {
        $data = $_POST;

        $this->userManagementService
            ->updateUser(
                $id,
                $data
            );


        return Response::redirect(
            '/admin/users'
        );
    }

    public function delete(
        int $id
    ) {

        $this->userManagementService
            ->deleteUser($id);


        return Response::redirect(
            '/admin/users'
        );
    }
}