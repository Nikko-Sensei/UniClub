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

class AuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    /**
     * Register user
     */
    public function register(RegisterDTO $dto): bool
    {
        $existingEmail = $this->userRepository
            ->findByEmail($dto->email);

        if ($existingEmail) {
            throw new DuplicateEmailException();
        }


        $existingStudent = $this->userRepository
            ->findByStudentId($dto->studentId);

        if ($existingStudent) {
            throw new DuplicateStudentIdException();
        }

        $user = new User(

            id: null,
            roleId: 2,

            departmentId: $dto->departmentId,
            academicYearId: $dto->academicYearId,

            studentId: $dto->studentId,

            name: $dto->name,
            email: $dto->email,

            password: PasswordHasher::hash($dto->password),
            phone: $dto->phone,

            profileImage: $dto->profileImage,
            status: 'active'
        );

        if (!$this->userRepository->create($user)) {
            throw new RegistrationFailedException();
        }

        return true;
    }

    /**
     * Login user
     */

    public function login(LoginDTO $dto): ?User
    {
        $user = $this->userRepository->findByEmail($dto->email);

        if (!$user) {
            throw new InvalidCredentialsException();
        }

        if (!PasswordHasher::verify(
            $dto->password,
            $user->getPassword()
        )) {
            throw new InvalidCredentialsException();
        }

        if ($user->getStatus() !== 'active') {
            throw new AccountInactiveException();
        }

        $this->userRepository->updateLastLogin($user->getId());

        return $user;
    }
}