<?php

namespace App\FAQ\Presentation\Controllers;

use App\Shared\Core\BaseController;

class FaqController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * FAQ Page
     */
    public function index()
    {

        $this->view(

            'FAQ/Presentation/Views/index',

            [

                'title' => 'Frequently Asked Questions'

            ],

            'app'

        );

    }

}