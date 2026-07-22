<?php

namespace App\Admin\Settings\General\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;
use App\Admin\Settings\General\Application\Services\GeneralSettingService;



class GeneralSettingController extends BaseController
{

    private GeneralSettingService $service;



    public function __construct(
        GeneralSettingService $service
    ) {

        parent::__construct();


        $this->service =
            $service;
    }





    public function index(): void
    {

        $setting =
            $this->service->getSetting();



        $this->view(
            'Admin/Settings/General/Presentation/Views/general/index',
            [
                'setting' => $setting
            ],
            'admin'
        );
    }





    // public function update(): void
    // {


    //     $data = [

    //         'site_name' =>
    //             $_POST['site_name'] ?? '',


    //         'university_name' =>
    //             $_POST['university_name'] ?? '',


    //         'address' =>
    //             $_POST['address'] ?? '',


    //         'email' =>
    //             $_POST['email'] ?? '',


    //         'phone' =>
    //             $_POST['phone'] ?? '',


    //         'logo' =>
    //             $_POST['logo'] ?? null,


    //         'favicon' =>
    //             $_POST['favicon'] ?? null,


    //         'timezone' =>
    //             $_POST['timezone'] ?? 'Asia/Yangon'

    //     ];



    //     $this->service->update(
    //         $data
    //     );



    //     Flash::set(
    //         'success',
    //         'General settings updated successfully'
    //     );



    //     Response::redirect(
    //         '/admin/settings/general'
    //     );

    // }



    public function update(): void
    {

        $data = [

            'site_name' =>
            $_POST['site_name'] ?? '',

            'university_name' =>
            $_POST['university_name'] ?? '',

            'address' =>
            $_POST['address'] ?? '',

            'email' =>
            $_POST['email'] ?? '',

            'phone' =>
            $_POST['phone'] ?? '',

            'logo' =>
            $_FILES['logo'] ?? null,

            'timezone' =>
            $_POST['timezone'] ?? 'Asia/Yangon'

        ];


        if (
            isset($_FILES['logo']) &&
            $_FILES['logo']['error'] === UPLOAD_ERR_OK
        ) {

            $data['logo'] =
                $_FILES['logo'];
        }


        $this->service->update($data);


        Flash::set(
            'success',
            'General settings updated successfully'
        );


        Response::redirect(
            '/admin/settings/general'
        );
    }
}