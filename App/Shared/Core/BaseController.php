<?php

namespace App\Shared\Core;

class BaseController
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    protected function view(
        string $view,
        array $data = [],
        string $layout = 'app'
    ): void {

        View::render(
            $view,
            $data,
            $layout
        );
    }
}