<?php

namespace App\Auth\Application\Services;


use App\Auth\Domain\Repository\LoginAttemptRepositoryInterface;
use App\Shared\Helpers\SecuritySettingHelper;


class LoginProtectionService
{


    public function __construct(

        private LoginAttemptRepositoryInterface $repository,

        private SecuritySettingHelper $security

    )
    {

    }




    public function isLocked(
        string $email
    ): bool {


        $attempt =
            $this->repository->findByEmail(
                $email
            );


        if(!$attempt)
        {
            return false;
        }


        if(
            empty($attempt['locked_until'])
        )
        {
            return false;
        }


        return strtotime(
            $attempt['locked_until']
        ) > time();

    }







    public function failed(
        string $email
    ): void {


        $this->repository->increase(
            $email
        );


        $attempt =
            $this->repository->findByEmail(
                $email
            );


        $max =
            $this->security->value(
                'max_login_attempts',
                5
            );


        if(
            $attempt['attempts'] >= $max
        ){

            $this->repository->lock(

                $email,

                $this->security->value(
                    'lock_time_minutes',
                    15
                )

            );

        }

    }





    public function success(
        string $email
    ): void {


        $this->repository->reset(
            $email
        );

    }

}