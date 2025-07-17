<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';

// This code prepares environment-based database settings (for PostgreSQL and MongoDB)
// so the application can securely connect to them without hardcoding credentials.

// It loads environment variables from a .env file using the vlucas/phpdotenv library
// and stores them in a $databases array for later use
// (e.g., for connecting to PostgreSQL and MongoDB).

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$databases = [
    'pgHost' => $_ENV['PG_HOST'],
    'pgPort' => $_ENV['PG_PORT'],
    'pgDB' => $_ENV['PG_DB'],
    'pgUser' => $_ENV['PG_USER'],
    'pgPassword' => $_ENV['PG_PASS'],
    // 'mURI' => $_ENV['MONGO_URI'],
    // 'mDB' => $_ENV['MONGO_DB'],
];