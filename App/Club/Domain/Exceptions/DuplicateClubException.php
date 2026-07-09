<?php

namespace App\Club\Club\Domain\Exceptions;


class DuplicateClubException extends ClubException
{
    protected string $field = 'name';


    public function __construct(
        string $message = "Club name already exists."
    ) {
        parent::__construct($message);
    }
}