<?php

namespace App\User\Infrastructure\Persistence;

use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }

    public function create(
        User $user
    ): bool {

        $sql = "
            INSERT INTO users
            (
                role_id,
                department_id,
                academic_year_id,
                student_id,
                name,
                email,
                password,
                phone,
                profile_image,
                status
            )
            VALUES
            (
                :role_id,
                :department_id,
                :academic_year_id,
                :student_id,
                :name,
                :email,
                :password,
                :phone,
                :profile_image,
                :status
            )
            ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'role_id' => $user->getRoleId(),
            'department_id' => $user->getDepartmentId(),
            'academic_year_id' => $user->getAcademicYearId(),
            'student_id' => $user->getStudentId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'phone' => $user->getPhone(),
            'profile_image' => $user->getProfileImage(),
            'status' => $user->getStatus(),
        ]);
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email LIMIT 1"
        );

        $stmt->execute([
            'email' => $email
        ]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return $this->mapToUser($row);
    }

    public function findById(int $id): ?User
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE id = :id LIMIT 1"
        );

        $stmt->execute([
            'id' => $id
        ]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return $this->mapToUser($row);
    }

    public function findByStudentId(
        string $studentId
    ): ?User {

        $stmt = $this->db->prepare(
            "SELECT * FROM users 
         WHERE student_id = :student_id 
         LIMIT 1"
        );

        $stmt->execute([
            'student_id' => $studentId
        ]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return $this->mapToUser($row);
    }

    public function updateLastLogin(int $id): bool
    {
        $stmt = $this->db->prepare("
        UPDATE users
        SET last_login_at = NOW()
        WHERE id = :id
    ");

        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function updatePassword(
        int $userId,
        string $password
    ): bool {

        $sql = "

        UPDATE users

        SET password = :password

        WHERE id = :id

    ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            'password' => $password,

            'id' => $userId

        ]);
    }

    private function mapToUser(array $row): User
    {
        return new User(
            id: (int) $row['id'],

            roleId: (int) $row['role_id'],

            departmentId: isset($row['department_id'])
                ? (int) $row['department_id']
                : null,

            academicYearId: isset($row['academic_year_id'])
                ? (int) $row['academic_year_id']
                : null,

            studentId: $row['student_id'],

            name: $row['name'],

            email: $row['email'],

            password: $row['password'],

            phone: $row['phone'],

            profileImage: $row['profile_image'],

            status: $row['status'],

            lastLoginAt: $row['last_login_at'],

            createdAt: $row['created_at'],

            updatedAt: $row['updated_at']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id DESC");
        $rows = $stmt->fetchAll();

        return array_map(fn($row) => $this->mapToUser($row), $rows);
    }

    public function updateProfile(
        int $id,
        string $name,
        ?string $phone,
        ?string $profileImage
    ): bool {

        if ($profileImage !== null) {

            $sql = "
            UPDATE users
            SET name = :name,
                phone = :phone,
                profile_image = :profile_image,
                updated_at = NOW()
            WHERE id = :id
        ";

            $params = [
                'id' => $id,
                'name' => $name,
                'phone' => $phone,
                'profile_image' => $profileImage
            ];
        } else {

            $sql = "
            UPDATE users
            SET name = :name,
                phone = :phone,
                updated_at = NOW()
            WHERE id = :id
        ";

            $params = [
                'id' => $id,
                'name' => $name,
                'phone' => $phone
            ];
        }

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($params);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $stmt = $this->db->prepare("
        UPDATE users
        SET status = :status,
            updated_at = NOW()
        WHERE id = :id
    ");

        return $stmt->execute([
            'id' => $id,
            'status' => $status
        ]);
    }

    public function search(string $keyword): array
    {
        $stmt = $this->db->prepare("
        SELECT * FROM users
        WHERE name LIKE :keyword
           OR email LIKE :keyword
           OR student_id LIKE :keyword
        ORDER BY id DESC
    ");

        $stmt->execute([
            'keyword' => "%$keyword%"
        ]);

        $rows = $stmt->fetchAll();

        return array_map(fn($row) => $this->mapToUser($row), $rows);
    }

  
}