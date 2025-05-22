<?php

const BASE_PATH = __DIR__ . '/../';



require BASE_PATH . "Core/" . 'functions.php';

spl_autoload_register(function ($class) {
    // Core\Database
    //require base_path("Core/{$class}.php");
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});


require base_path('Core/router.php');