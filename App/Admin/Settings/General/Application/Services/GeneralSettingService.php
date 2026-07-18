<?php

namespace App\Admin\Settings\General\Application\Services;


use App\Admin\Settings\General\Domain\Repository\GeneralSettingRepositoryInterface;
use App\Admin\Settings\General\Domain\Entities\GeneralSetting;



class GeneralSettingService
{

    private GeneralSettingRepositoryInterface $repository;



    public function __construct(
        GeneralSettingRepositoryInterface $repository
    ) {

        $this->repository =
            $repository;

    }




    public function getSetting(): ?GeneralSetting
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