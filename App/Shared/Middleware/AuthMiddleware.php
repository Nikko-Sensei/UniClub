<?php

namespace App\Shared\Middleware;


use App\Shared\Core\Response;


class AuthMiddleware
{

    public function handle(): void
    {

        if(empty($_SESSION['user']))
        {

            Response::redirect(
                '/login'
            );

            exit;
        }

    }

}