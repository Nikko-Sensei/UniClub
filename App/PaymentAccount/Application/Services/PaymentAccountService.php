<?php

namespace App\PaymentAccount\Application\Services;


use App\PaymentAccount\Domain\Repository\PaymentAccountRepositoryInterface;
use App\PaymentAccount\Application\Validators\PaymentAccountValidator;
use App\PaymentAccount\Domain\Entities\PaymentAccount;



class PaymentAccountService
{


    private PaymentAccountRepositoryInterface $repository;

    private PaymentAccountValidator $validator;




    public function __construct(

        PaymentAccountRepositoryInterface $repository,

        PaymentAccountValidator $validator

    ){

        $this->repository = $repository;

        $this->validator = $validator;

    }








    /**
     * Create Payment Account
     */
    public function create(
        PaymentAccount $account
    ): bool {


        $errors =
            $this->validator
            ->validateCreate([

                'payment_method' =>
                    $account->getPaymentMethod(),


                'account_name' =>
                    $account->getAccountName(),


                'account_number' =>
                    $account->getAccountNumber(),


                'status' =>
                    $account->getStatus()

            ]);



        if(!empty($errors)){


            throw new \Exception(

                implode(
                    ', ',
                    $errors
                )

            );

        }



        return $this->repository
            ->create(
                $account
            );

    }









    /**
     * Update Payment Account
     */
    public function update(
        PaymentAccount $account
    ): bool {


        $errors =
            $this->validator
            ->validateUpdate([

                'payment_method' =>
                    $account->getPaymentMethod(),


                'account_name' =>
                    $account->getAccountName(),


                'account_number' =>
                    $account->getAccountNumber(),


                'status' =>
                    $account->getStatus()

            ]);



        if(!empty($errors)){


            throw new \Exception(

                implode(
                    ', ',
                    $errors
                )

            );

        }



        return $this->repository
            ->update(
                $account
            );

    }









    /**
     * Delete Payment Account
     */
    public function delete(
        int $id
    ): bool {


        return $this->repository
            ->delete(
                $id
            );

    }









    /**
     * Get Payment Account
     */
    public function getAccount(
        int $id
    ): ?PaymentAccount {


        return $this->repository
            ->findById(
                $id
            );

    }









    /**
     * Get All Payment Accounts
     */
    public function getAccounts(): array
    {


        return $this->repository
            ->findAll();

    }









    /**
     * Get Active Accounts By Club
     */
    public function getAccountsByClub(
        int $clubId
    ): array {


        return $this->repository
            ->findByClub(
                $clubId
            );

    }



}