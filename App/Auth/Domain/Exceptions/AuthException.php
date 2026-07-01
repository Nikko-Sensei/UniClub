<?php

namespace App\Auth\Domain\Exceptions;

use App\Shared\Exceptions\BaseException;

abstract class AuthException extends BaseException
{
    protected string $field = '_';

    public function getField(): string
    {
        return $this->field;
    }
}