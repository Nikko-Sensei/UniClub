<?php

namespace App\Home\Infrastructure\Persistence;

use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Home\Domain\Repository\HomeRepositoryInterface;

class HomeRepository
    extends BaseRepository
    implements HomeRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }

    public function getStatistics(): array
    {
        return [];
    }
}