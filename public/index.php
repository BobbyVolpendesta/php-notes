<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/" . 'functions.php';

spl_autoload_register(function ($class) {
    // Core\Database
    // require base_path("Core/{$class}.php");
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');


/* 
|--------------------------------------------------
| Routing
|--------------------------------------------------
*/
// Set up Router object and populate its private $routes (via functions called in routes.php)
$router = new \Core\Router();
/* $routes = */require base_path('routes.php');

//Parse the URI from current request
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// Checks if we spoofed POST type using a hidden input; otherwise takes GET or POST (the only two PHP natively supports)
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Debug logging (remove before production)
error_log("---------");
error_log("REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD']);
error_log("Overridden method: $method");
error_log("URI: $uri");
error_log("POST data: " . print_r($_POST, true));
error_log("---------");


$router->route($uri, $method);