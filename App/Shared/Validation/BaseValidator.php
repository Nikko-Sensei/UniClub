<?php

namespace App\Shared\Validation;

abstract class BaseValidator
{
    protected array $errors = [];

    public function errors(): array
    {
        return $this->errors;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }
}