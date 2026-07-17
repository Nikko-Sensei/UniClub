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
use App\Shared\Application\Services\ImageUploadService;
use App\Club\Presentation\Controllers\UserClubController;

// Club Membership
use App\Membership\Domain\Repository\MembershipRepositoryInterface;
use App\Membership\Infrastructure\Persistence\MembershipRepository;
use App\Membership\Application\Services\MembershipService;
use App\Membership\Presentation\Controllers\MembershipController;
use App\Membership\Presentation\Controllers\AdminMembershipController;

// Event 
use App\Event\Domain\Repository\EventRepositoryInterface;
use App\Event\Infrastructure\Persistence\EventRepository;
use App\Event\Application\Services\EventService;
use App\Event\Presentation\Controllers\EventController;
use App\Event\Presentation\Controllers\AdminEventController;

// EventFeedback

use App\EventFeedback\Domain\Repository\EventFeedbackRepositoryInterface;
use App\EventFeedback\Infrastructure\Persistence\EventFeedbackRepository;
use App\EventFeedback\Application\Services\EventFeedbackService;
use App\EventFeedback\Presentation\Controllers\EventFeedbackController;
use App\EventFeedback\Presentation\Controllers\AdminEventFeedbackController;

// Anouncement

use App\Announcement\Domain\Repository\AnnouncementRepositoryInterface;
use App\Announcement\Infrastructure\Persistence\AnnouncementRepository;
use App\Announcement\Application\Services\AnnouncementService;
use App\Announcement\Presentation\Controllers\AdminAnnouncementController;
use App\Announcement\Presentation\Controllers\AnnouncementController;

// contact

use App\Contact\Domain\Repository\ContactRepositoryInterface;
use App\Contact\Infrastructure\Persistence\ContactRepository;
use App\Contact\Application\Services\ContactService;
use App\Contact\Presentation\Controllers\ContactController;
use App\Contact\Presentation\Controllers\AdminContactController;

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
use App\Shared\Helpers\PermissionHelper;


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
use App\Shared\Middleware\AdminMiddleware;
use App\Shared\Middleware\ClubManagerMiddleware;

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
                        PermissionRepositoryInterface::class
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


        $container->bind(
            PermissionHelper::class,
            function ($container) {

                return new PermissionHelper(

                    $container->resolve(
                        PermissionService::class
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

        // Shared Services

        $container->bind(
            ImageUploadService::class,
            function () {

                return new ImageUploadService();
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
                    ),

                    $container->resolve(
                        ImageUploadService::class
                    ),

                    $container->resolve(AuditLogger::class),

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

        // UserClubController

        $container->bind(
            UserClubController::class,
            function ($container) {

                return new UserClubController(

                    $container->resolve(
                        ClubService::class
                    ),

                    $container->resolve(
                        MembershipService::class
                    ),
                    $container->resolve(
                        MasterService::class
                    )

                );
            }
        );

        // Club Membership
        $container->bind(
            MembershipRepositoryInterface::class,
            function ($container) {

                return new MembershipRepository();
            }
        );

        // Menmbership service
        $container->bind(
            MembershipService::class,
            function ($container) {

                return new MembershipService(

                    $container->resolve(
                        MembershipRepositoryInterface::class
                    )

                );
            }
        );

        // Membership Controller
        $container->bind(
            MembershipController::class,
            function ($container) {

                return new MembershipController(

                    $container->resolve(
                        MembershipService::class
                    )

                );
            }
        );

        // AdminMembershipController

        $container->bind(
            AdminMembershipController::class,
            function ($container) {

                return new AdminMembershipController(
                    $container->resolve(
                        MembershipService::class
                    )
                );
            }
        );


        // Event

        $container->bind(
            EventRepositoryInterface::class,
            function ($container) {

                return new EventRepository();
            }
        );

        $container->bind(
            EventService::class,
            function ($container) {

                return new EventService(

                    $container->resolve(
                        EventRepositoryInterface::class
                    ),
                    $container->resolve(
                        ImageUploadService::class
                    )

                );
            }
        );

        $container->bind(
            EventController::class,
            function ($container) {

                return new EventController(

                    $container->resolve(
                        EventService::class
                    )

                );
            }
        );

        $container->bind(
            AdminEventController::class,
            function ($container) {

                return new AdminEventController(

                    $container->resolve(
                        EventService::class
                    ),
                    $container->resolve(
                        ClubService::class
                    ),
                    $container->resolve(
                        MasterService::class
                    )

                );
            }
        );

        // EventFeedback


        $container->bind(

            EventFeedbackRepositoryInterface::class,

            function () {

                return new EventFeedbackRepository();
            }

        );


        $container->bind(

            EventFeedbackService::class,

            function ($container) {


                return new EventFeedbackService(


                    $container->resolve(

                        EventFeedbackRepositoryInterface::class

                    ),


                    $container->resolve(

                        EventRepositoryInterface::class

                    )


                );
            }

        );

        $container->bind(

            EventFeedbackController::class,

            function ($container) {


                return new EventFeedbackController(


                    $container->resolve(

                        EventFeedbackService::class

                    )


                );
            }

        );

        $container->bind(

            AdminEventFeedbackController::class,

            function ($container) {


                return new AdminEventFeedbackController(


                    $container->resolve(

                        EventFeedbackService::class

                    )


                );
            }

        );

        // Anouncement


        $container->bind(
            AnnouncementRepositoryInterface::class,
            function () {

                return new AnnouncementRepository();
            }
        );

        $container->bind(
            AnnouncementService::class,
            function ($container) {

                return new AnnouncementService(

                    $container->resolve(
                        AnnouncementRepositoryInterface::class
                    )

                );
            }
        );


        $container->bind(
            AdminAnnouncementController::class,
            function ($container) {

                return new AdminAnnouncementController(

                    $container->resolve(
                        AnnouncementService::class
                    ),
                    $container->resolve(
                        ClubService::class
                    )

                );
            }
        );



        $container->bind(
            AnnouncementController::class,
            function ($container) {

                return new AnnouncementController(

                    $container->resolve(
                        AnnouncementService::class
                    )

                );
            }
        );

        // contact

        $container->bind(

            ContactRepositoryInterface::class,

            function () {

                return new ContactRepository();
            }

        );

        $container->bind(

            ContactService::class,

            function ($container) {


                return new ContactService(

                    $container->resolve(
                        ContactRepositoryInterface::class
                    )

                );
            }

        );


        $container->bind(

            ContactController::class,

            function ($container) {


                return new ContactController(

                    $container->resolve(
                        ContactService::class
                    )

                );
            }

        );


        $container->bind(

            AdminContactController::class,

            function ($container) {

                return new AdminContactController(

                    $container->resolve(
                        ContactService::class
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

        $container->bind(
            AdminMiddleware::class,
            fn() => new AdminMiddleware()
        );


        $container->bind(
            ClubManagerMiddleware::class,
            fn() => new ClubManagerMiddleware()
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
