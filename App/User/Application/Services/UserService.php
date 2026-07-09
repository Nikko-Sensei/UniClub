<?php

namespace App\User\Application\Services;

use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\Master\Application\Services\MasterService;
use App\User\Application\DTOs\UpdateProfileDTO;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private MasterService $masterService
    ) {}

    public function findById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }

    public function findByStudentId(string $studentId): ?User
    {
        return $this->userRepository->findByStudentId($studentId);
    }

    public function updateProfile(UpdateProfileDTO $dto): bool
    {
        $user = $this->userRepository->findById($dto->userId);

        if (!$user) {
            return false;
        }

        return $this->userRepository->updateProfile(
            $dto->userId,
            $dto->name,
            $dto->phone,
            $dto->profileImage
        );
    }


    public function getProfileData(int $userId): array
    {
        $user = $this->userRepository->findById($userId);
        // var_dump($this->masterService->getDepartmentName($user->getDepartmentId()));
        // exit;
        return [
            'user' => $user,
            'departmentName' => $this->masterService->getDepartmentName($user->getDepartmentId()),
            'academicYearName' => $this->masterService->getAcademicYearName($user->getAcademicYearId()),
            'roleName' => $this->masterService->getRoleName($user->getRoleId()),
        ];
    }

    public function changePassword(
        int $userId,
        string $currentPassword,
        string $newPassword
    ): void {

        $user = $this->userRepository->findById($userId);

        if (!$user) {
            throw new \Exception("User not found");
        }

        // 1. Check current password
        if (!password_verify($currentPassword, $user->getPassword())) {
            throw new \Exception("Current password is incorrect");
        }

        // 2. Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // 3. Update DB
        $this->userRepository->updatePassword($userId, $hashedPassword);
    }
}