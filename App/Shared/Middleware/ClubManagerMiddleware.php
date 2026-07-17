<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Auth;
use App\Shared\Core\Response;


class ClubManagerMiddleware
{

    public function handle(): void
    {

        // Check login

        if (!Auth::check()) {

            Response::redirect('/login');

            exit;

        }


        // Only club manager

        if (Auth::roleId() !== 3) {

            Response::redirect('/dashboard');

            exit;

        }

    }

}