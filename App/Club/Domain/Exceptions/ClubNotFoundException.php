<?php

namespace App\Club\Club\Domain\Exceptions;


class ClubNotFoundException extends ClubException
{
    public function __construct(
        string $message = "Club not found."
    ) {
        parent::__construct($message);
    }
}