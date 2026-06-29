<?php

namespace App\Home\Domain\Repository;

interface HomeRepositoryInterface
{
    public function getStatistics(): array;
}