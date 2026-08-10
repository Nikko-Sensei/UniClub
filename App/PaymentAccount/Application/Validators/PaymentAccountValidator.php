<?php

namespace App\PaymentAccount\Application\Validators;


class PaymentAccountValidator
{


    /**
     * Validate create payment account
     */
    public function validateCreate(
        array $data
    ): array {


        $errors = [];



        if(
            empty($data['payment_method'])
        ){

            $errors['payment_method'] =
                "Payment method is required.";

        }



        if(
            empty($data['account_name'])
        ){

            $errors['account_name'] =
                "Account name is required.";

        }



        /*
         * Account number required
         * except Cash payment
         */
        if(
            ($data['payment_method'] ?? null) !== 'Cash'
            &&
            empty($data['account_number'])
        ){

            $errors['account_number'] =
                "Account number is required.";

        }



        if(
            empty($data['status'])
        ){

            $errors['status'] =
                "Status is required.";

        }



        if(
            !empty($data['status'])
            &&
            !in_array(
                $data['status'],
                [
                    'active',
                    'inactive'
                ]
            )
        ){

            $errors['status'] =
                "Invalid status.";

        }



        return $errors;

    }







    /**
     * Validate update payment account
     */
    public function validateUpdate(
        array $data
    ): array {


        return $this->validateCreate(
            $data
        );

    }



}