<?php

namespace App\Admin\Settings\General\Domain\Repository;

use App\Admin\Settings\General\Domain\Entities\GeneralSetting;

interface GeneralSettingRepositoryInterface
{

    public function find(): ?GeneralSetting;


    public function update(
        array $data
    ): bool;

}