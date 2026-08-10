<?php

namespace App\Payment\Application\Validators;



class PaymentValidator
{


    /**
     * Validate Payment Creation
     */
    public function validateCreate(
        array $data
    ): array {


        $errors = [];



        /*
         * User ID
         */
        if (
            empty($data['user_id'])
        ) {

            $errors['user_id'] =
                'User is required.';
        }





        /*
         * Club ID
         */
        if (
            empty($data['club_id'])
        ) {

            $errors['club_id'] =
                'Club is required.';
        }





        /*
         * Amount
         */
        if (
            !isset($data['amount'])
            ||
            $data['amount'] === ''
        ) {

            $errors['amount'] =
                'Payment amount is required.';
        } elseif (
            !is_numeric($data['amount'])
            ||
            $data['amount'] <= 0
        ) {

            $errors['amount'] =
                'Payment amount must be greater than zero.';
        }






        /*
         * Payment Method
         */
        $allowedMethods = [

            'cash',

            'kbz pay',

            'wave money'

        ];



        if (
            empty($data['payment_method'])
        ) {

            $errors['payment_method'] =
                'Payment method is required.';
        } elseif (
            !in_array(
                strtolower(
                    $data['payment_method']
                ),
                $allowedMethods
            )
        ) {

            $errors['payment_method'] =
                'Invalid payment method.';
        }






        /*
         * Transaction Number
         *
         * Required for KBZ Pay and Wave Money
         */
        if (
            isset($data['payment_method'])
            &&
            in_array(
                strtolower(
                    $data['payment_method']
                ),
                [
                    'kbz pay',
                    'wave money'
                ]
            )
        ) {


            if (
                empty($data['transaction_number'])
            ) {

                $errors['transaction_number'] =
                    'Transaction number is required for digital payment.';
            }
        }




        /*
         * Transaction Number Length
         */
        if (
            !empty($data['transaction_number'])
            &&
            strlen(
                $data['transaction_number']
            ) > 100
        ) {

            $errors['transaction_number'] =
                'Transaction number is too long.';
        }






        /*
         * Receipt Image
         *
         * Required for KBZ Pay and Wave Money
         */
        if (
            isset($data['payment_method'])
            &&
            in_array(
                strtolower(
                    $data['payment_method']
                ),
                [
                    'kbz pay',
                    'wave money'
                ]
            )
        ) {


            if (
                empty($data['receipt_image'])
            ) {

                $errors['receipt_image'] =
                    'Receipt image is required for digital payment.';
            }
        }






        /*
         * Receipt Image Path Length
         */
        if (
            !empty($data['receipt_image'])
            &&
            strlen(
                $data['receipt_image']
            ) > 255
        ) {

            $errors['receipt_image'] =
                'Receipt image path is too long.';
        }




        return $errors;
    }








    /**
     * Validate Receipt Upload
     */
    public function validateReceipt(
        array $data
    ): array {


        $errors = [];



        /*
         * Only KBZ Pay and Wave Money
         */
        if (
            isset($data['payment_method'])
            &&
            in_array(
                strtolower(
                    $data['payment_method']
                ),
                [
                    'kbz pay',
                    'wave money'
                ]
            )
        ) {


            if (
                empty($data['receipt_image'])
            ) {

                $errors['receipt_image'] =
                    'Receipt image is required for digital payment.';
            }



            if (
                empty($data['transaction_number'])
            ) {

                $errors['transaction_number'] =
                    'Transaction number is required for digital payment.';
            }
        }



        return $errors;
    }
}
