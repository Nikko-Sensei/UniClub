<?php

namespace App\User\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\User\Application\Services\UserService;
use App\User\Application\Validators\UpdateProfileValidator;
use App\User\Application\Validators\ChangePasswordValidator;
use App\User\Application\DTOs\UpdateProfileDTO;
use App\Shared\Helpers\Flash;

class ProfileController extends BaseController
{
    public function __construct(
        private UserService $userService
    ) {
        parent::__construct();
    }

    public function show()
    {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            header("Location: /login");
            exit;
        }

        $data = $this->userService->getProfileData($userId);

        return $this->view(
            'User/Presentation/Views/Profile/show',
            $data
        );
    }

    public function edit()
    {
        $userId = $_SESSION['user']['id'];

        $data = $this->userService->getProfileData($userId);

        return $this->view('User/Presentation/Views/Profile/edit', [
            'user' => $data['user'],
            'departmentName' => $data['departmentName'],
            'academicYearName' => $data['academicYearName'],
            'roleName' => $data['roleName'],
        ]);

        //  return $this->view('User/Presentation/Views/Profile/edit', [
        //     'user' => $user
        // ]);
    }

    public function update()
    {

        $userId = $_SESSION['user']['id'];

        $validator = new UpdateProfileValidator();

        $data = $_POST;
        $files = $_FILES;

        if (!$validator->validate($data, $files)) {
            $_SESSION['errors'] = $validator->errors();
            return header("Location: " . BASE_URL . "/profile/edit");
        }

        $dto = $validator->getDTO($data, $userId);

        // IMAGE UPLOAD (basic version)
        $profileImage = null;

        if (!empty($_FILES['profile_image']['name'])) {

            $filename = time() . '_' . $_FILES['profile_image']['name'];

            $path = __DIR__ . "/../../../../Public/uploads/profile/";

            //move_uploaded_file($_FILES['profile_image']['tmp_name'], $path . $filename);

            $success = move_uploaded_file(
                $_FILES['profile_image']['tmp_name'],
                $path . $filename
            );

            if (!$success) {
                die("Upload failed");
            }

            $profileImage = $filename;
        }

        $dto = new UpdateProfileDTO(
            $dto->userId,
            $dto->name,
            $dto->phone,
            $profileImage
        );

        $this->userService->updateProfile($dto);

        // Update session data
        $_SESSION['user']['name'] = $dto->name;

        if ($profileImage !== null) {
            $_SESSION['user']['profile_image'] = $profileImage;
        }

        Flash::set('success', 'Profile updated successfully');

        header("Location: " . BASE_URL . "/profile");
        exit;
    }

    public function changePasswordForm()
    {
        return $this->view('User/Presentation/Views/Profile/change-password');
    }

    public function changePassword()
    {
        $userId = $_SESSION['user']['id'];

        $validator = new ChangePasswordValidator();

        if (!$validator->validate($_POST)) {
            $_SESSION['errors'] = $validator->errors();
            header("Location: " . BASE_URL . "/profile/change-password");
            exit;
        }

        try {
            $this->userService->changePassword(
                $userId,
                $_POST['current_password'],
                $_POST['new_password']
            );

            Flash::set('success', 'Password changed successfully');

            header("Location: " . BASE_URL . "/profile");
            exit;
        } catch (\Exception $e) {

            $_SESSION['errors']['password'] = $e->getMessage();

            header("Location: " . BASE_URL . "/profile/change-password");
            exit;
        }
    }
}
