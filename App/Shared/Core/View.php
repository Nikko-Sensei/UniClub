<?php

namespace App\Shared\Core;

// class View
// {
//     public static function render(
//         string $view,
//         array $data = [],
//         string $layout = 'app'
//     ): void {

//         extract($data);

//         $viewFile = BASE_PATH .
//             '/App/' .
//             $view .
//             '.php';

//         if (!file_exists($viewFile)) {
//             throw new \Exception("View not found: {$view}");
//         }

//         // Capture the view output
//         ob_start();

//         require $viewFile;

//         $content = ob_get_clean();

//         // Load the selected layout
//         require BASE_PATH .
//             '/App/Shared/Presentation/Views/Layouts/' .
//             $layout .
//             '.php';
//     }
// }class View
{
    
class View
{
public static function render(
        string $view,
        array $data = [],
        string $layout = 'app'
    ): void {

        extract($data);

        // ✅ make base URL available in all views
        $baseUrl = BASE_URL;

        $viewFile = BASE_PATH . '/App/' . $view . '.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("View not found: {$view}");
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require BASE_PATH . '/App/Shared/Presentation/Views/Layouts/' . $layout . '.php';
    }
}
}