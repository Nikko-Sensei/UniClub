<?php

namespace App;

use App\Shared\Container\Container;

// Home
use App\Home\Presentation\Controllers\HomeController;
use App\Home\Domain\Repository\HomeRepositoryInterface;
use App\Home\Infrastructure\Persistence\HomeRepository;
use App\Home\Application\Services\HomeService;


// Auditlog + DB
use App\Shared\Logging\AuditLogger;
use App\Shared\Database\Database;
use App\Audit\Domain\Repository\AuditRepositoryInterface;
use App\Audit\Infrastructure\Persistence\AuditRepository;
use App\Audit\Application\Services\AuditService;
use App\Audit\Presentation\Controllers\AuditController;

// Auth
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Application\Services\AuthService;
use App\Auth\Application\Services\PasswordPolicyService;
use App\Auth\Application\Validators\PasswordPolicyValidator;
use App\Auth\Application\Validators\RegisterValidator;

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

// Payment
use App\Payment\Domain\Repository\PaymentRepositoryInterface;
use App\Payment\Infrastructure\Persistence\PaymentRepository;
use App\Payment\Application\Services\PaymentService;
use App\Payment\Application\Validators\PaymentValidator;
use App\Payment\Presentation\Controllers\StudentPaymentController;
use App\Payment\Presentation\Controllers\AdminPaymentController;

// PaymentAccount

use App\PaymentAccount\Domain\Repository\PaymentAccountRepositoryInterface;
use App\PaymentAccount\Infrastructure\Persistence\PaymentAccountRepository;
use App\PaymentAccount\Application\Services\PaymentAccountService;
use App\PaymentAccount\Application\Validators\PaymentAccountValidator;
use App\PaymentAccount\Presentation\Controllers\AdminPaymentAccountController;

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

// EventAttendance

use App\EventAttendance\Domain\Repository\EventAttendanceRepositoryInterface;
use App\EventAttendance\Infrastructure\Persistence\EventAttendanceRepository;
use App\EventAttendance\Application\Services\EventAttendanceService;
use App\EventAttendance\Presentation\Controllers\AdminEventAttendanceController;
use App\EventAttendance\Presentation\Controllers\EventAttendanceController;

// EventCertificate

use App\EventCertificate\Domain\Repository\EventCertificateRepositoryInterface;
use App\EventCertificate\Infrastructure\Persistence\EventCertificateRepository;
use App\EventCertificate\Application\Services\EventCertificateService;
use App\EventCertificate\Application\Services\CertificatePdfService;
use App\EventCertificate\Presentation\Controllers\EventCertificateController;
use App\EventCertificate\Presentation\Controllers\AdminEventCertificateController;

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
use App\Shared\Middleware\MaintenanceMiddleware;

// Password Reset (OTP FLOW)
use App\Auth\Application\Services\PasswordResetService;
use App\Auth\Presentation\Controllers\PasswordResetController;
use App\Auth\Domain\Repository\PasswordResetRepositoryInterface;
use App\Auth\Infrastructure\Persistence\PasswordResetRepository;
use App\Auth\Application\Validators\ResetPasswordValidator;
use App\Auth\Application\Validators\ForgotPasswordValidator;
use App\Auth\Application\Validators\VerifyOtpValidator;

// General
use App\Admin\Settings\General\Presentation\Controllers\GeneralSettingController;
use App\Admin\Settings\General\Application\Services\GeneralSettingService;
use App\Admin\Settings\General\Domain\Repository\GeneralSettingRepositoryInterface;
use App\Admin\Settings\General\Infrastructure\Persistence\GeneralSettingRepository;


// Security Settings

use App\Admin\Settings\Security\Presentation\Controllers\SecuritySettingController;
use App\Admin\Settings\Security\Application\Services\SecuritySettingService;
use App\Admin\Settings\Security\Domain\Repository\SecuritySettingRepositoryInterface;
use App\Admin\Settings\Security\Infrastructure\Persistence\SecuritySettingRepository;
use App\Shared\Helpers\SecuritySettingHelper;

// Mail
use App\Shared\Mail\Mailer;
use App\Shared\Mail\EmailService;

