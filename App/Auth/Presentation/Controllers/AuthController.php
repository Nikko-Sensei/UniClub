<?php

namespace App\Auth\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Auth\Application\Services\AuthService;
use App\Auth\Application\Validators\RegisterValidator;
use App\Auth\Application\Validators\LoginValidator;
use App\Auth\Infrastructure\Persistence\UserRepository;
use App\Shared\Core\Auth;
use App\Shared\Security\Csrf;
use App\Auth\Domain\Exceptions\AuthException;
use Throwable;
use App\Master\Application\Services\MasterService;
use App\Master\Infrastructure\Persistence\MasterRepository;

class AuthController extends BaseController
{
    private AuthService $authService;

    private MasterService $masterService;


    public function __construct(
        AuthService $authService,
        MasterService $masterService
    ) {

        parent::__construct();


        $this->authService = $authService;

        $this->masterService = $masterService;
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
                'old' => $_SESSION['old'] ?? [],
                'redirect' => $_GET['redirect'] ?? ''
            ],
            'auth'
        );

        unset($_SESSION['errors'], $_SESSION['old']);
    }

    /**
     * Login Process
     */
    public function login()
    {
        $validator = new LoginValidator();

        $data = $this->request->all();

        // 1. Validate
        if (!$validator->validate($data)) {
            $_SESSION['errors'] = $validator->errors();
            $_SESSION['old'] = $data;
            return Response::redirect('/login');
        }

        // 2. Create DTO (STRICT LAYER)
        $dto = $validator->getDTO($data);

        try {
            // 3. Business Logic
            $user = $this->authService->login($dto);
        } catch (AuthException $exception) {
            $_SESSION['errors'] = ['_' => $exception->getMessage()];
            $_SESSION['old'] = $data;
            return Response::redirect('/login');
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            $_SESSION['errors'] = ['_' => 'Something went wrong. Please try again.'];
            $_SESSION['old'] = $data;
            return Response::redirect('/login');
        }

        // 4. Session login
        Auth::login($user);

        return Response::redirect('/');
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
            $_SESSION['errors'] = ['_' => $exception->getMessage()];
            $_SESSION['old'] = $data;
            return Response::redirect('/register');
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            $_SESSION['errors'] = ['_' => 'Something went wrong. Please try again.'];
            $_SESSION['old'] = $data;
            return Response::redirect('/register');
        }

        return Response::redirect('/login');
    }

    /**
     * Logout
     */
    public function logout()
    {
        unset($_SESSION['user']);

        return Response::redirect('/login');
    }
}