<?php

namespace App\EventAttendance\Domain\Entities;


class EventAttendance
{


    private ?int $id;


    private int $eventId;


    private int $userId;


    private string $attendanceStatus;


    private ?int $checkedBy;


    private ?string $checkedAt;


    private ?string $updatedAt;




    public function __construct(

        ?int $id,

        int $eventId,

        int $userId,

        string $attendanceStatus,

        ?int $checkedBy = null,

        ?string $checkedAt = null,

        ?string $updatedAt = null

    )
    {

        $this->id = $id;

        $this->eventId = $eventId;

        $this->userId = $userId;

        $this->attendanceStatus = $attendanceStatus;

        $this->checkedBy = $checkedBy;

        $this->checkedAt = $checkedAt;

        $this->updatedAt = $updatedAt;

    }






    public function getId(): ?int
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




    public function getAttendanceStatus(): string
    {
        return $this->attendanceStatus;
    }




    public function getCheckedBy(): ?int
    {
        return $this->checkedBy;
    }




    public function getCheckedAt(): ?string
    {
        return $this->checkedAt;
    }




    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }






    /*
        Domain Rules
    */


    public function isPresent(): bool
    {

        return $this->attendanceStatus === 'present';

    }





    public function isAbsent(): bool
    {

        return $this->attendanceStatus === 'absent';

    }






    public function markPresent(
        int $checkedBy
    ): void
    {

        $this->attendanceStatus = 'present';


        $this->checkedBy = $checkedBy;


        $this->checkedAt =
            date('Y-m-d H:i:s');

    }





    public function markAbsent(
        int $checkedBy
    ): void
    {

        $this->attendanceStatus = 'absent';


        $this->checkedBy = $checkedBy;


        $this->checkedAt =
            date('Y-m-d H:i:s');

    }



}