<?php

namespace App\Auth\Infrastructure\Persistence;


use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use App\Auth\Domain\Repository\LoginAttemptRepositoryInterface;


class LoginAttemptRepository
extends BaseRepository
implements LoginAttemptRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function findByEmail(
        string $email
    ): ?array {


        $stmt = $this->db->prepare(
            "
            SELECT *
            FROM login_attempts
            WHERE email = ?
            "
        );


        $stmt->execute([
            $email
        ]);


        $result = $stmt->fetch();


        return $result ?: null;
    }




    public function increase(
        string $email
    ): bool {


        $stmt = $this->db->prepare(
            "
            INSERT INTO login_attempts
            (
                email,
                attempts,
                last_attempt_at
            )

            VALUES
            (
                ?,
                1,
                NOW()
            )

            ON DUPLICATE KEY UPDATE

            attempts = attempts + 1,

            last_attempt_at = NOW()
            "
        );


        return $stmt->execute([
            $email
        ]);
    }




    public function reset(
        string $email
    ): bool {


        $stmt = $this->db->prepare(
            "
            DELETE FROM login_attempts
            WHERE email = ?
            "
        );


        return $stmt->execute([
            $email
        ]);
    }





    public function lock(
        string $email,
        int $minutes
    ): bool {


        $stmt = $this->db->prepare(
            "
            UPDATE login_attempts

            SET locked_until =
            DATE_ADD(
                NOW(),
                INTERVAL ? MINUTE
            )

            WHERE email = ?
            "
        );


        return $stmt->execute([
            $minutes,
            $email
        ]);
    }

}