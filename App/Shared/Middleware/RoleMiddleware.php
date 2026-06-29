<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;

class RoleMiddleware
{
    public static function check(string $role): void
    {
        if (!isset($_SESSION['user'])) {
            Response::redirect('/login');
        }

        if ($_SESSION['user']['role_id'] != $role) {
            Response::redirect('/');
        }
    }
}