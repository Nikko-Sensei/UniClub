<?php

namespace App\Announcement\Application\Services;


use App\Announcement\Domain\Repository\AnnouncementRepositoryInterface;
use App\Notification\Application\Services\NotificationService;
use App\User\Application\Services\UserService;
use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;



class AnnouncementService
{


    private AnnouncementRepositoryInterface $repository;

    private NotificationService $notificationService;

    private UserService $userService;

    private AuditLogger $auditLogger;

    public function __construct(
        AnnouncementRepositoryInterface $repository,
        NotificationService $notificationService,
        UserService $userService,
        AuditLogger $auditLogger
    ) {
        $this->repository = $repository;

        $this->notificationService = $notificationService;

        $this->userService = $userService;

        $this->auditLogger = $auditLogger;
    }



    /**
     * Create announcement
     */
    // public function create(
    //     array $data
    // ) {

    //     return $this->repository
    //         ->create($data);
    // }

    public function create(
        array $data
    ) {


        $announcement =
            $this->repository
            ->create($data);



        if (
            $announcement  &&
            $data['status'] === 'published'
        ) {


            $members =
                $this->repository
                ->findClubMembers(
                    $data['club_id']
                );



            foreach ($members as $member) {


                $this->notificationService
                    ->notifyAnnouncement(

                        $member['user_id'],

                        $announcement['id'],

                        $data['title']

                    );
            }
        }

        if ($announcement) {


            $this->auditLogger->log(

                AuditAction::CREATE_ANNOUNCEMENT,

                $_SESSION['user']['id'] ?? null,

                'Announcement',

                $announcement['id'],

                [
                    'title' => $data['title']
                ]

            );
        }
        return $announcement;
    }



    /**
     * Update announcement
     */
    // public function update(
    //     int $id,
    //     array $data
    // ) {

    //     return $this->repository
    //         ->update(
    //             $id,
    //             $data
    //         );
    // }

    public function update(
        int $id,
        array $data
    ) {


        $oldAnnouncement =
            $this->repository
            ->findById($id);



        $result =
            $this->repository
            ->update(
                $id,
                $data
            );



        if (
            $result
            &&
            $oldAnnouncement
            &&
            $oldAnnouncement->getStatus() !== 'published'
            &&
            $data['status'] === 'published'
        ) {


            $members =
                $this->repository
                ->findClubMembers(
                    $oldAnnouncement->getClubId()
                );



            foreach ($members as $member) {


                $this->notificationService
                    ->notifyAnnouncement(

                        $member['user_id'],

                        $id,

                        $data['title']

                    );
            }
        }

        if ($result) {


            $this->auditLogger->log(

                AuditAction::UPDATE_ANNOUNCEMENT,

                $_SESSION['user']['id'] ?? null,

                'Announcement',

                $id,

                [
                    'title' => $data['title']
                ]

            );
        }

        return $result;
    }



    /**
     * Delete announcement
     */
    public function delete(
        int $id
    ) {


        $announcement =
            $this->repository
            ->findById($id);



        $result =
            $this->repository
            ->delete($id);



        if ($result) {


            $this->auditLogger->log(

                AuditAction::DELETE_ANNOUNCEMENT,

                $_SESSION['user']['id'] ?? null,

                'Announcement',

                $id,

                [
                    'title' =>
                    $announcement?->getTitle()
                ]

            );
        }



        return $result;
    }



    /**
     * Get announcement detail
     */
    public function getAnnouncement(
        int $id
    ) {

        return $this->repository
            ->findById($id);
    }



    /**
     * Get all announcements
     */
    public function getAnnouncements(
        int $page,
        int $limit,
        array $filters = []
    ): array {


        $page = max(
            1,
            $page
        );



        $announcements =
            $this->repository
            ->findAll(
                $page,
                $limit,
                $filters
            );



        $total =
            $this->repository
            ->count(
                $filters
            );



        return [

            'announcements' =>
            $announcements,


            'pagination' => [

                'current_page' =>
                $page,


                'per_page' =>
                $limit,


                'total' =>
                $total,


                'total_pages' =>
                (int) ceil(
                    $total / $limit
                )

            ]

        ];
    }



    /**
     * Get announcements by club
     */
    public function getClubAnnouncements(
        int $clubId
    ) {

        return $this->repository
            ->findByClub($clubId);
    }



    /**
     * Get published announcements
     */
    public function getPublishedAnnouncements()
    {

        return $this->repository
            ->findPublished();
    }

    // public function getAnnouncementsForUser(
    //     int $userId
    // ): array {

    //     return $this->repository
    //         ->findForUser($userId);
    // }


    public function getAnnouncementsForUser(

        int $userId,

        array $filters = []

    ): array {


        return $this->repository
            ->findForUser(

                $userId,

                $filters

            );
    }

    private function notifyStudents(
        int $announcementId,
        string $title
    ): void {


        $students =
            $this->userService
            ->getStudents();



        foreach ($students as $student) {


            $this->notificationService
                ->notifyAnnouncement(

                    $student->getId(),

                    $announcementId,

                    $title

                );
        }
    }
}
