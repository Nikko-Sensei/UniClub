<?php

namespace App\Auth\Domain\Exceptions;


class InvalidAcademicYearException extends AuthException
{
    protected string $field = 'academic_year_id';

    public function __construct(
        string $message = "Student ID does not match the selected academic year."
    ) {
        parent::__construct($message);
    }
}