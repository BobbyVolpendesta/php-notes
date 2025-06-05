<?php

//check if site is running on locally (PHP's built-in server) or via github (Codespaces)
$inCodespaces = getenv('CODESPACES') || getenv('CODESPACE_NAME');
if ($inCodespaces) {
    error_log("✅ Running in Codespaces — using SQLite");
} else {
    error_log("🖥️ Running locally — using MySQL");
}

return [
    'database' => $inCodespaces
    ? [
        'driver' => 'sqlite',
        'database' => base_path('database/codespaces.sqlite')
    ]
    :
    [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => 3306,
        'dbname' => 'myapp',
        'charset' => 'utf8mb4'
    ]
];