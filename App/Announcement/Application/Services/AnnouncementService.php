<?php

namespace App\Announcement\Application\Services;


use App\Announcement\Domain\Repository\AnnouncementRepositoryInterface;



class AnnouncementService
{


    private AnnouncementRepositoryInterface $repository;



    public function __construct(
        AnnouncementRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }



    /**
     * Create announcement
     */
    public function create(
        array $data
    )
    {

        return $this->repository
            ->create($data);
    }



    /**
     * Update announcement
     */
    public function update(
        int $id,
        array $data
    )
    {

        return $this->repository
            ->update(
                $id,
                $data
            );
    }



    /**
     * Delete announcement
     */
    public function delete(
        int $id
    )
    {

        return $this->repository
            ->delete($id);
    }



    /**
     * Get announcement detail
     */
    public function getAnnouncement(
        int $id
    )
    {

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
    )
    {

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


}