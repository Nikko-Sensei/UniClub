<?php

namespace App\PaymentAccount\Domain\Entities;


class PaymentAccount
{


    private ?int $id;

    private ?int $clubId;

    private string $paymentMethod;

    private string $accountName;

    private ?string $accountNumber;

    private ?string $qrImage;

    private ?string $description;

    private string $status;

    private int $createdBy;

    private ?string $createdAt;

    private ?string $updatedAt;




    public function __construct(

        ?int $id,

        ?int $clubId,

        string $paymentMethod,

        string $accountName,

        ?string $accountNumber,

        ?string $qrImage,

        ?string $description,

        string $status = 'active',

        int $createdBy = 0,

        ?string $createdAt = null,

        ?string $updatedAt = null

    ){

        $this->id = $id;

        $this->clubId = $clubId;

        $this->paymentMethod = 
            $paymentMethod;

        $this->accountName = 
            $accountName;

        $this->accountNumber = 
            $accountNumber;

        $this->qrImage = 
            $qrImage;

        $this->description = 
            $description;

        $this->status =
            $status;

        $this->createdBy =
            $createdBy;

        $this->createdAt =
            $createdAt;

        $this->updatedAt =
            $updatedAt;

    }





    public function getId(): ?int
    {
        return $this->id;
    }




    public function getClubId(): ?int
    {
        return $this->clubId;
    }




    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }




    public function getAccountName(): string
    {
        return $this->accountName;
    }




    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }




    public function getQrImage(): ?string
    {
        return $this->qrImage;
    }




    public function getDescription(): ?string
    {
        return $this->description;
    }




    public function getStatus(): string
    {
        return $this->status;
    }




    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }




    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }




    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }


}