<?php

namespace App;

use App\Shared\Container\Container;

// Home
use App\Home\Presentation\Controllers\HomeController;

// Auditlog + DB
use App\Shared\Logging\AuditLogger;
use App\Shared\Database\Database;

// Auth
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Application\Services\AuthService;

// User
use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Infrastructure\Persistence\UserRepository;
use App\User\Application\Services\UserService;
use App\User\Presentation\Controllers\UserController;
use App\User\Presentation\Controllers\ProfileController;

// User Management
use App\Admin\UserManagement\Application\Services\UserManagementService;
use App\Admin\UserManagement\Presentation\Controllers\UserManagementController;
use App\Admin\UserManagement\Domain\Repository\UserManagementRepositoryInterface;
use App\Admin\UserManagement\Infrastructure\Persistence\UserManagementRepository;


// Club
use App\Club\Domain\Repository\ClubRepositoryInterface;
use App\Club\Infrastructure\Persistence\ClubRepository;
use App\Club\Application\Services\ClubService;
use App\Club\Application\Validators\ClubValidator;
use App\Club\Presentation\Controllers\AdminClubController;


// Dashboard
use App\Admin\Dashboard\Domain\Repository\DashboardRepositoryInterface;
use App\Admin\Dashboard\Infrastructure\Persistence\DashboardRepository;
use App\Admin\Dashboard\Application\Services\DashboardService;
use App\Admin\Dashboard\Presentation\Controllers\DashboardController;

// RBAC
use App\Admin\RBAC\Domain\Repositories\RoleRepositoryInterface;
use App\Admin\RBAC\Domain\Repositories\PermissionRepositoryInterface;
use App\Admin\RBAC\Infrastructure\Persistence\RoleRepository;
use App\Admin\RBAC\Infrastructure\Persistence\PermissionRepository;
use App\Admin\RBAC\Application\Services\PermissionService;
use App\Admin\RBAC\Domain\Repositories\RolePermissionRepositoryInterface;
use App\Admin\RBAC\Infrastructure\Persistence\RolePermissionRepository;
use App\Admin\RBAC\Application\Services\RolePermissionService;
use App\Admin\RBAC\Presentation\Controllers\RolePermissionController;


// Master
use App\Master\Application\Services\MasterService;
use App\Master\Domain\Repository\MasterRepositoryInterface;
use App\Master\Infrastructure\Persistence\MasterRepository;

