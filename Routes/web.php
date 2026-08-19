<?php

use App\Home\Presentation\Controllers\HomeController;
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Presentation\Controllers\PasswordResetController;
use App\User\Presentation\Controllers\ProfileController;
use App\Club\Presentation\Controllers\UserClubController;
use App\Admin\Dashboard\Presentation\Controllers\DashboardController;
use App\Admin\RBAC\Presentation\Controllers\RolePermissionController;
use App\Admin\UserManagement\Infrastructure\Persistence\UserManagementRepository;
use App\Admin\UserManagement\Presentation\Controllers\UserManagementController;
use App\Club\Presentation\Controllers\AdminClubController;
use App\Membership\Presentation\Controllers\MembershipController;
use App\Membership\Presentation\Controllers\AdminMembershipController;
use App\Shared\Middleware\AuthMiddleware;
use App\Shared\Middleware\GuestMiddleware;
use App\Shared\Middleware\RoleMiddleware;
use App\Event\Presentation\Controllers\EventController;
use App\Event\Presentation\Controllers\AdminEventController;
use App\Announcement\Presentation\Controllers\AdminAnnouncementController;
use App\Announcement\Presentation\Controllers\AnnouncementController;
use App\EventFeedback\Presentation\Controllers\EventFeedbackController;
use App\EventFeedback\Presentation\Controllers\AdminEventFeedbackController;
use App\Contact\Presentation\Controllers\ContactController;
use App\Contact\Presentation\Controllers\AdminContactController;
use App\Shared\Middleware\PermissionMiddleware;
use App\Shared\Middleware\AdminMiddleware;
use App\Shared\Middleware\ClubManagerMiddleware;
use App\Notification\Presentation\Controllers\NotificationController;
use App\Admin\Settings\Security\Presentation\Controllers\SecuritySettingController;
use App\Admin\Settings\General\Presentation\Controllers\GeneralSettingController;
use App\Payment\Presentation\Controllers\StudentPaymentController;
use App\Payment\Presentation\Controllers\AdminPaymentController;
use App\Shared\Presentation\Controllers\MaintenanceController;
use App\EventAttendance\Presentation\Controllers\AdminEventAttendanceController;
use App\EventAttendance\Presentation\Controllers\EventAttendanceController;
use App\EventCertificate\Presentation\Controllers\EventCertificateController;
use App\EventCertificate\Presentation\Controllers\AdminEventCertificateController;
use App\PaymentAccount\Presentation\Controllers\AdminPaymentAccountController;
use App\FAQ\Presentation\Controllers\FaqController;

$router->get(
    '/faq',
    [FaqController::class, 'index']
);


$router->get(
    '/maintenance',
    [
        MaintenanceController::class,
        'index'
    ]
);

//Home
$router->get(
    '/dashboard',
    [HomeController::class, 'index'],
    [
        AuthMiddleware::class,
    ]
);

// ADMIN DASHBOARD
$router->get(
    '/admin/dashboard',
    [DashboardController::class, 'index'],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'admin.dashboard'
        ]
    ]
);

//AUTH (GUEST ONLY)
$router->get(
    '/login',
    [AuthController::class, 'showLogin'],
    [GuestMiddleware::class]
);

$router->post(
    '/login',
    [AuthController::class, 'login'],
    [GuestMiddleware::class]
);

$router->get(
    '/register',
    [AuthController::class, 'showRegister'],
    [GuestMiddleware::class]
);

$router->post(
    '/register',
    [AuthController::class, 'register'],
    [GuestMiddleware::class]
);

//LOGOUT (AUTH ONLY)
$router->get(
    '/logout',
    [AuthController::class, 'logout'],
    [AuthMiddleware::class]
);

// STEP Forgot Password form
$router->get(
    '/forgot-password',
    [PasswordResetController::class, 'showForgotPassword'],
    [GuestMiddleware::class]
);

