<?php

namespace App\Event\Application\Validators;


class EventValidator
{


    public function validate(
        array $data
    ): array {


        $errors = [];



        if (
            empty($data['title'])
        ) {

            $errors['title'] =
                "Event title is required.";

        }



        if (
            empty($data['club_id'])
        ) {

            $errors['club_id'] =
                "Club is required.";

        }



        if (
            empty($data['category_id'])
        ) {

            $errors['category_id'] =
                "Category is required.";

        }



        if (
            empty($data['event_date'])
        ) {

            $errors['event_date'] =
                "Event date is required.";

        }



        if (
            isset($data['capacity'])
            &&
            $data['capacity'] < 1
        ) {

            $errors['capacity'] =
                "Capacity must be greater than zero.";

        }



        return $errors;

    }


}