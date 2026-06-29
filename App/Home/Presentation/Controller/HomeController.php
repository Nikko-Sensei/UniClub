<?php

namespace App\Home\Presentation\Controller;

use App\Shared\Core\BaseController;

class HomeController extends BaseController
{
   public function index()
    {
        $this->view(
            'Home/Presentation/View/homeView',
            [
                'pageTitle' => 'Home'
            ]
        );
    }
}