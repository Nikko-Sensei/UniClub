<?php

namespace App\User\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\User\Application\Services\UserService;

class UserController extends BaseController
{
    public function __construct(
        private UserService $userService
    ) {
        parent::__construct();
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return $this->view('User/index', [
            'users' => $users
        ]);
    }

    public function search()
    {
        $keyword = $_GET['q'] ?? '';

        $users = $this->userService->search($keyword);

        return $this->view('User/index', [
            'users' => $users
        ]);
    }
}