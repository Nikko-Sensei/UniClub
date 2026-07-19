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
            'notifications/index',
            [
                'notifications' => $notifications
            ],
            'layouts/app'
        );
    }




    /**
     * Mark notification as read
     */
    public function read(
        int $id
    ): void {


        $this->notificationService
            ->markAsRead($id);



        Response::redirect(
            BASE_URL . '/notifications'
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
            BASE_URL . '/notifications'
        );
    }




    /**
     * Get unread notification count
     * Used by navbar AJAX
     */
    public function unreadCount(): void
    {

        $userId = $_SESSION['user']['id'];



        $count =
            $this->notificationService
            ->getUnreadCount($userId);



        header(
            'Content-Type: application/json'
        );



        echo json_encode([
            'count' => $count
        ]);
    }

    /**
     * Get latest notifications
     * Used by navbar dropdown AJAX
     */
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

                'id' =>
                $notification->getId(),


                'title' =>
                $notification->getTitle(),


                'message' =>
                $notification->getMessage(),


                'isRead' =>
                $notification->isRead(),


                'createdAt' =>
                $notification->getCreatedAt()

            ];
        }



        header(
            'Content-Type: application/json'
        );



        echo json_encode($data);
    }
}
