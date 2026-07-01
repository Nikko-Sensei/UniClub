<?php

namespace App\Auth\Infrastructure\Persistence;

use App\Auth\Domain\Entity\PasswordResetOtp;
use App\Auth\Domain\Repository\PasswordResetRepositoryInterface;
use App\Shared\Database\Database;
use PDO;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function createOtp(int $userId, string $otp, string $expiresAt): bool
    {
        $sql = "
            INSERT INTO password_reset_tokens
            (user_id, otp_code, expires_at)
            VALUES (:user_id, :otp, :expires_at)
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':user_id' => $userId,
            ':otp' => $otp,
            ':expires_at' => $expiresAt
        ]);
    }

    public function findValidOtp(string $email, string $otp): ?PasswordResetOtp
    {
        $sql = "
            SELECT prt.*
            FROM password_reset_tokens prt
            JOIN users u ON u.id = prt.user_id
            WHERE u.email = :email
              AND prt.otp_code = :otp
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':otp' => $otp
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new PasswordResetOtp(
            $data['id'],
            $data['user_id'],
            $data['otp_code'],
            $data['expires_at'],
            $data['used_at']
        );
    }

    public function markUsed(int $otpId): bool
    {
        $sql = "
            UPDATE password_reset_tokens
            SET used_at = NOW()
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $otpId
        ]);
    }
}