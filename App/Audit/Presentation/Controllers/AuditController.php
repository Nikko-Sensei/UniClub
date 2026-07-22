<?php

namespace App\Audit\Presentation\Controllers;

use App\Admin\UserManagement\Application\Services\UserManagementService;
use App\Shared\Core\BaseController;
use App\Audit\Application\Services\AuditService;



class AuditController extends BaseController
{

    private AuditService $service;

   

    public function __construct(
        AuditService $service
        
    ) {

        parent::__construct();

        $this->service = $service;

    }




    public function index()
    {


        $page =
            (int)(
                $_GET['page'] ?? 1
            );



        $filters = [

            'search' =>
            $_GET['search'] ?? '',


            'action' =>
            $_GET['action'] ?? ''

        ];



        $logs =
            $this->service
            ->getLogs(
                $page,
                $filters
            );



        $this->view(

            'Audit/Presentation/Views/index',

            [

                'logs' => $logs,

                'filters' => $filters

            ],

            'admin'

        );
    }
}