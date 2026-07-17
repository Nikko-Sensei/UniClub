<?php

namespace App\Auth\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Auth\Application\Services\AuthService;
use App\Auth\Application\Validators\RegisterValidator;
use App\Auth\Application\Validators\LoginValidator;
use App\Shared\Core\Auth;
use App\Shared\Security\Csrf;
use App\Auth\Domain\Exceptions\AuthException;
use App\Auth\Domain\Exceptions\DuplicateStudentIdException;
use App\Auth\Domain\Exceptions\DuplicateEmailException;
use App\Auth\Domain\Exceptions\InvalidAcademicYearException;
use App\Auth\Domain\Exceptions\InvalidDepartmentException;
use Throwable;
use App\Master\Application\Services\MasterService;
use App\Shared\Middleware\RateLimitMiddleware;
use App\Shared\Helpers\Flash;

class AuthController extends BaseController
{
    private AuthService $authService;

    private MasterService $masterService;

    private RateLimitMiddleware $rateLimiter;

    public function __construct(
        AuthService $authService,
        MasterService $masterService,
        RateLimitMiddleware $rateLimiter
    ) {
        parent::__construct();

        $this->authService = $authService;
        $this->masterService = $masterService;
        $this->rateLimiter = $rateLimiter;
    }

    /**
     * Show Login Page
     */
    public function showLogin()
    {
        $this->view(
            'Auth/Presentation/Views/login',
            [
                'title' => 'Login',
                'csrf' => new Csrf(),
                'errors' => $_SESSION['errors'] ?? [],
                'success' => Flash::get('success'),
                'old' => $_SESSION['old'] ?? [],
                'redirect' => $_GET['redirect'] ?? ''
            ],
            'auth'
        );

        unset(
            $_SESSION['errors'],
            $_SESSION['old'],
            $_SESSION['otp_email'],
            $_SESSION['verified_email'],
            $_SESSION['verified_otp'],
            $_SESSION['old']
        );
    }

    /**
     * Login Process
     */
    public function login()
    {
        $key = $_SERVER['REMOTE_ADDR'];

        $this->rateLimiter->handle(
            $key,
            5,
            5
        );

        $validator = new LoginValidator();

        $data = $this->request->all();

        if (!$validator->validate($data)) {

            $_SESSION['errors'] = $validator->errors();

            $_SESSION['old'] = $data;

            return Response::redirect('/login');
        }

        $dto = $validator->getDTO($data);

        try {

            $user = $this->authService->login($dto);

            $this->rateLimiter->clear($key);
        } catch (AuthException $exception) {

            $this->rateLimiter->hit($key);

            $_SESSION['errors'] = [
                '_' => $exception->getMessage()
            ];

            $_SESSION['old'] = $data;

            return Response::redirect('/login');
        } catch (Throwable $exception) {

            error_log(
                $exception->getMessage()
            );

            $this->rateLimiter->hit($key);

            $_SESSION['errors'] = [
                '_' => 'Something went wrong. Please try again.'
            ];

            $_SESSION['old'] = $data;

            return Response::redirect('/login');
        }

        Auth::login($user);



        $roleId = Auth::roleId();

        switch ($roleId) {

            case 1:
                return Response::redirect('/admin/dashboard');


            case 2:
                return Response::redirect('/dashboard');


            default:
                return Response::redirect('/');
        }
    }

    /**
     * Show Register Page
     */
    public function showRegister()
    {

        $departments = $this->masterService->getDepartments();

        $academicYears = $this->masterService->getAcademicYears();


        $this->view(
            'Auth/Presentation/Views/register',
            [
                'title' => 'Register',

                'csrf' => new Csrf(),

                'errors' => $_SESSION['errors'] ?? [],

                'old' => $_SESSION['old'] ?? [],

                'departments' => $departments,

                'academicYears' => $academicYears
            ],
            'auth'
        );


        unset($_SESSION['errors'], $_SESSION['old']);
    }

    /**
     * Register Process
     */
    public function register()
    {
        $validator = new RegisterValidator();

        $data = $this->request->all();

        if (!$validator->validate($data)) {
            $_SESSION['errors'] = $validator->errors();
            $_SESSION['old'] = $data;
            return Response::redirect('/register');
        }

        $dto = $validator->getDTO($data);

        try {

            $this->authService->register($dto);
        } catch (AuthException $exception) {

            $_SESSION['errors'] = [
                $exception->getField() => $exception->getMessage()
            ];

            $_SESSION['old'] = $data;

            return Response::redirect('/register');
        } catch (Throwable $exception) {

            error_log($exception->getMessage());

            $_SESSION['errors'] = [
                '_' => 'Something went wrong. Please try again.'
            ];

            $_SESSION['old'] = $data;

            return Response::redirect('/register');
        }

        Flash::set(
            'success',
            'Registration successful. Please login.'
        );

        return Response::redirect('/login');
    }

    /**
     * Logout
     */
    public function logout()
    {
        $userId = $_SESSION['user']['id'] ?? null;


        $this->authService->logout(
            $userId
        );


        return Response::redirect('/login');
    }
}