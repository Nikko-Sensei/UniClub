<?php

namespace App\Shared\Helpers;


use App\Admin\Settings\Security\Application\Services\SecuritySettingService;



class SecuritySettingHelper
{


    private SecuritySettingService $service;



    public function __construct(
        SecuritySettingService $service
    )
    {

        $this->service = $service;

    }





    public function get(): array
    {

        return $this->service->getSetting() ?? [];

    }




    public function enabled(
        string $key
    ): bool
    {

        $setting = $this->get();


        return !empty(
            $setting[$key]
        );

    }




    public function value(
        string $key,
        mixed $default = null
    ): mixed
    {

        $setting = $this->get();


        return $setting[$key] ?? $default;

    }


}