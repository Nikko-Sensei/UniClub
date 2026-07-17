<?php

namespace App\Shared\Core;

use App\Shared\Helpers\PermissionHelper;
use App\Shared\Container\Container;

class View
{
    public static function render(
        string $view,
        array $data = [],
        string $layout = 'app'
    ): void {

        extract($data);


        // Base URL available in all views
        $baseUrl = BASE_URL;



        // Permission helper available in all views

        global $container;


        $permission =
            $container->resolve(
                PermissionHelper::class
            );



        $viewFile =
            BASE_PATH .
            '/App/' .
            $view .
            '.php';



        if (!file_exists($viewFile)) {

            throw new \Exception(
                "View not found: {$view}"
            );

        }



        ob_start();

        require $viewFile;

        $content =
            ob_get_clean();



        require BASE_PATH .
            '/App/Shared/Presentation/Views/Layouts/' .
            $layout .
            '.php';

    }
}