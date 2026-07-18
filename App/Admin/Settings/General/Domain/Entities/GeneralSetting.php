<?php

namespace App\Admin\Settings\General\Domain\Entities;


class GeneralSetting
{

    public function __construct(

        private int $id,

        private string $siteName,

        private string $universityName,

        private ?string $address,

        private ?string $email,

        private ?string $phone,

        private ?string $logo,

        private ?string $favicon,

        private ?string $timezone

    ) {}



    public function getId(): int
    {
        return $this->id;
    }


    public function getSiteName(): string
    {
        return $this->siteName;
    }


    public function getUniversityName(): string
    {
        return $this->universityName;
    }


    public function getAddress(): ?string
    {
        return $this->address;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function getPhone(): ?string
    {
        return $this->phone;
    }


    public function getLogo(): ?string
    {
        return $this->logo;
    }


    public function getFavicon(): ?string
    {
        return $this->favicon;
    }


    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

}