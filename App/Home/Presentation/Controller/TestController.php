<?php

namespace App\Home\Presentation\Controller;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;

class TestController extends BaseController
{
    public function index()
    {
        Flash::set(
            'success',
            'System Working Successfully'
        );

        Response::redirect('/');
    }
}