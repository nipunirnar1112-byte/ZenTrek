<?php
// config.example.php
// Copy this file to `config.php` and update the values for your environment.
// Do NOT commit your `config.php` with production credentials.

return [
    'db' => [
        'host' => '127.0.0.1',
        'name' => 'zentrek',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8mb4',
    ],

    // Optional settings
    'app' => [
        'base_url' => 'http://localhost/zentrek',
        'debug' => true,
    ],
];

/* Example usage:

$config = require __DIR__ . '/config.php';
$dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
$pdo = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

*/
