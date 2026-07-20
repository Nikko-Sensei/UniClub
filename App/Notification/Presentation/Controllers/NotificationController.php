<?php

namespace App\Notification\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;
use App\Notification\Application\Services\NotificationService;


class NotificationController extends BaseController
{

    public function __construct(
        private NotificationService $notificationService
    ) {

        parent::__construct();

        $this->notificationService = $notificationService;
    }



    /**
     * Display user notifications
     */
    public function index(): void
    {

        $userId = $_SESSION['user']['id'];


        $notifications =
            $this->notificationService
            ->getUserNotifications($userId);



        $this->view(
            'Notification/Presentation/Views/notifications/index',
            [
                'notifications' => $notifications
            ],
            'Auth'
        );
    }




    /**
     * Mark notification as read
     */
    // public function read(
    //     int $id
    // ): void {


    //     $this->notificationService
    //         ->markAsRead($id);



    //     Response::redirect(
    //         '/notifications'
    //     );
    // }


    public function read(
        int $id
    ): void {


        $notification =
            $this->notificationService
            ->getNotification($id);



        $this->notificationService
            ->markAsRead($id);



        Response::redirect(
            $this->notificationService
                ->getRedirectUrl(
                    $notification
                )
        );
    }




    /**
     * Mark all notifications as read
     */
    public function readAll(): void
    {

        $userId = $_SESSION['user']['id'];



        $this->notificationService
            ->markAllAsRead($userId);



        Flash::set(
            'success',
            'All notifications marked as read.'
        );



        Response::redirect(
            '/notifications'
        );
    }




    /**
     * Get unread notification count
     * Used by navbar AJAX
     */
    public function unreadCount(): void
    {

        $userId =
            $_SESSION['user']['id'];


        $count =
            $this->notificationService
            ->getUnreadCount(
                $userId
            );


        header(
            'Content-Type: application/json'
        );


        echo json_encode([
            'count' => $count
        ]);


        exit;
    }

    public function latest(): void
    {
        $userId = $_SESSION['user']['id'];

        $notifications =
            $this->notificationService
            ->getLatestNotifications(
                $userId
            );


        $data = [];


        foreach ($notifications as $notification) {

            $data[] = [

                'id' => $notification->getId(),

                'title' => $notification->getTitle(),

                'message' => $notification->getMessage(),

                'createdAt' => $notification->getCreatedAt(),

                'isRead' => $notification->isRead()

            ];
        }


        header('Content-Type: application/json');

        echo json_encode($data);

        exit;
    }
}
