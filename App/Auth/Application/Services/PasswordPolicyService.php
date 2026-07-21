<?php

namespace App\Auth\Application\Services;


use App\Auth\Domain\ValueObjects\PasswordPolicy;
use App\Shared\Helpers\SecuritySettingHelper;


class PasswordPolicyService
{

    private SecuritySettingHelper $security;



    public function __construct(
        SecuritySettingHelper $security
    )
    {

        $this->security =
            $security;

    }





    public function getPolicy(): PasswordPolicy
    {

        return new PasswordPolicy(

            (int)$this->security->value(
                'password_min_length',
                8
            ),


            $this->security->enabled(
                'require_uppercase'
            ),


            $this->security->enabled(
                'require_number'
            )

        );

    }


}