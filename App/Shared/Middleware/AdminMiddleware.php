<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Auth;
use App\Shared\Core\Response;


class AdminMiddleware
{

    public function handle(): void
    {

        // Check login

        if (!Auth::check()) {

            Response::redirect('/login');

            exit;

        }


        // Only admin role

        if (Auth::roleId() !== 1) {

            Response::redirect('/dashboard');

            exit;

        }

    }

}