<?php

namespace App\Auth\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Security\Csrf;
use App\Shared\Helpers\Flash;

use App\Auth\Application\Services\PasswordResetService;
use App\Auth\Application\Validators\ForgotPasswordValidator;
use App\Auth\Application\Validators\VerifyOtpValidator;
use App\Auth\Application\Validators\ResetPasswordValidator;
use App\Shared\Helpers\SecuritySettingHelper;
use App\Auth\Domain\Exceptions\InvalidOtpException;
use Throwable;

class PasswordResetController extends BaseController
{
    private ForgotPasswordValidator $forgotValidator;

    private VerifyOtpValidator $otpValidator;

    private ResetPasswordValidator $resetValidator;
    public function __construct(
        private PasswordResetService $service,

        private SecuritySettingHelper $security,

        ForgotPasswordValidator $forgotValidator,

        VerifyOtpValidator $otpValidator,

        ResetPasswordValidator $resetValidator
    ) {
        parent::__construct();

        // 🔥 Prevent browser cache (fix back button issues)
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: 0");
    }

    /* ---------------- FORGOT PASSWORD ---------------- */
    public function showForgotPassword()
    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }

        $this->view('Auth/Presentation/Views/forgot_password', [
            'csrf' => new Csrf(),
            'errors' => $_SESSION['errors'] ?? [],
            'old' => $_SESSION['old'] ?? []
        ], 'auth');

        unset($_SESSION['errors'], $_SESSION['old']);
    }

    public function forgotPassword()
    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }

       // $validator = new ForgotPasswordValidator();

        $validator = $this->forgotValidator;
        $data = $this->request->all();

        if (!$validator->validate($data)) {
            $_SESSION['errors'] = $validator->errors();
            $_SESSION['old'] = $data;
            return Response::redirect('/forgot-password');
        }

        $this->service->requestOtp($validator->getDTO());

        $_SESSION['reset_flow'] = [
            'step' => 'otp_sent',
            'email' => $data['email']
        ];

        return Response::redirect('/verify-otp');
    }

    /* ---------------- OTP ---------------- */
    public function showVerifyOtp()
    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }

        if (($_SESSION['reset_flow']['step'] ?? '') !== 'otp_sent') {
            return Response::redirect('/login');
        }

        $this->view('Auth/Presentation/Views/verify_otp', [
            'csrf' => new Csrf(),
            'email' => $_SESSION['reset_flow']['email'] ?? null,
            'errors' => $_SESSION['errors'] ?? []
        ], 'auth');

        unset($_SESSION['errors']);
    }

    public function verifyOtp()
    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }
        //$validator = new VerifyOtpValidator();

        $validator = $this->otpValidator;
        $data = $this->request->all();

        if (!$validator->validate($data)) {
            $_SESSION['errors'] = $validator->errors();
            return Response::redirect('/verify-otp');
        }

        try {
            $this->service->verifyOtp($validator->getDTO($data));

            $_SESSION['reset_flow']['step'] = 'otp_verified';

            return Response::redirect('/reset-password');
        } catch (InvalidOtpException $e) {
            $_SESSION['errors'] = ['otp' => $e->getMessage()];
            return Response::redirect('/verify-otp');
        }
    }

    /* ---------------- RESET PASSWORD ---------------- */
    public function showResetPassword()
    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }

        if (($_SESSION['reset_flow']['step'] ?? '') !== 'otp_verified') {
            return Response::redirect('/login');
        }

        $this->view('Auth/Presentation/Views/reset_password', [
            'csrf' => new Csrf(),
            'email' => $_SESSION['reset_flow']['email'] ?? null,
            'errors' => $_SESSION['errors'] ?? []
        ], 'auth');

        unset($_SESSION['errors']);
    }

    public function resetPassword()

    {

        if (
            !$this->security->enabled(
                'enable_password_reset'
            )
        ) {

            Flash::set(
                'error',
                'Password reset is currently disabled'
            );


            return Response::redirect(
                '/login'
            );
        }

        $validator = $this->resetValidator;
        
        $data = $this->request->all();

        if (!$validator->validate($data)) {
            $_SESSION['errors'] = $validator->errors();
            $_SESSION['old'] = $data;
            return Response::redirect('/reset-password');
        }

        try {
            $this->service->resetPassword($validator->getDTO($data));

            $_SESSION['reset_success'] = true;

            unset($_SESSION['reset_flow']);

            Flash::set('success', 'Password reset successful');

            return Response::redirect('/password-reset-success');
        } catch (InvalidOtpException $e) {
            $_SESSION['errors'] = ['otp' => $e->getMessage()];
            return Response::redirect('/reset-password');
        } catch (Throwable $e) {
            error_log($e->getMessage());

            $_SESSION['errors'] = ['_' => 'Something went wrong'];
            return Response::redirect('/reset-password');
        }
    }

    /* ---------------- SUCCESS PAGE ---------------- */
    public function showSuccess()
    {
        if (empty($_SESSION['reset_success'])) {
            return Response::redirect('/login');
        }

        unset($_SESSION['reset_success']);

        $this->view('Auth/Presentation/Views/password_reset_success', [
            'flashSuccess' => Flash::get('success')
        ], 'auth');
    }
}