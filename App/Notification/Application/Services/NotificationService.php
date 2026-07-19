<?php

namespace App\Notification\Application\Services;


use App\Notification\Domain\Entity\Notification;
use App\Notification\Domain\Repository\NotificationRepositoryInterface;


class NotificationService
{

    public function __construct(
        private NotificationRepositoryInterface $repository
    ) {}



    /**
     * Create notification
     */
    public function create(
        int $userId,
        string $title,
        string $message,
        string $type,
        ?string $referenceType = null,
        ?int $referenceId = null
    ): bool {


        $notification = new Notification(

            0,

            $userId,

            $title,

            $message,

            $type,

            $referenceType,

            $referenceId,

            false,

            date('Y-m-d H:i:s')
        );


        return $this->repository->create(
            $notification
        );
    }




    /**
     * Get user notifications
     */
    public function getUserNotifications(
        int $userId
    ): array {

        return $this->repository->findByUser(
            $userId
        );
    }




    /**
     * Get unread notification count
     */
    public function getUnreadCount(
        int $userId
    ): int {

        return $this->repository->countUnread(
            $userId
        );
    }




    /**
     * Mark notification as read
     */
    public function markAsRead(
        int $id
    ): bool {

        return $this->repository->markAsRead(
            $id
        );
    }




    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(
        int $userId
    ): bool {

        return $this->repository->markAllAsRead(
            $userId
        );
    }

    public function getLatestNotifications(
        int $userId,
        int $limit = 5
    ): array {

        return $this->repository->findLatestByUser(
            $userId,
            $limit
        );
    }

    public function notifyMembershipApproved(
        int $userId,
        int $clubId,
        string $clubName
    ): bool {

        return $this->create(
            $userId,
            'Membership Approved',
            "Your request to join {$clubName} has been approved.",
            'membership_approved',
            'club',
            $clubId
        );
    }

    public function notifyMembershipRejected(
        int $userId,
        int $clubId,
        string $clubName
    ): bool {

        return $this->create(
            $userId,
            'Membership Rejected',
            "Your request to join {$clubName} has been rejected.",
            'membership_rejected',
            'club',
            $clubId
        );
    }

    public function notifyNewEvent(
        int $userId,
        int $eventId,
        string $eventTitle
    ): bool {

        return $this->create(
            $userId,
            'New Event',
            "A new event '{$eventTitle}' has been published.",
            'event_created',
            'event',
            $eventId
        );
    }

    public function notifyEventUpdated(
        int $userId,
        int $eventId,
        string $eventTitle
    ): bool {

        return $this->create(
            $userId,
            'Event Updated',
            "The event '{$eventTitle}' has been updated.",
            'event_updated',
            'event',
            $eventId
        );
    }

    public function notifyAnnouncement(
        int $userId,
        int $announcementId,
        string $title
    ): bool {

        return $this->create(
            $userId,
            'New Announcement',
            $title,
            'announcement_created',
            'announcement',
            $announcementId
        );
    }

    public function notifyMembershipRequest(
        int $userId,
        int $clubId,
        string $studentName,
        string $clubName
    ): bool {

        return $this->create(

            $userId,

            'New Membership Request',

            "{$studentName} requested to join {$clubName}.",

            'membership_request',

            'club',

            $clubId

        );
    }
}
