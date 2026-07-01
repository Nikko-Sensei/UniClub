<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;


class RateLimitMiddleware
{
    public function handle(
        string $key,
        int $limit = 5,
        int $minutes = 5
    ): void {

        $sessionKey =
            "rate_limit_" . $key;


        if (!isset($_SESSION[$sessionKey])) {

            $_SESSION[$sessionKey] = [

                'count' => 0,

                'time' => time()
            ];
        }

        $data = $_SESSION[$sessionKey];

        if (
            time() - $data['time']
            > ($minutes * 60)
        ) {

            $_SESSION[$sessionKey] = [

                'count' => 0,

                'time' => time()

            ];

            return;
        }

        if (
            $data['count'] >= $limit
        ) {

            Response::abort(
                429,
                "Too many login attempts. Try again later."
            );
        }
    }
    public function hit(
        string $key
    ): void {

        $sessionKey =
            "rate_limit_" . $key;

        $_SESSION[$sessionKey]['count']++;
    }
    public function clear(
        string $key
    ): void {

        unset(
            $_SESSION["rate_limit_" . $key]
        );
    }
}
