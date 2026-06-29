<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;

class AdminMiddleware
{
    public function handle(): void
    {
        if (
            !isset($_SESSION['user'])
            ||
            $_SESSION['user']['role']
                !== 'admin'
        ) {

            Response::redirect('/');
        }
    }
}