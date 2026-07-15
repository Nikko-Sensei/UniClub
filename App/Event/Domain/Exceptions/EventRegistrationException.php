<?php

namespace App\Event\Domain\Exceptions;


use Exception;


class EventRegistrationException extends Exception
{

    public function __construct(
        string $message
    ) {

        parent::__construct($message);

    }

}