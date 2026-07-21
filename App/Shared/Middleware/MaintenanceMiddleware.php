<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;
use App\Shared\Helpers\SecuritySettingHelper;


class MaintenanceMiddleware
{

    private SecuritySettingHelper $security;


    public function __construct(
        SecuritySettingHelper $security
    ) {

        $this->security = $security;
    }



    public function handle(): void
    {


        if (
            !$this->security->enabled(
                'maintenance_mode'
            )
        ) {

            return;
        }



        /*
        |--------------------------------------------------------------------------
        | Allow Admin
        |--------------------------------------------------------------------------
        */

        if (
            isset($_SESSION['user'])
            &&
            ($_SESSION['user']['role_id'] ?? null) == 1
        ) {

            return;
        }



        /*
        |--------------------------------------------------------------------------
        | Prevent Redirect Loop
        |--------------------------------------------------------------------------
        */

        $path = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );


        if (
            $this->isAllowedDuringMaintenance($path)
        ) {

            return;
        }



        Response::redirect(
            '/maintenance'
        );

        exit;
    }





    /**
     * Routes accessible during maintenance
     */
    private function isAllowedDuringMaintenance(
        string $path
    ): bool {

        $allowed = [

            '/login',

            '/logout',

            '/maintenance',

        ];


        foreach ($allowed as $route) {

            if (
                str_ends_with(
                    $path,
                    $route
                )
            ) {

                return true;
            }
        }


        return false;
    }
}
