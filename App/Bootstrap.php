<?php

namespace App;

use App\Shared\Container\Container;

// Home
use App\Home\Presentation\Controller\HomeController;

// Auditlog + DB
use App\Shared\Logging\AuditLogger;
use App\Shared\Database\Database;

// Auth
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Application\Services\AuthService;
use App\Auth\Domain\Repository\UserRepositoryInterface;
use App\Auth\Infrastructure\Persistence\UserRepository;

// Master
use App\Master\Application\Services\MasterService;
use App\Master\Domain\Repository\MasterRepositoryInterface;
use App\Master\Infrastructure\Persistence\MasterRepository;

// Middleware
use App\Shared\Middleware\AuthMiddleware;
use App\Shared\Middleware\GuestMiddleware;
use App\Shared\Middleware\RateLimitMiddleware;

// Password Reset (OTP FLOW)
use App\Auth\Application\Services\PasswordResetService;
use App\Auth\Presentation\Controllers\PasswordResetController;
use App\Auth\Domain\Repository\PasswordResetRepositoryInterface;
use App\Auth\Infrastructure\Persistence\PasswordResetRepository;

// Mail
use App\Shared\Mail\Mailer;
use App\Shared\Mail\EmailService;

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
        $container->bind(HomeController::class, function () {
            return new HomeController();
        });

        /*
        |--------------------------------------------------------------------------
        | Auth Controller
        |--------------------------------------------------------------------------
        */
        $container->bind(AuthController::class, function ($container) {
            return new AuthController(
                $container->resolve(AuthService::class),
                $container->resolve(MasterService::class),
                $container->resolve(RateLimitMiddleware::class)
            );
        });

        /*
        |--------------------------------------------------------------------------
        | User Repository
        |--------------------------------------------------------------------------
        */
        $container->bind(UserRepositoryInterface::class, function () {
            return new UserRepository();
        });

        /*
        |--------------------------------------------------------------------------
        | Auth Service
        |--------------------------------------------------------------------------
        */
        $container->bind(AuthService::class, function ($container) {
            return new AuthService(
                $container->resolve(UserRepositoryInterface::class),
                $container->resolve(AuditLogger::class),
                $container->resolve(MasterService::class)
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Master Repository
        |--------------------------------------------------------------------------
        */
        $container->bind(MasterRepositoryInterface::class, function () {
            return new MasterRepository();
        });

        /*
        |--------------------------------------------------------------------------
        | Master Service
        |--------------------------------------------------------------------------
        */
        $container->bind(MasterService::class, function ($container) {
            return new MasterService(
                $container->resolve(MasterRepositoryInterface::class)
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Middleware
        |--------------------------------------------------------------------------
        */
        $container->bind(AuthMiddleware::class, fn() => new AuthMiddleware());
        $container->bind(GuestMiddleware::class, fn() => new GuestMiddleware());
        $container->bind(RateLimitMiddleware::class, fn() => new RateLimitMiddleware());

        /*
        |--------------------------------------------------------------------------
        | Audit Logger
        |--------------------------------------------------------------------------
        */
        $container->bind(AuditLogger::class, function () {
            return new AuditLogger(Database::getConnection());
        });

        /*
        |--------------------------------------------------------------------------
        | Password Reset (OTP FLOW)
        |--------------------------------------------------------------------------
        */

        $container->bind(PasswordResetRepositoryInterface::class, function () {
            return new PasswordResetRepository();
        });

        $container->bind(PasswordResetService::class, function ($container) {
            return new PasswordResetService(
                $container->resolve(UserRepositoryInterface::class),
                $container->resolve(PasswordResetRepositoryInterface::class),
                $container->resolve(EmailService::class),
                $container->resolve(AuditLogger::class)
            );
        });

        $container->bind(PasswordResetController::class, function ($container) {
            return new PasswordResetController(
                $container->resolve(PasswordResetService::class)
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Mail
        |--------------------------------------------------------------------------
        */
        $container->bind(Mailer::class, fn() => new Mailer());

        $container->bind(EmailService::class, function ($container) {
            return new EmailService(
                $container->resolve(Mailer::class)
            );
        });

        return $container;
    }
}