<?php

namespace App\Admin\Dashboard\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Admin\Dashboard\Application\Services\DashboardService;


class DashboardController extends BaseController
{

    private DashboardService $service;


    public function __construct(
        DashboardService $service
    ) {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {

        $dashboard = $this->service->getDashboardData();
        $this->view(
            'Admin/Dashboard/Presentation/Views/dashboard',
            [
                'title' => 'Admin Dashboard',

                'dashboard' => $dashboard
            ],
            'admin'
        );
    }
}