<?php

namespace App\Auth\Application\Services;

use App\Auth\Domain\Entity\User;
use App\Auth\Domain\Repository\UserRepositoryInterface;
use App\Shared\Security\PasswordHasher;

use App\Auth\Application\DTOs\LoginDTO;
use App\Auth\Application\DTOs\RegisterDTO;

use App\Auth\Domain\Exceptions\DuplicateEmailException;
use App\Auth\Domain\Exceptions\InvalidCredentialsException;
use App\Auth\Domain\Exceptions\RegistrationFailedException;
use App\Auth\Domain\Exceptions\AccountInactiveException;
use App\Auth\Domain\Exceptions\DuplicateStudentIdException;
use App\Auth\Domain\Exceptions\InvalidAcademicYearException;
use App\Auth\Domain\Exceptions\InvalidDepartmentException;

use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;
use App\Master\Application\Services\MasterService;
use App\Auth\Domain\ValueObjects\StudentId;


class AuthService
{
    private UserRepositoryInterface $userRepository;

    private AuditLogger $auditLogger;

    private MasterService $masterService;


    public function __construct(

        UserRepositoryInterface $userRepository,

        AuditLogger $auditLogger,

        MasterService $masterService

    ) {

        $this->userRepository = $userRepository;

        $this->auditLogger = $auditLogger;

        $this->masterService = $masterService;
    }


    /**
     * Register user
     */
    public function register(
        RegisterDTO $dto
    ): bool {

        $existingStudent = $this->userRepository->findByStudentId($dto->studentId);

        $existingEmail = $this->userRepository->findByEmail($dto->email);

        if ($existingStudent) {

            throw new DuplicateStudentIdException();
        }

        if ($existingEmail) {

            throw new DuplicateEmailException();
        }

        $studentId = new StudentId($dto->studentId);

        $studentYear = $studentId->getYearNumber();

        if (
            $studentYear !== null &&
            $studentYear != $dto->academicYearId
        ) {

            throw new InvalidAcademicYearException();
        }

        $studentDepartment = $studentId->getDepartmentCode();

        $departmentCode = $this->masterService->getDepartmentCode($dto->departmentId);


        if (
            $studentDepartment !== $departmentCode
        ) {

            throw new InvalidDepartmentException();
        }

        $user = new User(

            id: null,

            roleId: 2,

            departmentId: $dto->departmentId,

            academicYearId: $dto->academicYearId,

            studentId: $dto->studentId,

            name: $dto->name,

            email: $dto->email,

            password: PasswordHasher::hash(
                $dto->password
            ),

            phone: $dto->phone,

            profileImage: $dto->profileImage,

            status: 'active'
        );

        if (
            !$this->userRepository->create($user)
        ) {

            throw new RegistrationFailedException();
        }

        /*
        |--------------------------------------------------------------------------
        | Audit Register Success
        |--------------------------------------------------------------------------
        */

        $this->auditLogger->log(

            AuditAction::REGISTER_SUCCESS,

            null,

            'User',

            null,

            [
                'email' => $dto->email,
                'student_id' => $dto->studentId
            ]

        );

        return true;
    }

    /**
     * Login user
     */
    public function login(
        LoginDTO $dto
    ): ?User {

        $user = $this->userRepository->findByEmail($dto->email);

        if (!$user) {

            $this->auditLogger->log(

                AuditAction::LOGIN_FAILED,

                null,

                'User',

                null,

                [
                    'email' => $dto->email,
                    'reason' => 'User not found'
                ]

            );

            throw new InvalidCredentialsException();
        }

        if (
            !PasswordHasher::verify(
                $dto->password,
                $user->getPassword()
            )
        ) {

            $this->auditLogger->log(

                AuditAction::LOGIN_FAILED,

                $user->getId(),

                'User',

                $user->getId(),

                [
                    'reason' => 'Wrong password'
                ]

            );

            throw new InvalidCredentialsException();
        }

        if (
            $user->getStatus() !== 'active'
        ) {


            $this->auditLogger->log(

                AuditAction::LOGIN_FAILED,

                $user->getId(),

                'User',

                $user->getId(),

                [
                    'reason' => 'Inactive account'
                ]

            );

            throw new AccountInactiveException();
        }

        $this->userRepository->updateLastLogin(
            $user->getId()
        );

        /*
        |--------------------------------------------------------------------------
        | Audit Login Success
        |--------------------------------------------------------------------------
        */

        $this->auditLogger->log(

            AuditAction::LOGIN_SUCCESS,

            $user->getId(),

            'User',

            $user->getId(),

            [
                'message' => 'User login successfully'
            ]

        );

        return $user;
    }

    /**
     * Logout user
     */
    public function logout(?int $userId): void
    {
        if ($userId) {

            $this->auditLogger->log(

                AuditAction::LOGOUT,

                $userId,

                'User',

                $userId,

                [
                    'message' => 'User logout successfully'
                ]

            );
        }

        unset($_SESSION['user']);

        session_regenerate_id(true);
    }
}