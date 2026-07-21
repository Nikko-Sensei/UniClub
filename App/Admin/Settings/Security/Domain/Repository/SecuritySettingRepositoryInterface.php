<?php

namespace App\Admin\Settings\Security\Domain\Repository;


interface SecuritySettingRepositoryInterface
{

    public function find(): ?array;

     public function update(
        array $data
    ): bool;

}