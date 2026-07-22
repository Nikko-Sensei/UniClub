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

use App\Shared\Presentation\Controllers\MaintenanceController;


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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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

$router->get(
    '/admin/memberships',
    [
        AdminMembershipController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
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
    '/admin/memberships/{id}/edit-role',
    [
        AdminMembershipController::class,
        'editRole'
    ],
    [
        AdminMiddleware::class
    ]
);

$router->post(
    '/admin/memberships/{id}/remove',
    [
        AdminMembershipController::class,
        'remove'
    ],
    [
        AdminMiddleware::class
    ]
);

$router->post(
    '/admin/memberships/update-role',
    [
        AdminMembershipController::class,
        'updateRole'
    ],
    [
        AdminMiddleware::class
    ]
);

$router->get(
    '/admin/clubs/{id}/members',
    [
        AdminMembershipController::class,
        'members'
    ],
    [
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        AdminMiddleware::class
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
        RoleMiddleware::class
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
        RoleMiddleware::class
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
        RoleMiddleware::class
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

        RoleMiddleware::class

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

        RoleMiddleware::class

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
        RoleMiddleware::class
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
        RoleMiddleware::class
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
    ]
);

$router->get(
    '/admin/contacts/{id}',
    [
        AdminContactController::class,
        'show'
    ]
);


$router->post(
    '/admin/contacts/{id}/status',
    [
        AdminContactController::class,
        'updateStatus'
    ]
);

$router->post(
    '/admin/contacts/{id}/delete',
    [
        AdminContactController::class,
        'delete'
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
        RoleMiddleware::class
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
        RoleMiddleware::class
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
    ]
);
