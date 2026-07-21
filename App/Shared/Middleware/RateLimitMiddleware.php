<?php

namespace App\Shared\Middleware;

use App\Shared\Core\Response;
use App\Shared\Helpers\SecuritySettingHelper;


class RateLimitMiddleware
{

    private SecuritySettingHelper $security;

    public function __construct(
        SecuritySettingHelper $security
    ) {

        $this->security = $security;
    }
    public function handle(
        string $key
    ): void {


        if (
            !$this->security->enabled(
                'enable_rate_limit'
            )
        ) {

            return;
        }



        $limit =
            (int)$this->security->value(
                'rate_limit_attempts',
                5
            );



        $minutes =
            (int)$this->security->value(
                'rate_limit_minutes',
                5
            );



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
            >
            ($minutes * 60)
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
    // public function hit(
    //     string $key
    // ): void {

    //     $sessionKey =
    //         "rate_limit_" . $key;

    //     $_SESSION[$sessionKey]['count']++;
    // }

    public function hit(
        string $key
    ): void {


        $sessionKey =
            "rate_limit_" . $key;



        if (!isset($_SESSION[$sessionKey])) {

            $_SESSION[$sessionKey] = [

                'count' => 0,

                'time' => time()

            ];
        }
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