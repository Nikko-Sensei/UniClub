<?php

namespace App\Admin\Settings\Security\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;
use App\Admin\Settings\Security\Application\Services\SecuritySettingService;



class SecuritySettingController extends BaseController
{


    private SecuritySettingService $service;



    public function __construct(
        SecuritySettingService $service
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
            'Admin/Settings/Security/Presentation/Views/security/index',
            [
                'setting' => $setting
            ],
            'admin'
        );
    }





    public function update(): void
    {


        $data = [

            'allow_registration' =>
            isset($_POST['allow_registration']) ? 1 : 0,


            'enable_password_reset' =>
            isset($_POST['enable_password_reset']) ? 1 : 0,


            'password_min_length' =>
            $_POST['password_min_length'] ?? 8,


            'require_uppercase' =>
            isset($_POST['require_uppercase']) ? 1 : 0,


            'require_number' =>
            isset($_POST['require_number']) ? 1 : 0,


            'max_login_attempts' =>
            $_POST['max_login_attempts'] ?? 5,


            'lock_time_minutes' =>
            $_POST['lock_time_minutes'] ?? 15,

            'enable_rate_limit' =>
            isset($_POST['enable_rate_limit']) ? 1 : 0,


            'rate_limit_attempts' =>
            $_POST['rate_limit_attempts'] ?? 5,


            'rate_limit_minutes' =>
            $_POST['rate_limit_minutes'] ?? 5,


            'enable_audit_log' =>
            isset($_POST['enable_audit_log']) ? 1 : 0,


            'maintenance_mode' =>
            isset($_POST['maintenance_mode']) ? 1 : 0


        ];




        $this->service->update(
            $data
        );



        Flash::set(
            'success',
            'Security settings updated successfully'
        );



        Response::redirect(
            '/admin/settings/security'
        );
    }
}
