<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Print environment variables to verify they are loaded
echo 'DB_HOST from $_ENV: ' . $_ENV['DB_HOST'] . PHP_EOL;
echo 'DB_HOST from getenv: ' . getenv('DB_HOST') . PHP_EOL;
echo 'DB_HOST from $_SERVER: ' . $_SERVER['DB_HOST'] . PHP_EOL;
