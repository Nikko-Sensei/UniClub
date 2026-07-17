<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Auth;
use App\Shared\Core\Response;

class RoleMiddleware
{
    public function handle(): void
    {

        if (!Auth::check()) {

            Response::redirect('/login');

            exit;
        }


        $allowedRoles = [
            1, // admin
            3  // club_manager
        ];


        if (
            !in_array(
                Auth::roleId(),
                $allowedRoles
            )
        ) {

            http_response_code(403);

            echo "403 Forbidden";

            exit;
        }

    }
}