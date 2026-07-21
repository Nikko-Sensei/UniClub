<?php

namespace App\Admin\Settings\Security\Application\Services;


use App\Admin\Settings\Security\Domain\Repository\SecuritySettingRepositoryInterface;
use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;

class SecuritySettingService
{

    private SecuritySettingRepositoryInterface $repository;

    private AuditLogger $auditLogger;

    public function __construct(
        SecuritySettingRepositoryInterface $repository,
        AuditLogger $auditLogger
    ) {

        $this->repository = $repository;

        $this->auditLogger = $auditLogger;
    }



    public function getSetting(): ?array
    {

        return $this->repository->find();
    }

    public function update(
        array $data
    ): bool {


        $result =
            $this->repository
            ->update($data);



        if ($result) {


            $this->auditLogger->log(

                AuditAction::UPDATE_SECURITY_SETTINGS,

                $_SESSION['user']['id'] ?? null,

                'SecuritySetting',

                null,

                [
                    'changes' => $data
                ]

            );
        }



        return $result;
    }
}
