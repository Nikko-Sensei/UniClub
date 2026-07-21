<?php

namespace App\Auth\Application\Validators;

use App\Shared\Validation\BaseValidator;
use App\Auth\Application\DTOs\ResetPasswordDTO;
use App\Auth\Domain\Exceptions\WeakPasswordException;


class ResetPasswordValidator extends BaseValidator
{

    private PasswordPolicyValidator $passwordPolicy;



    public function __construct(
        PasswordPolicyValidator $passwordPolicy
    ) {

        $this->passwordPolicy =
            $passwordPolicy;

    }





    public function validate(
        array $data
    ): bool {

        $this->errors = [];



        if (empty($data['email'])) {

            $this->errors['email'] =
                "Email is required.";

        }



        if (empty($data['password'])) {

            $this->errors['password'] =
                "Password is required.";

        } 
        else {

            try {

                $this->passwordPolicy->validate(
                    $data['password']
                );


            } catch (WeakPasswordException $exception) {


                $this->errors['password'] =
                    $exception->getMessage();

            }

        }





        if (
            ($data['password'] ?? '')
            !==
            ($data['password_confirmation'] ?? '')
        ) {

            $this->errors['password_confirmation'] =
                "Passwords do not match.";

        }



        return !$this->fails();

    }







    public function getDTO(
        array $data
    ): ResetPasswordDTO {

        if ($this->fails()) {

            throw new \LogicException(
                "Cannot create DTO with invalid data."
            );

        }


        return new ResetPasswordDTO(

            $data['email'],

            $data['otp'],

            $data['password']

        );

    }

}