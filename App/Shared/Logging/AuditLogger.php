<?php

namespace App\Shared\Logging;


use PDO;


class AuditLogger
{
    private PDO $db;

    public function __construct(
        PDO $db
    ) {

        $this->db = $db;
    }

    public function log(
        string $action,
        ?int $userId = null,
        ?string $entity = null,
        ?int $entityId = null,
        array $details = []
    ): void {

        $sql = "
            INSERT INTO audit_logs
            (
                user_id,
                action,
                entity,
                entity_id,
                ip_address,
                user_agent,
                details
            )

            VALUES
            (
                :user_id,
                :action,
                :entity,
                :entity_id,
                :ip_address,
                :user_agent,
                :details
            )
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([

            'user_id' =>
                $userId,

            'action' =>
                $action,

            'entity' =>
                $entity,

            'entity_id' =>
                $entityId,

            'ip_address' =>
                $_SERVER['REMOTE_ADDR'] ?? null,

            'user_agent' =>
                $_SERVER['HTTP_USER_AGENT'] ?? null,

            'details' =>
                json_encode($details)

        ]);
    }
}