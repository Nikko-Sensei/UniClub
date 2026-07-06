<?php

namespace App\Club\Club\Application\Factories;

use App\Club\Club\Application\DTOs\ClubDTO;

class ClubFactory
{
    public static function fromArray(array $data): ClubDTO
    {
        return new ClubDTO(
            categoryId: (int) $data['category_id'],
            name: trim($data['name']),
            shortName: $data['short_name'] ?? null,
            description: $data['description'] ?? null,
            mission: $data['mission'] ?? null,
            vision: $data['vision'] ?? null,
            logo: $data['logo'] ?? null,
            banner: $data['banner'] ?? null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            establishedDate: $data['established_date'] ?? null,
            memberLimit: isset($data['member_limit']) ? (int)$data['member_limit'] : null,
            createdBy: $data['created_by'] ?? null,
            status: $data['status'] ?? 'active'
        );
    }
}