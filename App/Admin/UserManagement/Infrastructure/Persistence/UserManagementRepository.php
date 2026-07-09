<?php

namespace App\Admin\UserManagement\Infrastructure\Persistence;

use App\Admin\UserManagement\Domain\Repository\UserManagementRepositoryInterface;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Admin\UserManagement\Domain\Entity\ManagedUser;
use PDO;

class UserManagementRepository extends BaseRepository implements UserManagementRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }


    public function findAll(
        array $filters = [],
        int $limit = 10,
        int $offset = 0
    ): array {

        $sql = "
        SELECT
            users.id,
            users.name,
            users.email,
            users.student_id,
            users.profile_image,
            users.status,

            roles.name AS role_name,
            departments.name AS department_name,
            academic_years.name AS academic_year_name

        FROM users

        INNER JOIN roles
            ON roles.id = users.role_id

        LEFT JOIN departments
            ON departments.id = users.department_id

        LEFT JOIN academic_years
            ON academic_years.id = users.academic_year_id

        WHERE users.deleted_at IS NULL
    ";

        $params = [];

        if (!empty($filters['department_id'])) {
            $sql .= " AND users.department_id = :department_id";
            $params['department_id'] = $filters['department_id'];
        }

        if (!empty($filters['academic_year_id'])) {
            $sql .= " AND users.academic_year_id = :academic_year_id";
            $params['academic_year_id'] = $filters['academic_year_id'];
        }

        $sql .= " ORDER BY users.id DESC
              LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();


        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn(array $row) => $this->mapToManagedUser($row),
            $rows
        );
    }

    public function count(
        array $filters = []
    ): int {

        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE users.deleted_at IS NULL
        ";

        $params = [];


        if (!empty($filters['department_id'])) {

            $sql .= "
                AND users.department_id = :department_id
            ";

            $params['department_id'] = $filters['department_id'];
        }


        if (!empty($filters['academic_year_id'])) {

            $sql .= "
                AND users.academic_year_id = :academic_year_id
            ";

            $params['academic_year_id'] = $filters['academic_year_id'];
        }


        $stmt = $this->db->prepare($sql);

        $stmt->execute($params);


        return (int)$stmt->fetchColumn();
    }

    public function update(
        int $id,
        array $data
    ): bool {

        $sql = "
        UPDATE users SET

            name=:name,
            email=:email,
            student_id=:student_id,
            phone=:phone,
            department_id=:department_id,
            academic_year_id=:academic_year_id,
            role_id=:role_id,
            status=:status

        WHERE id=:id
    ";


        $stmt = $this->db->prepare($sql);


        return $stmt->execute([

            'name' => $data['name'],

            'email' => $data['email'],

            'student_id' => $data['student_id'],

            'phone' => $data['phone'] ?? null,

            'department_id' => $data['department_id'] ?? null,

            'academic_year_id' => $data['academic_year_id'] ?? null,

            'role_id' => $data['role_id'],

            'status' => $data['status'],

            'id' => $id

        ]);
    }

    public function delete(
        int $id
    ): bool {

        $sql = "
        UPDATE users
        SET deleted_at = NOW()
        WHERE id = :id
    ";


        $stmt = $this->db->prepare($sql);


        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function search(
        string $keyword
    ): array {

        $sql = "
            SELECT
                users.id,
                users.name,
                users.email,
                users.student_id,
                users.profile_image,
                users.status,

                roles.name AS role_name,

                departments.name AS department_name,

                academic_years.name AS academic_year_name

            FROM users

            INNER JOIN roles
                ON roles.id = users.role_id

            LEFT JOIN departments
                ON departments.id = users.department_id

            LEFT JOIN academic_years
                ON academic_years.id = users.academic_year_id

            WHERE users.deleted_at IS NULL

            AND
            (
                users.name LIKE :name

                OR users.email LIKE :email

                OR users.student_id LIKE :student_id

                OR roles.name LIKE :role

                OR departments.name LIKE :department

                OR academic_years.name LIKE :academic_year
            )

            ORDER BY users.id DESC
        ";


        $stmt = $this->db->prepare($sql);


        $search = "%{$keyword}%";


        $stmt->execute([
            'name' => $search,
            'email' => $search,
            'student_id' => $search,
            'role' => $search,
            'department' => $search,
            'academic_year' => $search
        ]);


        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return array_map(
            fn(array $row) => $this->mapToManagedUser($row),
            $rows
        );
    }


    public function findById(
        int $id
    ): ?ManagedUser {

        $stmt = $this->db->prepare("
            SELECT

                users.id,

                users.name,

                users.email,

                users.student_id,

                users.profile_image,

                users.phone,

                users.status,

                users.last_login_at,

                users.created_at,

                users.updated_at,

                roles.name AS role_name,

                departments.name AS department_name,

                academic_years.name AS academic_year_name

            FROM users

            INNER JOIN roles
                ON roles.id = users.role_id

            LEFT JOIN departments
                ON departments.id = users.department_id

            LEFT JOIN academic_years
                ON academic_years.id = users.academic_year_id

            WHERE users.id = :id

            AND users.deleted_at IS NULL
        ");


        $stmt->execute([
            'id' => $id
        ]);


        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$row) {
            return null;
        }


        return $this->mapToManagedUser($row);
    }


    private function mapToManagedUser(
        array $row
    ): ManagedUser {

        return new ManagedUser(

            id: (int)$row['id'],

            name: $row['name'],

            email: $row['email'],

            studentId: $row['student_id'] ?? null,

            profileImage: $row['profile_image'] ?? null,

            roleName: $row['role_name'],

            status: $row['status'],

            departmentName: $row['department_name'] ?? null,

            academicYearName: $row['academic_year_name'] ?? null,

            phone: $row['phone'] ?? null,

            lastLoginAt: $row['last_login_at'] ?? null,

            createdAt: $row['created_at'] ?? null,

            updatedAt: $row['updated_at'] ?? null

        );
    }
}