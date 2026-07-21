<?php

namespace App\Shared\Middleware;


use App\Admin\Settings\Security\Application\Services\SecuritySettingService;


class MaintenanceMiddleware
{

    private SecuritySettingService $service;


    public function __construct(
        SecuritySettingService $service
    )
    {

        $this->service = $service;

    }



    public function handle(): void
    {

        $setting =
            $this->service->getSetting();



        if(
            $setting &&
            $setting['maintenance_mode']
        )
        {

            if(
                !isset($_SESSION['user'])
                ||
                $_SESSION['user']['role_id'] != 1
            )
            {

                header(
                    "Location: /maintenance"
                );

                exit;

            }

        }


    }


}