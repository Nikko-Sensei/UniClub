<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;

class AuthMiddleware
{
    public function handle(): void
    {
        if (!isset($_SESSION['user'])) {

            Response::redirect(
                '/login'
            );
        }
    }
}