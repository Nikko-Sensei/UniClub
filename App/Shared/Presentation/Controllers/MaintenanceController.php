<?php

namespace App\Shared\Presentation\Controllers;

use App\Shared\Core\BaseController;


class MaintenanceController extends BaseController
{


    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {

        $this->view(
            'Shared/Presentation/Views/maintenance',
            [],
            'auth'
        );

    }

}