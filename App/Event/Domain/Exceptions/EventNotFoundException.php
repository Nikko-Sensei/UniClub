<?php

namespace App\Event\Domain\Exceptions;


use Exception;


class EventNotFoundException extends Exception
{

    public function __construct()
    {
        parent::__construct(
            "Event not found."
        );
    }

}