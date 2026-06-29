<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\RegisterDTO;

use App\Auth\Domain\Exceptions\AuthException;
use App\Auth\Domain\Exceptions\InvalidUserNameException;
use App\Auth\Domain\Exceptions\InvalidPhoneNumberException;

use App\Auth\Domain\ValueObjects\UserName;
use App\Auth\Domain\ValueObjects\StudentId;
use App\Auth\Domain\ValueObjects\Email;
use App\Auth\Domain\ValueObjects\Password;
use App\Auth\Domain\ValueObjects\PhoneNumber;


class RegisterValidator extends BaseValidator
{
    private ?UserName $userName = null;
    private ?StudentId $studentId = null;
    private ?Email $email = null;
    private ?Password $password = null;
    private ?PhoneNumber $phoneNumber = null;

    public function validate(array $data): bool
    {

        $this->errors = [];


        // =====================
        // User Name
        // =====================

        if (empty($data['name'])) {

            $this->errors['name'] =
                "Student name is required.";
        } else {

            try {

                $this->userName = new UserName(
                    $data['name']
                );
            } catch (InvalidUserNameException $exception) {

                $this->errors['name'] =
                    $exception->getMessage();
            }
        }

        // =====================
        // Student ID
        // =====================

        if (empty($data['student_id'])) {

            $this->errors['student_id'] =
                "Student ID is required.";
        } else {

            try {

                $this->studentId = new StudentId(
                    $data['student_id']
                );
            } catch (AuthException $exception) {

                $this->errors['student_id'] =
                    $exception->getMessage();
            }
        }

        // =====================
        // Phone Number
        // =====================

        if (empty($data['phone'])) {

            $this->errors['phone'] =
                "Phone Number is required.";
        } else {

            try {

                $this->phoneNumber = new PhoneNumber(
                    $data['phone']
                );
            } catch (InvalidPhoneNumberException $exception) {

                $this->errors['phone'] =
                    $exception->getMessage();
            }
        }

        // =====================
        // Email
        // =====================

        if (empty($data['email'])) {

            $this->errors['email'] =
                "Email is required.";
        } else {

            try {

                $this->email = new Email(
                    $data['email']
                );
            } catch (AuthException $exception) {

                $this->errors['email'] =
                    $exception->getMessage();
            }
        }

        // =====================
        // Password
        // =====================

        if (empty($data['password'])) {

            $this->errors['password'] =
                "Password is required.";
        } else {

            try {

                $this->password = new Password(
                    $data['password']
                );
            } catch (AuthException $exception) {

                $this->errors['password'] =
                    $exception->getMessage();
            }
        }

        // =====================
        // Confirm Password
        // =====================

        if (
            ($data['password'] ?? '') !==
            ($data['password_confirmation'] ?? '')
        ) {

            $this->errors['password_confirmation'] =
                "Passwords do not match.";
        }

        return !$this->fails();
    }

    public function getDTO(array $data): RegisterDTO
    {

        if ($this->fails()) {

            throw new \LogicException(
                "Cannot create DTO with invalid data."
            );
        }

        return new RegisterDTO(

            name: $this->userName->value(),

            studentId: $this->studentId->value(),

            email: $this->email->value(),

            password: $this->password->value(),


            departmentId: !empty($data['department_id'])
                ? (int)$data['department_id']
                : null,


            academicYearId: !empty($data['academic_year_id'])
                ? (int)$data['academic_year_id']
                : null,


            phone: $this->phoneNumber?->value(),


            profileImage: $data['profile_image'] ?? null

        );
    }
}