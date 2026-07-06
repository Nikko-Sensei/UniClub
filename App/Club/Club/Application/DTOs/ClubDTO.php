<?php

namespace App\Club\Club\Application\DTOs;

class ClubDTO
{
    public function __construct(

        public int $categoryId,

        public string $name,

        public ?string $shortName,

        public ?string $description,

        public ?string $mission,

        public ?string $vision,

        public ?string $logo,

        public ?string $banner,

        public ?string $email,

        public ?string $phone,

        public ?string $establishedDate,

        public ?int $memberLimit,

        public ?int $createdBy,

        public ?string $status = 'active'

    ) {}
}