// Middleware
use App\Shared\Middleware\AuthMiddleware;
use App\Shared\Middleware\GuestMiddleware;
use App\Shared\Middleware\RateLimitMiddleware;
use App\Shared\Middleware\RoleMiddleware;
use App\Shared\Middleware\PermissionMiddleware;

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

        // Home Controller

        $container->bind(HomeController::class, function () {
            return new HomeController();
        });

        //Auth Controller
        $container->bind(AuthController::class, function ($container) {
            return new AuthController(
                $container->resolve(AuthService::class),
                $container->resolve(MasterService::class),
                $container->resolve(RateLimitMiddleware::class)
            );
        });

        // User Controller
        $container->bind(UserController::class, function ($container) {
            return new UserController(
                $container->resolve(UserService::class)
            );
        });

        // profile controller
        $container->bind(ProfileController::class, function ($container) {
            return new ProfileController(
                $container->resolve(UserService::class)
            );
        });

        //User Repository
        $container->bind(UserRepositoryInterface::class, function () {
            return new UserRepository();
        });

        // Admin User Management Repository
        $container->bind(
            UserManagementRepositoryInterface::class,
            function () {
                return new UserManagementRepository();
            }
        );

        //Auth Service
        $container->bind(AuthService::class, function ($container) {
            return new AuthService(
                $container->resolve(UserRepositoryInterface::class),
                $container->resolve(AuditLogger::class),
                $container->resolve(MasterService::class)
            );
        });

        //User Service
        $container->bind(UserService::class, function ($container) {
            return new UserService(
                $container->resolve(UserRepositoryInterface::class),
                $container->resolve(MasterService::class)
            );
        });

        // User Management Service
        $container->bind(
            UserManagementService::class,
            function ($container) {

                return new UserManagementService(

                    $container->resolve(
                        UserManagementRepositoryInterface::class
                    )

                );
            }
        );

        // User Management Controller
        $container->bind(
            UserManagementController::class,
            function ($container) {

                return new UserManagementController(

                    $container->resolve(
                        UserManagementService::class
                    ),

                    $container->resolve(
                        MasterService::class
                    )

                );
            }
        );

        // Dashboard Repository
        $container->bind(
            DashboardRepositoryInterface::class,
            function () {
                return new DashboardRepository();
            }
        );

        // Dashboard Service
        $container->bind(
            DashboardService::class,
            function ($container) {
                return new DashboardService(
                    $container->resolve(DashboardRepositoryInterface::class)
                );
            }
        );

        // Dashboard Controller
        $container->bind(
            DashboardController::class,
            function ($container) {
                return new DashboardController(
                    $container->resolve(DashboardService::class)
                );
            }
        );

        // RBAC
        // Permission Repository

        $container->bind(
            PermissionRepositoryInterface::class,
            function () {

                return new PermissionRepository();
            }
        );

        // Role Repository

        $container->bind(
            RoleRepositoryInterface::class,
            function ($container) {

                return new RoleRepository(

                    $container->resolve(
                        PermissionRepositoryInterface::class
                    )

                );
            }
        );

        // RBAC Permission Service

        $container->bind(
            PermissionService::class,
            function ($container) {

                return new PermissionService(

                    $container->resolve(
                        RoleRepositoryInterface::class
                    )

                );
            }
        );

        // Role Permission Repository

        $container->bind(
            RolePermissionRepositoryInterface::class,
            function () {

                return new RolePermissionRepository();
            }
        );

        // Role Permission Service

        $container->bind(
            RolePermissionService::class,
            function ($container) {

                return new RolePermissionService(

                    $container->resolve(
                        RolePermissionRepositoryInterface::class
                    )

                );
            }
        );

        // RBAC Controller

        $container->bind(
            RolePermissionController::class,
            function ($container) {

                return new RolePermissionController(

                    $container->resolve(
                        RolePermissionService::class
                    ),

                    $container->resolve(
                        RoleRepositoryInterface::class
                    ),

                    $container->resolve(
                        PermissionRepositoryInterface::class
                    )

                );
            }
        );

        //Master Repository
        $container->bind(MasterRepositoryInterface::class, function () {
            return new MasterRepository();
        });

        //Master Service
        $container->bind(MasterService::class, function ($container) {
            return new MasterService(
                $container->resolve(MasterRepositoryInterface::class)
            );
        });

        // Club Repository
        $container->bind(
            ClubRepositoryInterface::class,
            function () {
                return new ClubRepository();
            }
        );

        // Club Validator
        $container->bind(
            ClubValidator::class,
            function () {
                return new ClubValidator();
            }
        );

        // Club Service
        $container->bind(
            ClubService::class,
            function ($container) {

                return new ClubService(

                    $container->resolve(
                        ClubRepositoryInterface::class
                    ),

                    $container->resolve(
                        ClubValidator::class
                    )

                );
            }
        );

        // AdminClub Controller
        $container->bind(
            AdminClubController::class,
            function ($container) {

                return new AdminClubController(

                    $container->resolve(
                        ClubService::class
                    ),

                    $container->resolve(
                        MasterService::class
                    )

                );
            }
        );

        // Middleware

        $container->bind(
            AuthMiddleware::class,
            fn() => new AuthMiddleware()
        );


        $container->bind(
            GuestMiddleware::class,
            fn() => new GuestMiddleware()
        );


        $container->bind(
            RateLimitMiddleware::class,
            fn() => new RateLimitMiddleware()
        );


        $container->bind(
            RoleMiddleware::class,
            fn() => new RoleMiddleware()
        );


        $container->bind(
            PermissionMiddleware::class,
            function ($container) {

                return new PermissionMiddleware(
                    $container->resolve(
                        PermissionService::class
                    )
                );
            }
        );

        //Audit Logger
        $container->bind(AuditLogger::class, function () {
            return new AuditLogger(Database::getConnection());
        });

        //Password Reset (OTP FLOW)

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

        //Mail
        $container->bind(Mailer::class, fn() => new Mailer());

        $container->bind(EmailService::class, function ($container) {
            return new EmailService(
                $container->resolve(Mailer::class)
            );
        });

        return $container;
    }
}