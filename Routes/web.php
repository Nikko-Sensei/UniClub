<?php

use App\Home\Presentation\Controllers\HomeController;
use App\Auth\Presentation\Controllers\AuthController;
use App\Auth\Presentation\Controllers\PasswordResetController;
use App\User\Presentation\Controllers\ProfileController;
use App\User\Presentation\Controllers\UserController;
use App\Admin\Dashboard\Presentation\Controllers\DashboardController;
use App\Admin\RBAC\Presentation\Controllers\RolePermissionController;
use App\Admin\UserManagement\Infrastructure\Persistence\UserManagementRepository;
use App\Admin\UserManagement\Presentation\Controllers\UserManagementController;

use App\Shared\Middleware\AuthMiddleware;
use App\Shared\Middleware\GuestMiddleware;
use App\Shared\Middleware\RoleMiddleware;
use App\Shared\Middleware\PermissionMiddleware;

//Home
$router->get(
    '/dashboard',
    [HomeController::class, 'index']
);

// ADMIN DASHBOARD
$router->get(
    '/admin/dashboard',
    [DashboardController::class, 'index'],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
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

// ADMIN USER MANAGEMENT

$router->get(
    '/admin/users',
    [
        UserManagementController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
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
        RoleMiddleware::class
    ]
);


$router->post(
    '/admin/users/update-role',
    [
        UserManagementController::class,
        'updateRole'
    ],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
    ]
);


$router->post(
    '/admin/users/update-status',
    [
        UserManagementController::class,
        'updateStatus'
    ],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
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
]); // RBAC SETTINGS


$router->get(
    '/admin/settings/roles',
    [
        RolePermissionController::class,
        'index'
    ],
    [
        AuthMiddleware::class,
        RoleMiddleware::class
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
