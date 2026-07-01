<?php

namespace App\Shared\Middleware;


use App\Shared\Core\Response;


class GuestMiddleware
{

    public function handle(): void
    {

        if(!empty($_SESSION['user']))
        {

            Response::redirect('/');

            exit;
        }

    }

}