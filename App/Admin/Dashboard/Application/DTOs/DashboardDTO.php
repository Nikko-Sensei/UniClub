<?php

namespace App\Admin\Dashboard\Application\DTOs;

class DashboardDTO
{
    public function __construct(

        public readonly int $totalUsers,

        public readonly int $totalClubs,

        public readonly int $totalEvents,

        public readonly int $totalAnnouncements,

        public readonly int $totalMemberships,

        public readonly array $recentActivities,

        public readonly array $usersByDepartment,

        public readonly array $eventsPerMonth,

        public readonly array $membershipsByClub,
        
        public readonly array $upcomingEvents

    ) {
    }
}