// STEP Send OTP
$router->post(
    '/forgot-password',
    [PasswordResetController::class, 'forgotPassword'],
    [GuestMiddleware::class]
);

// STEP Show OTP verification page
$router->get(
    '/verify-otp',
    [PasswordResetController::class, 'showVerifyOtp'],
    [GuestMiddleware::class]
);

// STEP Verify OTP
$router->post(
    '/verify-otp',
    [PasswordResetController::class, 'verifyOtp'],
    [GuestMiddleware::class]
);

// STEP Show reset password page
$router->get(
    '/reset-password',
    [PasswordResetController::class, 'showResetPassword'],
    [GuestMiddleware::class]
);

// Reset password
$router->post(
    '/reset-password',
    [PasswordResetController::class, 'resetPassword'],
    [GuestMiddleware::class]
);

$router->get(
    '/password-reset-success',
    [PasswordResetController::class, 'showSuccess']
);

// notification


$router->get(
    '/notifications',
    [
        NotificationController::class,
        'index'
    ]
);


$router->get(
    '/notifications/read/{id}',
    [
        NotificationController::class,
        'read'
    ]
);


$router->get(
    '/notifications/read-all',
    [
        NotificationController::class,
        'readAll'
    ]
);

$router->get(
    '/notifications/unread-count',
    [
        NotificationController::class,
        'unreadCount'
    ]
);



$router->get(
    '/notifications/latest',
    [
        NotificationController::class,
        'latest'
    ]
);

// ADMIN USER MANAGEMENT

$router->get(
    '/admin/users',
    [
        UserManagementController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'users.view'
        ]
    ]
);

$router->get(
    '/admin/users/{id}',
    [
        UserManagementController::class,
        'show'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'users.view'
        ]
    ]
);

$router->get(
    '/admin/users/{id}/edit',
    [
        UserManagementController::class,
        'edit'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'users.update'
        ]
    ]
);

$router->post(
    '/admin/users/{id}/update',
    [
        UserManagementController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'users.update'
        ]
    ]
);

$router->post(
    '/admin/users/{id}/delete',
    [
        UserManagementController::class,
        'delete'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'users.delete'
        ]
    ]
);

// Payment


// Payment Form

$router->get(
    '/payments/create/{clubId}',
    [
        StudentPaymentController::class,
        'create'
    ]
);



// Submit Payment

$router->post(
    '/payments/store',
    [
        StudentPaymentController::class,
        'store'
    ]
);



// Payment History

$router->get(
    '/payments/history',
    [
        StudentPaymentController::class,
        'history'
    ]
);



// Payment Detail

$router->get(
    '/payments/{id}',
    [
        StudentPaymentController::class,
        'show'
    ]
);


// Payment Management

$router->get(
    '/admin/payments',
    [
        AdminPaymentController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'payment.view'
        ]
    ]

);



// Payment Detail

$router->get(
    '/admin/payments/{id}',
    [
        AdminPaymentController::class,
        'show'
    ]
);



// Verify Payment

$router->post(
    '/admin/payments/{id}/verify',
    [
        AdminPaymentController::class,
        'verify'
    ]
);



// Reject Payment

$router->post(
    '/admin/payments/{id}/reject',
    [
        AdminPaymentController::class,
        'reject'
    ]
);


// Payment Account Management



$router->get(

    '/admin/payment-accounts',

    [

        AdminPaymentAccountController::class,

        'index'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.view'
        ]

    ]

);





$router->get(

    '/admin/payment-accounts/create',

    [

        AdminPaymentAccountController::class,

        'create'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.create'
        ]

    ]

);





$router->post(

    '/admin/payment-accounts/store',

    [

        AdminPaymentAccountController::class,

        'store'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.create'
        ]

    ]

);





$router->get(

    '/admin/payment-accounts/{id}/edit',

    [

        AdminPaymentAccountController::class,

        'edit'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.update'
        ]

    ]

);





