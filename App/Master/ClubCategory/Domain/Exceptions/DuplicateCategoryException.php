<?php

namespace App\Master\ClubCategory\Domain\Exceptions;


class DuplicateCategoryException extends ClubCategoryException
{

    public function __construct(
        string $message = "Category already exists."
    )
    {
        parent::__construct($message);
    }

}