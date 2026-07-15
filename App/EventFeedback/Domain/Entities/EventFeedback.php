<?php

namespace App\EventFeedback\Domain\Entities;


class EventFeedback
{

    private int $id;

    private int $eventId;

    private int $userId;

    private ?string $userName;

    private ?string $eventTitle;

    private int $rating;

    private ?string $comment;

    private string $createdAt;



    public function __construct(
        int $id,
        int $eventId,
        int $userId,
        int $rating,
        ?string $comment,
        string $createdAt,
        ?string $userName = null,
        ?string $eventTitle = null
    ) {

        $this->id = $id;

        $this->eventId = $eventId;

        $this->userId = $userId;

        $this->rating = $rating;

        $this->comment = $comment;

        $this->createdAt = $createdAt;

        $this->userName = $userName;

        $this->eventTitle = $eventTitle;
    }



    public function getId(): int
    {
        return $this->id;
    }



    public function getEventId(): int
    {
        return $this->eventId;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }


    public function getEventTitle(): ?string
    {
        return $this->eventTitle;
    }



    public function getRating(): int
    {
        return $this->rating;
    }



    public function getComment(): ?string
    {
        return $this->comment;
    }



    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
