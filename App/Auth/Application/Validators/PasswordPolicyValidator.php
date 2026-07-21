<?php

namespace App\Auth\Application\Validators;

use App\Auth\Application\Services\PasswordPolicyService;
use App\Auth\Domain\Exceptions\WeakPasswordException;

class PasswordPolicyValidator
{
    public function __construct(
        private PasswordPolicyService $service
    ) {
    }


    public function validate(
        string $password
    ): void {

        $policy =
            $this->service->getPolicy();



        if (
            strlen($password)
            <
            $policy->minimumLength()
        ) {

            throw new WeakPasswordException(
                "Password must contain at least {$policy->minimumLength()} characters."
            );

        }



        if (
            $policy->requiresUppercase()
            &&
            !preg_match('/[A-Z]/', $password)
        ) {

            throw new WeakPasswordException(
                "Password must contain an uppercase letter."
            );

        }



        if (
            $policy->requiresNumber()
            &&
            !preg_match('/[0-9]/', $password)
        ) {

            throw new WeakPasswordException(
                "Password must contain a number."
            );

        }

    }
}