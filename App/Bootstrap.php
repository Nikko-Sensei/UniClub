<?php

namespace App;


use App\Shared\Container\Container;

// Home
use App\Home\Presentation\Controller\HomeController;


// Auth
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Application\Services\AuthService;
use App\Auth\Domain\Repository\UserRepositoryInterface;
use App\Auth\Infrastructure\Persistence\UserRepository;


// Master
use App\Master\Application\Services\MasterService;
use App\Master\Domain\Repository\MasterRepositoryInterface;
use App\Master\Infrastructure\Persistence\MasterRepository;



class Bootstrap
{

    public static function create(): Container
    {

        $container = new Container();

        /*
        |--------------------------------------------------------------------------
        | Home Controller
        |--------------------------------------------------------------------------
        */

        $container->bind(
            HomeController::class,

            function () {

                return new HomeController();
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Auth Controller
        |--------------------------------------------------------------------------
        */

        $container->bind(
            AuthController::class,

            function ($container) {

                return new AuthController(

                    $container->resolve(
                        AuthService::class
                    ),

                    $container->resolve(
                        MasterService::class
                    )
                );
            }
        );

        /*
        |--------------------------------------------------------------------------
        | User Repository
        |--------------------------------------------------------------------------
        */

        $container->bind(
            UserRepositoryInterface::class,

            function () {

                return new UserRepository();
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Auth Service
        |--------------------------------------------------------------------------
        */

        $container->bind(
            AuthService::class,

            function ($container) {

                return new AuthService(

                    $container->resolve(
                        UserRepositoryInterface::class
                    )

                );
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Master Repository
        |--------------------------------------------------------------------------
        */

        $container->bind(
            MasterRepositoryInterface::class,

            function () {

                return new MasterRepository();
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Master Service
        |--------------------------------------------------------------------------
        */
        $container->bind(
            MasterService::class,

            function ($container) {

                return new MasterService(

                    $container->resolve(
                        MasterRepositoryInterface::class
                    )
                );
            }
        );

        return $container;
    }
}