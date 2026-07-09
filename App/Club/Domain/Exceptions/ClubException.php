<?php

namespace App\Club\Club\Domain\Exceptions;

use Exception;

class ClubException extends Exception
{
    protected string $field = '_';

    public function getField(): string
    {
        return $this->field;
    }
}