$router->post(

    '/admin/payment-accounts/{id}/update',

    [

        AdminPaymentAccountController::class,

        'update'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.update'
        ]

    ]

);





$router->post(

    '/admin/payment-accounts/{id}/delete',

    [

        AdminPaymentAccountController::class,

        'delete'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'payment.account.delete'
        ]

    ]

);


// Club Management

$router->get(
    '/admin/clubs',
    [
        AdminClubController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'clubs.view'
        ]

    ]
);


$router->get(
    '/admin/clubs/create',
    [
        AdminClubController::class,
        'create'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'clubs.create'
        ]
    ]
);


$router->post(
    '/admin/clubs/store',
    [
        AdminClubController::class,
        'store'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'clubs.update'
        ]
    ]
);


$router->get(
    '/admin/clubs/{id}',
    [
        AdminClubController::class,
        'show'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'clubs.view'
        ]
    ]
);


$router->get(
    '/admin/clubs/{id}/edit',
    [
        AdminClubController::class,
        'edit'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'clubs.update'
        ]
    ]
);


$router->post(
    '/admin/clubs/{id}/update',
    [
        AdminClubController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'clubs.update'
        ]
    ]
);


$router->post(
    '/admin/clubs/{id}/delete',
    [
        AdminClubController::class,
        'delete'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'clubs.delete'
        ]
    ]
);




// User Club

$router->get(
    '/clubs',
    [
        UserClubController::class,
        'index'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->get(
    '/clubs/{id}',
    [
        UserClubController::class,
        'show'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->post(
    '/clubs/{id}/join',
    [
        UserClubController::class,
        'join'
    ]
);

// Membership

$router->post(
    '/clubs/{id}/join',
    [
        MembershipController::class,
        'join'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->get(
    '/my-clubs',
    [
        MembershipController::class,
        'myClubs'
    ],
    [
        AuthMiddleware::class
    ]
);


$router->get(
    '/admin/memberships',
    [
        AdminMembershipController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'memberships.view'
        ]
    ]
);

$router->get(
    '/admin/memberships/{id}/edit-role',
    [
        AdminMembershipController::class,
        'editRole'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'memberships.update'
        ]
    ]
);

$router->post(
    '/admin/memberships/{id}/remove',
    [
        AdminMembershipController::class,
        'remove'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'memberships.delete'
        ]
    ]
);

$router->post(
    '/admin/memberships/update-role',
    [
        AdminMembershipController::class,
        'updateRole'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'memberships.update'
        ]
    ]
);

$router->get(
    '/admin/clubs/{id}/members',
    [
        AdminMembershipController::class,
        'members'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'memberships.view'
        ]
    ]
);


$router->post(
    '/membership/{id}/leave',
    [
        MembershipController::class,
        'leave'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->post(
    '/admin/memberships/{id}/approve',
    [
        AdminMembershipController::class,
        'approve'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'memberships.approve'
        ]
    ]
);


$router->post(
    '/admin/memberships/{id}/reject',
    [
        AdminMembershipController::class,
        'reject'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'memberships.reject'
        ]
    ]
);

// Event

$router->get(
    '/events',
    [
        EventController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

    ]
);

$router->get(
    '/events/{id}',
    [
        EventController::class,
        'show'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->post(
    '/events/{id}/register',
    [
        EventController::class,
        'register'
    ],
    [
        AuthMiddleware::class
    ]
);


$router->post(
    '/events/{id}/cancel',
    [
        EventController::class,
        'cancelRegistration'
    ],
    [
        AuthMiddleware::class
    ]
);

$router->get(
    '/admin/events',
    [
        AdminEventController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'events.view'
        ]
    ]
);

$router->get(
    '/admin/events/create',
    [
        AdminEventController::class,
        'create'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.create'
        ]
    ]
);


$router->post(
    '/admin/events/store',
    [
        AdminEventController::class,
        'store'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.update'
        ]
    ]
);

