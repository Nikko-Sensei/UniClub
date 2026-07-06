<?php

namespace App\Auth\Application\Services;

use App\Auth\Application\DTOs\ForgotPasswordDTO;
use App\Auth\Application\DTOs\VerifyOtpDTO;
use App\Auth\Application\DTOs\ResetPasswordDTO;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\Auth\Domain\Repository\PasswordResetRepositoryInterface;

use App\Auth\Domain\Entity\PasswordResetOtp;

use App\Shared\Security\PasswordHasher;
use App\Shared\Logging\AuditLogger;
use App\Shared\Mail\EmailService;

use App\Auth\Domain\Exceptions\InvalidOtpException;

class PasswordResetService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private PasswordResetRepositoryInterface $otpRepository,
        private EmailService $emailService,
        private AuditLogger $auditLogger
    ) {}

    // STEP 1: SEND OTP
    public function requestOtp(ForgotPasswordDTO $dto): bool
    {
        $user = $this->userRepository->findByEmail($dto->email);

        if (!$user) {
            return true;
        }

        $otp = (string) random_int(100000, 999999);

        $expiresAt = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        $this->otpRepository->createOtp(
            $user->getId(),
            $otp,
            $expiresAt
        );

        $this->emailService->sendOtp($dto->email, $otp);

        $this->auditLogger->log(
            'OTP_SENT',
            $user->getId(),
            'User',
            $user->getId()
        );

        return true;
    }

    // STEP 2: VERIFY OTP
    public function verifyOtp(VerifyOtpDTO $dto): bool
    {
        $otp = $this->otpRepository->findValidOtp(
            $dto->email,
            $dto->otp
        );

        if (!$otp) {
            throw new InvalidOtpException("Invalid OTP");
        }

        if ($otp->isExpired()) {
            throw new InvalidOtpException("OTP expired");
        }

        if ($otp->isUsed()) {
            throw new InvalidOtpException("OTP already used");
        }

        return true;
    }

    // STEP 3: RESET PASSWORD
    public function resetPassword(ResetPasswordDTO $dto): bool
    {
        $otp = $this->otpRepository->findValidOtp(
            $dto->email,
            $dto->otp
        );

        if (!$otp || $otp->isExpired() || $otp->isUsed()) {
            throw new InvalidOtpException();
        }

        $user = $this->userRepository->findByEmail($dto->email);

        $this->userRepository->updatePassword(
            $user->getId(),
            PasswordHasher::hash($dto->password)
        );

        $this->otpRepository->markUsed($otp->getId());

        $this->auditLogger->log(
            'PASSWORD_RESET_SUCCESS',
            $user->getId(),
            'User',
            $user->getId()
        );

        return true;
    }
}