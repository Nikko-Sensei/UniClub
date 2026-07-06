<?php

namespace App\Club\Club\Infrastructure\Persistence;

use PDO;
use App\Shared\Database\Database;
use App\Club\Club\Application\DTOs\ClubDTO;
use App\Club\Club\Domain\Entities\Club;
use App\Club\Club\Domain\Repository\ClubRepositoryInterface;

class ClubRepository implements ClubRepositoryInterface
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function existsByName(string $name): bool
    {
        $stmt = $this->connection->prepare("CALL sp_club_exists_by_name(?)");
        $stmt->execute([$name]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($result['total'] ?? 0) > 0;
    }

    public function existsByNameExcept(int $id, string $name): bool
    {
        $stmt = $this->connection->prepare("CALL sp_club_exists_by_name_except(?, ?)");
        $stmt->execute([$id, $name]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($result['total'] ?? 0) > 0;
    }

    public function create(ClubDTO $dto): int
    {
        $stmt = $this->connection->prepare("CALL sp_club_create(?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->execute([
            $dto->categoryId,
            $dto->name,
            $dto->shortName,
            $dto->description,
            $dto->mission,
            $dto->vision,
            $dto->logo,
            $dto->banner,
            $dto->email,
            $dto->phone,
            $dto->establishedDate,
            $dto->memberLimit,
            $dto->createdBy
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($result['id'] ?? 0);
    }

    public function findById(int $id): ?Club
    {
        $stmt = $this->connection->prepare("CALL sp_club_find_by_id(?)");
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if (!$data) {
            return null;
        }

        return Club::fromArray($data);
    }

    public function findAll(): array
    {
        $stmt = $this->connection->prepare("CALL sp_club_find_all()");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }

    public function findAllWithDetails(): array
    {
        $stmt = $this->connection->prepare("CALL sp_club_find_all_with_details()");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }

    public function update(int $id, ClubDTO $dto): bool
    {
        $stmt = $this->connection->prepare("CALL sp_club_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->execute([
            $id,
            $dto->categoryId,
            $dto->name,
            $dto->shortName,
            $dto->description,
            $dto->mission,
            $dto->vision,
            $dto->logo,
            $dto->banner,
            $dto->email,
            $dto->phone,
            $dto->establishedDate,
            $dto->memberLimit,
            $dto->status
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($result['affected'] ?? 0) > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->connection->prepare("CALL sp_club_delete(?)");
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($result['affected'] ?? 0) > 0;
    }

    public function getStatistics(): array
    {
        $stmt = $this->connection->prepare("CALL sp_club_statistics()");
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data ?: [
            'total_clubs' => 0,
            'active_clubs' => 0,
            'categories' => 0,
            'total_members' => 0
        ];
    }
}