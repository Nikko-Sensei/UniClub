<?php

namespace App\Notification\Domain\Repository;


use App\Notification\Domain\Entity\Notification;


interface NotificationRepositoryInterface
{

    public function create(
        Notification $notification
    ): bool;



    public function findByUser(
        int $userId
    ): array;



    public function countUnread(
        int $userId
    ): int;



    public function markAsRead(
        int $id
    ): bool;



    public function markAllAsRead(
        int $userId
    ): bool;

    public function findLatestByUser(
        int $userId,
        int $limit = 5
    ): array;
}