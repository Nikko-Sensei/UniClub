<?php

namespace App\Admin\Dashboard\Application\Services;

use App\Admin\Dashboard\Application\DTOs\DashboardDTO;
use App\Admin\Dashboard\Domain\Repository\DashboardRepositoryInterface;

class DashboardService
{
    public function __construct(
        private DashboardRepositoryInterface $dashboardRepository
    ) {}


    public function getDashboardData(): DashboardDTO
    {
        return new DashboardDTO(
            totalUsers: $this->dashboardRepository->getTotalUsers(),

            totalClubs: $this->dashboardRepository->getTotalClubs(),

            totalEvents: $this->dashboardRepository->getTotalEvents(),

            totalAnnouncements: $this->dashboardRepository->getTotalAnnouncements(),

            totalMemberships: $this->dashboardRepository->getTotalMemberships(),
            
            usersByDepartment: $this->dashboardRepository->getUsersByDepartment(),

            eventsPerMonth: $this->dashboardRepository->getEventsPerMonth(),

            membershipsByClub: $this->dashboardRepository->getMembershipsByClub(),

            recentActivities: $this->dashboardRepository->getRecentActivities(),
            
            upcomingEvents: $this->dashboardRepository->getUpcomingEvents()

        );
    }
}