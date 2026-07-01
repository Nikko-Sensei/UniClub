<?php

namespace App\Auth\Domain\Exceptions;


class InvalidDepartmentException extends AuthException
{
    protected string $field = 'department_id';

    public function __construct(
        string $message = "Student ID does not match the selected department."
    ) {
        parent::__construct($message);
    }
}