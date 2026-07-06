<?php

namespace App\Club\Club\Domain\Entities;

class Club
{
    public function __construct(

        public readonly int $id,
        public readonly int $categoryId,
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
        public string $status

    ) {}

    /**
     * Factory method from database array
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: (int) $data['id'],
            categoryId: (int) $data['category_id'],
            name: $data['name'],
            shortName: $data['short_name'] ?? null,
            description: $data['description'] ?? null,
            mission: $data['mission'] ?? null,
            vision: $data['vision'] ?? null,
            logo: $data['logo'] ?? null,
            banner: $data['banner'] ?? null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            establishedDate: $data['established_date'] ?? null,
            memberLimit: isset($data['member_limit'])
                ? (int) $data['member_limit']
                : null,
            status: $data['status'] ?? 'active'
        );
    }
}