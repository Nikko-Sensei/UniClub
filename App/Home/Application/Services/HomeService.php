<?php

namespace App\Home\Application\Services;

use App\Home\Domain\Repository\HomeRepositoryInterface;

class HomeService
{
    public function __construct(
        private HomeRepositoryInterface $repository
    ) {
    }

    public function getHomeData(): array
    {
        return $this->repository
            ->getStatistics();
    }
}