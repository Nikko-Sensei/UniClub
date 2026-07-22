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


        if (
            isset($data['logo'])
            &&
            is_array($data['logo'])
            &&
            $data['logo']['error'] === UPLOAD_ERR_OK
        ) {

            $data['logo'] =
                $this->uploadLogo(
                    $data['logo']
                );

        } else {

            // Keep existing logo
            $setting =
                $this->getSetting();


            $data['logo'] =
                $setting?->getLogo();

        }



        return $this->repository->update(
            $data
        );

    }




    private function uploadLogo(
        array $file
    ): string {


        $uploadDirectory =
            BASE_PATH .
            '/Public/uploads/settings/';



        if (
            !is_dir($uploadDirectory)
        ) {

            mkdir(
                $uploadDirectory,
                0777,
                true
            );

        }



        $extension =
            strtolower(
                pathinfo(
                    $file['name'],
                    PATHINFO_EXTENSION
                )
            );



        $filename =
            'logo_' .
            time() .
            '.' .
            $extension;



        $destination =
            $uploadDirectory .
            $filename;



        move_uploaded_file(
            $file['tmp_name'],
            $destination
        );



        return
            'uploads/settings/' .
            $filename;

    }


}