<?php

namespace App\Master\ClubCategory\Domain\Exceptions;


class CategoryNotFoundException extends ClubCategoryException
{

    public function __construct(
        string $message = "Category not found."
    )
    {
        parent::__construct($message);
    }

}