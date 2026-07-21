<?php

namespace App\Admin\Settings\Security\Application\Services;


use App\Admin\Settings\Security\Domain\Repository\SecuritySettingRepositoryInterface;


class SecuritySettingService
{

    private SecuritySettingRepositoryInterface $repository;



    public function __construct(
        SecuritySettingRepositoryInterface $repository
    ) {

        $this->repository = $repository;
    }



    public function getSetting(): ?array
    {

        return $this->repository->find();
    }

    public function update(
        array $data
    ): bool {

        return $this->repository->update(
            $data
        );
    }
}
