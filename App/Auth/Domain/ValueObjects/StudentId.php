<?php

namespace App\Auth\Domain\ValueObjects;

use App\Auth\Domain\Exceptions\InvalidStudentIdException;


final class StudentId
{
    private string $value;

    private const RULES = [

        '1CST' => [
            'min' => 1,
            'max' => 200,
        ],

        '2CS' => [
            'min' => 1,
            'max' => 200,
        ],

        '2CT' => [
            'min' => 1,
            'max' => 100,
        ],

        '3CS' => [
            'min' => 1,
            'max' => 200,
        ],

        '3CT' => [
            'min' => 1,
            'max' => 100,
        ],

        '4CS' => [
            'min' => 1,
            'max' => 200,
        ],

        '4CT' => [
            'min' => 1,
            'max' => 100,
        ],

        '5CS' => [
            'min' => 1,
            'max' => 200,
        ],

        '5CT' => [
            'min' => 1,
            'max' => 100,
        ],

    ];

    public function __construct(string $value)
    {

        $value = strtoupper(trim($value));

        /*
        |--------------------------------------------------------------------------
        | Separate prefix and number
        |--------------------------------------------------------------------------
        */

        if (!preg_match(
            '/^([A-Z0-9]+)-(\d+)$/',
            $value,
            $matches
        )) {

            throw new InvalidStudentIdException(
                "Invalid student ID format."
            );
        }

        $prefix = $matches[1];

        $number = (int)$matches[2];

        /*
        |--------------------------------------------------------------------------
        | Check prefix exists
        |--------------------------------------------------------------------------
        */

        if (!isset(self::RULES[$prefix])) {

            throw new InvalidStudentIdException(
                "Invalid student ID prefix."
            );
        }

        $rule = self::RULES[$prefix];

        /*
        |--------------------------------------------------------------------------
        | Check number range
        |--------------------------------------------------------------------------
        */

        if (
            $number < $rule['min'] ||
            $number > $rule['max']
        ) {

            throw new InvalidStudentIdException(
                "{$prefix} number must be between "
                    . $rule['min']
                    . " and "
                    . $rule['max']
            );
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getYearNumber(): ?int
    {
        if (
            preg_match(
                '/^(\d+)/',
                $this->value,
                $matches
            )
        ) {
            return (int)$matches[1];
        }

        return null;
    }

    public function getDepartmentCode(): ?string
    {
        if (
            preg_match(
                '/^\d+([A-Z]+)-\d+$/',
                $this->value,
                $matches
            )
        ) {
            return $matches[1];
        }

        return null;
    }
}
