<?php

namespace App\Notification\Infrastructure\Persistence;


use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use App\Notification\Domain\Entity\Notification;
use App\Notification\Domain\Repository\NotificationRepositoryInterface;
use PDO;


class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function create(
        Notification $notification
    ): bool {

        $sql = "
            CALL sp_notification_create(
                ?,?,?,?,?,?
            )
        ";


        $stmt = $this->db->prepare($sql);


        $result = $stmt->execute([
            $notification->getUserId(),
            $notification->getTitle(),
            $notification->getMessage(),
            $notification->getType(),
            $notification->getReferenceType(),
            $notification->getReferenceId()
        ]);


        $stmt->closeCursor();


        return $result;
    }



    public function findByUser(
        int $userId
    ): array {


        $sql = "
            CALL sp_notification_find_by_user(?)
        ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([
            $userId
        ]);



        $notifications = [];


        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $notifications[] =
                $this->mapToNotification($row);
        }



        $stmt->closeCursor();



        return $notifications;
    }




    public function countUnread(
        int $userId
    ): int {


        $sql = "
            CALL sp_notification_count_unread(?)
        ";


        $stmt = $this->db->prepare($sql);


        $stmt->execute([
            $userId
        ]);



        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt->closeCursor();



        return (int)$result['total'];
    }




    public function markAsRead(
        int $id
    ): bool {


        $sql = "
            CALL sp_notification_mark_read(?)
        ";


        $stmt = $this->db->prepare($sql);



        $result = $stmt->execute([
            $id
        ]);



        $stmt->closeCursor();



        return $result;
    }




    public function markAllAsRead(
        int $userId
    ): bool {


        $sql = "
            CALL sp_notification_mark_all_read(?)
        ";


        $stmt = $this->db->prepare($sql);



        $result = $stmt->execute([
            $userId
        ]);



        $stmt->closeCursor();



        return $result;
    }

    public function findLatestByUser(
    int $userId,
    int $limit = 5
): array {


    $sql = "
        CALL sp_notification_find_latest(?,?)
    ";


    $stmt = $this->db->prepare($sql);


    $stmt->execute([
        $userId,
        $limit
    ]);



    $notifications = [];



    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {

        $notifications[] =
            $this->mapToNotification($row);

    }



    $stmt->closeCursor();



    return $notifications;
}




    private function mapToNotification(
        array $row
    ): Notification {


        return new Notification(

            (int)$row['id'],

            (int)$row['user_id'],

            $row['title'],

            $row['message'],

            $row['type'],

            $row['reference_type'] ?? null,

            isset($row['reference_id'])
                ? (int)$row['reference_id']
                : null,

            (bool)$row['is_read'],

            $row['created_at']
        );
    }

}