$router->get(
    '/admin/events/{id}/edit',
    [
        AdminEventController::class,
        'edit'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.update'
        ]
    ]
);



$router->post(
    '/admin/events/{id}/update',
    [
        AdminEventController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.update'
        ]
    ]
);

$router->get(
    '/admin/events/{id}/show',
    [
        AdminEventController::class,
        'show'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.view'
        ]
    ]
);

$router->post(
    '/admin/events/{id}/delete',
    [
        AdminEventController::class,
        'delete'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.delete'
        ]
    ]
);

$router->get(
    '/admin/events/{id}/registrations',
    [
        AdminEventController::class,
        'registrations'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.registration.view'
        ]
    ]
);

$router->post(
    '/admin/events/registrations/{id}/approve',
    [
        AdminEventController::class,
        'approveRegistration'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.registration.approve'
        ]
    ]
);


$router->post(
    '/admin/events/registrations/{id}/reject',
    [
        AdminEventController::class,
        'rejectRegistration'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'events.registration.reject'
        ]
    ]
);

// certificate


$router->get(

    '/certificates',

    [
        EventCertificateController::class,
        'index'
    ]

);



$router->get(

    '/certificates/{id}/download',

    [
        EventCertificateController::class,
        'download'
    ]

);


$router->get(

    '/admin/events/{id}/certificates',

    [
        AdminEventCertificateController::class,
        'index'
    ]

);



$router->post(

    '/admin/events/{id}/certificates/generate',

    [
        AdminEventCertificateController::class,
        'generate'
    ]

);

$router->post(

    '/admin/events/{id}/certificates/generate-all',

    [

        AdminEventCertificateController::class,

        'generateAll'

    ]

);

$router->get(
    '/admin/certificates/{id}/download',
    [
        AdminEventCertificateController::class,
        'download'
    ]
);


// feedback

$router->get(

    '/events/{id}/feedback',

    [

        EventFeedbackController::class,

        'create'

    ],

    [

        AuthMiddleware::class

    ]

);



$router->post(

    '/events/{id}/feedback',

    [

        EventFeedbackController::class,

        'store'

    ],

    [

        AuthMiddleware::class

    ]

);

$router->get(

    '/admin/feedbacks',

    [

        AdminEventFeedbackController::class,

        'index'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'feedbacks.view'
        ]

    ]

);

$router->get(

    '/admin/events/{id}/feedbacks',

    [

        AdminEventFeedbackController::class,

        'eventFeedback'

    ],

    [

        AuthMiddleware::class,

        [

            PermissionMiddleware::class,

            'feedbacks.view'

        ]

    ]

);



$router->post(

    '/admin/feedbacks/{id}/delete',

    [

        AdminEventFeedbackController::class,

        'delete'

    ],

    [

        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'feedbacks.delete'
        ]

    ]

);

// Admin Event Attendance

$router->get(

    '/admin/events/{id}/attendance',

    [

        AdminEventAttendanceController::class,

        'index'

    ]

);



$router->post(

    '/admin/events/{id}/attendance/store',

    [

        AdminEventAttendanceController::class,

        'store'

    ]

);



$router->post(

    '/admin/events/{id}/attendance/update',

    [

        AdminEventAttendanceController::class,

        'update'

    ]

);
/*
|--------------------------------------------------------------------------
| Student Attendance
|--------------------------------------------------------------------------
*/


$router->get(

    '/attendance/history',

    [

        EventAttendanceController::class,

        'history'

    ]

);

/**
 * Admin Announcement Routes
 */


$router->get(
    '/admin/announcements',
    [
        AdminAnnouncementController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.view'
        ]
    ]
);


$router->get(
    '/admin/announcements/create',
    [
        AdminAnnouncementController::class,
        'create'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.create'
        ]
    ]
);


