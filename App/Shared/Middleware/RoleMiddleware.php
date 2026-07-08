<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Auth;
use App\Shared\Core\Response;

class RoleMiddleware
{
    public function handle(): void
    {
        // Check authentication
        if (!Auth::check()) {

            Response::redirect('/login');
            exit;

        }


        // Check admin role
        if (Auth::roleId() !== 1) {

            Response::redirect('/dashboard');
            exit;

        }
    }
}