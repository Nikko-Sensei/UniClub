<?php

namespace App\Admin\Settings\Security\Infrastructure\Persistence;

use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use App\Admin\Settings\Security\Domain\Repository\SecuritySettingRepositoryInterface;


class SecuritySettingRepository
extends BaseRepository
implements SecuritySettingRepositoryInterface
{

    public function __construct()
    {

        parent::__construct(
            Database::getConnection()
        );
    }

    public function find(): ?array
    {

        $sql = "
            SELECT *
            FROM security_settings
            LIMIT 1
        ";


        $stmt =
            $this->db->prepare($sql);


        $stmt->execute();


        $result =
            $stmt->fetch();


        return $result ?: null;
    }

    public function update(
        array $data
    ): bool {

        $stmt = $this->db->prepare(
            "
            UPDATE security_settings SET


            allow_registration = ?,


            enable_password_reset = ?,


            password_min_length = ?,


            require_uppercase = ?,


            require_number = ?,


            max_login_attempts = ?,


            lock_time_minutes = ?,


            enable_audit_log = ?,


            maintenance_mode = ?


            WHERE id = 1
            "
        );


        return $stmt->execute([

            $data['allow_registration'],

            $data['enable_password_reset'],

            $data['password_min_length'],

            $data['require_uppercase'],

            $data['require_number'],

            $data['max_login_attempts'],

            $data['lock_time_minutes'],

            $data['enable_audit_log'],

            $data['maintenance_mode']

        ]);
    }
}