$router->post(
    '/admin/announcements/store',
    [
        AdminAnnouncementController::class,
        'store'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.update'
        ]
    ]
);


$router->get(
    '/admin/announcements/{id}',
    [
        AdminAnnouncementController::class,
        'show'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.view'
        ]
    ]
);


$router->get(
    '/admin/announcements/{id}/edit',
    [
        AdminAnnouncementController::class,
        'edit'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.update'
        ]
    ]
);


$router->post(
    '/admin/announcements/{id}/update',
    [
        AdminAnnouncementController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.update'
        ]
    ]
);


$router->post(
    '/admin/announcements/{id}/delete',
    [
        AdminAnnouncementController::class,
        'delete'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'announcements.delete'
        ]
    ]
);



/**
 * Student Announcement Routes
 */


$router->get(
    '/announcements',
    [
        AnnouncementController::class,
        'index'
    ],
    [
        AuthMiddleware::class
    ]
);


$router->get(
    '/announcements/{id}',
    [
        AnnouncementController::class,
        'show'
    ],
    [
        AuthMiddleware::class
    ]
);

// contact


$router->get(

    '/contact',

    [

        ContactController::class,

        'index'

    ]

);


$router->post(

    '/contact/send',

    [

        ContactController::class,

        'send'

    ]

);

$router->get(
    '/admin/contacts',
    [
        AdminContactController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'contacts.view'
        ]
    ]
);

$router->get(
    '/admin/contacts/{id}',
    [
        AdminContactController::class,
        'show'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'contacts.view'
        ]
    ]
);


$router->post(
    '/admin/contacts/{id}/status',
    [
        AdminContactController::class,
        'updateStatus'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'contacts.update'
        ]
    ]
);

$router->post(
    '/admin/contacts/{id}/delete',
    [
        AdminContactController::class,
        'delete'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'contacts.delete'
        ]
    ]
);


$router->get(
    '/profile',
    [ProfileController::class, 'show'],
    [AuthMiddleware::class]
);

$router->get(
    '/profile/edit',
    [ProfileController::class, 'edit'],
    [AuthMiddleware::class]
);

$router->post(
    '/profile/update',
    [ProfileController::class, 'update'],
    [AuthMiddleware::class]
);

$router->get('/profile/change-password', [
    ProfileController::class,
    'changePasswordForm'
]);

$router->post('/profile/change-password', [
    ProfileController::class,
    'changePassword'
]);

// RBAC SETTINGS


$router->get(
    '/admin/settings/roles',
    [
        RolePermissionController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'rbac.manage'
        ]
    ]
);



$router->get(
    '/admin/settings/roles/{id}/permissions',
    [
        RolePermissionController::class,
        'permissions'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'rbac.manage'
        ]
    ]
);



$router->post(
    '/admin/settings/roles/{id}/permissions',
    [
        RolePermissionController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'rbac.manage'
        ]
    ]
);

$router->get(
    '/admin/users',
    [UserManagementController::class, 'search'],
    // [AuthMiddleware::class]
);

$router->get(
    '/admin/settings/general',
    [
        GeneralSettingController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'settings.general.view'
        ]
    ]
);



$router->post(
    '/admin/settings/general/update',
    [
        GeneralSettingController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'settings.general.update'
        ]
    ]
);


// SECURITY SETTINGS

$router->get(
    '/admin/settings/security',
    [
        SecuritySettingController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'settings.security.view'
        ]
    ]
);


$router->post(
    '/admin/settings/security/update',
    [
        SecuritySettingController::class,
        'update'
    ],
    [
        AuthMiddleware::class,
        [
            PermissionMiddleware::class,
            'settings.security.update'
        ]
    ]
);

$router->get(
    '/admin/audit-logs',
    [
        \App\Audit\Presentation\Controllers\AuditController::class,
        'index'
    ],
    [
        AuthMiddleware::class,

        [
            PermissionMiddleware::class,
            'audit.view'
        ]
    ]
);