// Login Attempt
use App\Auth\Domain\Repository\LoginAttemptRepositoryInterface;
use App\Auth\Infrastructure\Persistence\LoginAttemptRepository;
use App\Auth\Application\Services\LoginProtectionService;

// Notification

use App\Notification\Domain\Repository\NotificationRepositoryInterface;
use App\Notification\Infrastructure\Persistence\NotificationRepository;
use App\Notification\Application\Services\NotificationService;
use App\Notification\Presentation\Controllers\NotificationController;

use App\Shared\Presentation\Controllers\MaintenanceController;

class Bootstrap
{
    public static function create(): Container
    {
        $container = new Container();


        // Maintenance

        $container->bind(
            MaintenanceController::class,
            function ($container) {

                return new MaintenanceController();
            }
        );

        // Home Controller

        $container->bind(
            HomeRepositoryInterface::class,
            function () {

                return new HomeRepository();
            }
        );

        $container->bind(
            HomeService::class,
            function ($container) {

                return new HomeService(
                    $container->resolve(
                        HomeRepositoryInterface::class
                    )
                );
            }
        );
        $container->bind(
            HomeController::class,
            function ($container) {

                return new HomeController(
                    $container->resolve(
                        HomeService::class
                    )
                );
            }
        );

        //Auth Controller
        $container->bind(AuthController::class, function ($container) {
            return new AuthController(
                $container->resolve(AuthService::class),
                $container->resolve(MasterService::class),
                $container->resolve(RateLimitMiddleware::class),
                $container->resolve(SecuritySettingHelper::class),
                $container->resolve(RegisterValidator::class)
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
                $container->resolve(MasterService::class),
                $container->resolve(LoginProtectionService::class)

            );
        });

        //  PasswordPolicyService
        $container->bind(
            PasswordPolicyService::class,
            function ($container) {

                return new PasswordPolicyService(

                    $container->resolve(
                        SecuritySettingHelper::class
                    )

                );
            }
        );

        // Password Policy Validator

        $container->bind(
            PasswordPolicyValidator::class,
            function ($container) {

                return new PasswordPolicyValidator(

                    $container->resolve(
                        PasswordPolicyService::class
                    )

                );
            }
        );

        // ResetPasswordValidator

        $container->bind(
            ResetPasswordValidator::class,
            function ($container) {

                return new ResetPasswordValidator(

                    $container->resolve(
                        PasswordPolicyValidator::class
                    )

                );
            }
        );

        $container->bind(
            ForgotPasswordValidator::class,
            function () {

                return new ForgotPasswordValidator();
            }
        );


        $container->bind(
            VerifyOtpValidator::class,
            function () {

                return new VerifyOtpValidator();
            }
        );

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
                    ),
                    $container->resolve(
                        PaymentService::class
                    )

                );
            }
        );

        // Payment


        // Payment Repository

        $container->bind(
            PaymentRepositoryInterface::class,
            function () {

                return new PaymentRepository();
            }
        );


        // Payment Validator

        $container->bind(
            PaymentValidator::class,
            function () {

                return new PaymentValidator();
            }
        );


        // Payment Service

        $container->bind(
            PaymentService::class,
            function ($container) {

                return new PaymentService(

                    $container->resolve(
                        PaymentRepositoryInterface::class
                    ),

                    $container->resolve(
                        PaymentValidator::class
                    ),
                    $container->resolve(
                        NotificationService::class
                    ),

                    $container->resolve(
                        UserService::class
                    ),

                    $container->resolve(
                        AuditLogger::class
                    )


                );
            }
        );


        // Student Payment Controller

        $container->bind(
            StudentPaymentController::class,
            function ($container) {

                return new StudentPaymentController(

                    $container->resolve(
                        PaymentService::class
                    ),
                    $container->resolve(
                        MembershipService::class
                    ),
                    $container->resolve(
                        ClubService::class
                    ),
                    $container->resolve(
                        PaymentAccountService::class
                    )

                );
            }
        );


        // Admin Payment Controller

        $container->bind(
            AdminPaymentController::class,
            function ($container) {

                return new AdminPaymentController(

                    $container->resolve(
                        PaymentService::class
                    )

                );
            }
        );


        // payment account

        /**
         * Payment Account Repository
         */
        $container->bind(

            PaymentAccountRepositoryInterface::class,

            function ($container) {

                return new PaymentAccountRepository();
            }

        );





        /**
         * Payment Account Validator
         */
        $container->bind(

            PaymentAccountValidator::class,

            function ($container) {

                return new PaymentAccountValidator();
            }

        );





        /**
         * Payment Account Service
         */
        $container->bind(

            PaymentAccountService::class,

            function ($container) {


                return new PaymentAccountService(


                    $container->resolve(

                        PaymentAccountRepositoryInterface::class

                    ),



                    $container->resolve(

                        PaymentAccountValidator::class

                    )


                );
            }

        );





        /**
         * Admin Payment Account Controller
         */
        $container->bind(

            AdminPaymentAccountController::class,

            function ($container) {


                return new AdminPaymentAccountController(


                    $container->resolve(

                        PaymentAccountService::class

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
                    ),
                    $container->resolve(
                        NotificationService::class
                    ),

                    $container->resolve(
                        UserService::class
                    ),
                    $container->resolve(
                        AuditLogger::class
                    ),
                    $container->resolve(
                        ClubService::class
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
                    ),

                    $container->resolve(
                        NotificationService::class
                    ),
                    $container->resolve(AuditLogger::class)

                );
            }
        );

        $container->bind(
            EventController::class,
            function ($container) {

                return new EventController(

                    $container->resolve(
                        EventService::class
                    ),
                    $container->resolve(
                        ClubService::class
                    ),
                    $container->resolve(
                        MasterService::class
                    ),
                    $container->resolve(UserService::class),

                    $container->resolve(
                        EventAttendanceService::class
                    ),

                    $container->resolve(
                        EventCertificateService::class
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
                    ),
                    $container->resolve(EventAttendanceService::class)

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

                    ),
                    $container->resolve(

                        EventService::class

                    )


                );
            }

        );

        // EventAttendance

        $container->bind(

            EventAttendanceRepositoryInterface::class,

            function () {

                return new EventAttendanceRepository();
            }

        );

        $container->bind(

            EventAttendanceService::class,

            function ($container) {

                return new EventAttendanceService(


                    $container->resolve(
                        EventAttendanceRepositoryInterface::class
                    ),


                    $container->resolve(
                        EventService::class
                    )


                );
            }

        );

        $container->bind(

            AdminEventAttendanceController::class,

            function ($container) {

                return new AdminEventAttendanceController(

                    $container->resolve(
                        EventAttendanceService::class
                    ),
                    $container->resolve(
                        EventService::class
                    )

                );
            }

        );

        $container->bind(

            EventAttendanceController::class,

            function ($container) {

                return new EventAttendanceController(

                    $container->resolve(
                        EventAttendanceService::class
                    )

                );
            }

        );

        // EventCertificate

        $container->bind(

            EventCertificateRepositoryInterface::class,

            function () {

                return new EventCertificateRepository();
            }

        );

        $container->bind(

            CertificatePdfService::class,

            function ($container) {

                return new CertificatePdfService();
            }

        );

        $container->bind(

            EventCertificateService::class,

            function ($container) {

                return new EventCertificateService(


                    $container->resolve(
                        EventCertificateRepositoryInterface::class
                    ),

                    $container->resolve(
                        EventService::class
                    ),

                    $container->resolve(
                        EventAttendanceService::class
                    ),

                    $container->resolve(
                        UserService::class
                    )


                );
            }

        );

        $container->bind(

            EventCertificateController::class,

            function ($container) {

                return new EventCertificateController(

                    $container->resolve(
                        EventCertificateService::class
                    )

                );
            }

        );

        $container->bind(

            AdminEventCertificateController::class,

            function ($container) {

                return new AdminEventCertificateController(

                    $container->resolve(
                        EventCertificateService::class
                    ),
                    $container->resolve(
                        EventService::class
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
                    ),


                    $container->resolve(
                        NotificationService::class
                    ),


                    $container->resolve(
                        UserService::class
                    ),

                    $container->resolve(
                        AuditLogger::class
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
                    ),
                    $container->resolve(
                        GeneralSettingService::class
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

        // =====================================================
        // General Settings
        // =====================================================


        // General Setting Repository

        $container->bind(

            GeneralSettingRepositoryInterface::class,

            function () {

                return new GeneralSettingRepository();
            }

        );



        // General Setting Service

        $container->bind(

            GeneralSettingService::class,

            function ($container) {

                return new GeneralSettingService(

                    $container->resolve(
                        GeneralSettingRepositoryInterface::class
                    )

                );
            }

        );



        // General Setting Controller

        $container->bind(

            GeneralSettingController::class,

            function ($container) {

                return new GeneralSettingController(

                    $container->resolve(
                        GeneralSettingService::class
                    )

                );
            }

        );

        // Security Setting

        // Security Setting Repository

        $container->bind(
            SecuritySettingRepositoryInterface::class,
            function () {

                return new SecuritySettingRepository();
            }
        );

        // Security Setting Service

        $container->bind(
            SecuritySettingService::class,
            function ($container) {

                return new SecuritySettingService(

                    $container->resolve(
                        SecuritySettingRepositoryInterface::class
                    ),
                    $container->resolve(
                        AuditLogger::class
                    )

                );
            }
        );

        // Security Setting Controller

        $container->bind(
            SecuritySettingController::class,
            function ($container) {

                return new SecuritySettingController(

                    $container->resolve(
                        SecuritySettingService::class
                    )

                );
            }
        );


        // SecuritySettingHelper

        $container->bind(
            SecuritySettingHelper::class,
            function ($container) {

                return new SecuritySettingHelper(

                    $container->resolve(
                        SecuritySettingService::class
                    )

                );
            }
        );

        // login Attempt

        $container->bind(
            LoginAttemptRepositoryInterface::class,
            function () {

                return new LoginAttemptRepository();
            }
        );



        $container->bind(
            LoginProtectionService::class,
            function ($container) {

                return new LoginProtectionService(

                    $container->resolve(
                        LoginAttemptRepositoryInterface::class
                    ),

                    $container->resolve(
                        SecuritySettingHelper::class
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
            function ($container) {

                return new RateLimitMiddleware(

                    $container->resolve(
                        SecuritySettingHelper::class
                    )

                );
            }
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

        $container->bind(
            MaintenanceMiddleware::class,
            function ($container) {

                return new MaintenanceMiddleware(

                    $container->resolve(
                        SecuritySettingService::class
                    )

                );
            }
        );

        $container->bind(
            MaintenanceMiddleware::class,
            function ($container) {

                return new MaintenanceMiddleware(

                    $container->resolve(
                        SecuritySettingHelper::class
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

        $container->bind(
            PasswordResetController::class,
            function ($container) {

                return new PasswordResetController(

                    $container->resolve(
                        PasswordResetService::class
                    ),

                    $container->resolve(
                        SecuritySettingHelper::class
                    ),

                    $container->resolve(
                        ForgotPasswordValidator::class
                    ),

                    $container->resolve(
                        VerifyOtpValidator::class
                    ),

                    $container->resolve(
                        ResetPasswordValidator::class
                    )

                );
            }
        );

        //Mail
        $container->bind(Mailer::class, fn() => new Mailer());

        $container->bind(EmailService::class, function ($container) {
            return new EmailService(
                $container->resolve(Mailer::class)
            );
        });

        $container->bind(
            NotificationRepositoryInterface::class,
            function () {

                return new NotificationRepository();
            }
        );



        $container->bind(
            NotificationService::class,
            function ($container) {

                return new NotificationService(
                    $container->resolve(
                        NotificationRepositoryInterface::class
                    )
                );
            }
        );



        $container->bind(
            NotificationController::class,
            function ($container) {

                return new NotificationController(
                    $container->resolve(
                        NotificationService::class
                    )
                );
            }
        );

        $container->bind(
            RegisterValidator::class,
            function ($container) {

                return new RegisterValidator(

                    $container->resolve(
                        PasswordPolicyValidator::class
                    )

                );
            }
        );




        $container->bind(
            AuditRepositoryInterface::class,
            function () {

                return new AuditRepository();
            }
        );



        $container->bind(
            AuditService::class,
            function ($container) {

                return new AuditService(

                    $container->resolve(
                        AuditRepositoryInterface::class
                    )

                );
            }
        );

        $container->bind(
            AuditController::class,
            function ($container) {

                return new AuditController(

                    $container->resolve(
                        AuditService::class
                    )

                );
            }
        );

        return $container;
    }
}
