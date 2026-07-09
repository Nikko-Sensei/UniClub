<?php

namespace App\Club\Application\Validators;


class ClubValidator
{

    public function validateCreate(
        array $data
    ): array {


        $errors = [];


        if (
            empty($data['category_id'])
        ) {

            $errors['category_id'] =
                'Club category is required.';
        }

        if (
            empty($data['name'])
        ) {

            $errors['name'] = 'Club name is required.';

        } elseif (
            strlen($data['name']) > 150
        ) {

            $errors['name'] = 'Club name must not exceed 150 characters.';
        }

        if (
            !empty($data['short_name'])
            &&
            strlen($data['short_name']) > 50
        ) {

            $errors['short_name'] = 'Short name must not exceed 50 characters.';
        }

        if (
            !empty($data['email'])
            &&
            !filter_var(
                $data['email'],
                FILTER_VALIDATE_EMAIL
            )
        ) {

            $errors['email'] = 'Invalid email format.';
        }

        if (
            !empty($data['member_limit'])
            &&
            $data['member_limit'] < 1
        ) {

            $errors['member_limit'] = 'Member limit must be greater than zero.';
        }

        return $errors;
    }

    public function validateUpdate(
        array $data
    ): array {

        return $this->validateCreate($data);

    }

}