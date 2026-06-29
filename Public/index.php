<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

define('BASE_URL', '/UniClub/Public');

require BASE_PATH . '/vendor/autoload.php';

use App\Shared\Database\Database;

$db = Database::getConnection();


use App\Shared\Core\Router;
use App\Bootstrap;

$container = Bootstrap::create();


$container = Bootstrap::create();


$router = new Router(
    $container
);


require BASE_PATH . '/Routes/web.php';


$router->dispatch(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);