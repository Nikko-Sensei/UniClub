<?php

namespace App\Shared\Middleware;


use App\Shared\Core\Response;


class RoleMiddleware
{

    public function handle(
        string $role
    ): void {

        if (empty($_SESSION['user'])) {

            Response::redirect('/login');

            exit;
        }

        if (
            $_SESSION['user']['role']
            !==
            $role
        ) {

            Response::redirect('/');

            exit;
        }
    }
}