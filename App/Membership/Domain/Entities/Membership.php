<?php

namespace App\Membership\Domain\Entities;


class Membership
{

    private ?int $id;

    private int $clubId;

    private int $userId;

    private int $clubRoleId;

    private string $status;

    private ?int $approvedBy;

    private ?string $joinedAt;


    public function __construct(
        ?int $id,
        int $clubId,
        int $userId,
        int $clubRoleId,
        string $status = 'pending',
        ?int $approvedBy = null,
        ?string $joinedAt = null
    )
    {

        $this->id = $id;

        $this->clubId = $clubId;

        $this->userId = $userId;

        $this->clubRoleId = $clubRoleId;

        $this->status = $status;

        $this->approvedBy = $approvedBy;

        $this->joinedAt = $joinedAt;

    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getClubId(): int
    {
        return $this->clubId;
    }


    public function getUserId(): int
    {
        return $this->userId;
    }


    public function getClubRoleId(): int
    {
        return $this->clubRoleId;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function getApprovedBy(): ?int
    {
        return $this->approvedBy;
    }


    public function getJoinedAt(): ?string
    {
        return $this->joinedAt;
    }

}