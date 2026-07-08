<?php

namespace App\Admin\Dashboard\Domain\Repository;

interface DashboardRepositoryInterface
{
    public function getTotalUsers(): int;

    public function getTotalClubs(): int;

    public function getTotalEvents(): int;

    public function getTotalAnnouncements(): int;

    public function getTotalMemberships(): int;

    public function getRecentActivities(int $limit = 10): array;

    public function getUsersByDepartment(): array;

    public function getEventsPerMonth(): array;

    public function getMembershipsByClub(): array;

    public function getUpcomingEvents(int $limit = 5): array;
}