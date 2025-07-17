<?php

declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/booking.util.php';

Auth::init();

function getUser()
{
    $loggedUser = Auth::user();
    return $loggedUser['id'];
}

// Connect to database
function connectToDatabase(array $config): PDO
{
    $dsn = "pgsql:host={$config['pgHost']};port={$config['pgPort']};dbname={$config['pgDB']}";
    try {
        $pdo = new PDO($dsn, $config['pgUser'], $config['pgPassword'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        // echo "✅ Connected to database.\n\n";
        return $pdo;
    } catch (PDOException $e) {
        die("❌ Connection failed: " . $e->getMessage() . "\n\n");
    }
}

function bookTrip($pdo, $user_id)
{
    $loggedUser = Auth::user();
    $trip_id = $_REQUEST['trip_id'] ?? null;

    if ($trip_id === '1' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        Booking::createBooking($pdo, $user_id, $trip_id);
    }

    if ($trip_id === '2' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        Booking::createBooking($pdo, $user_id, $trip_id);
    }

    if ($trip_id === '3' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        Booking::createBooking($pdo, $user_id, $trip_id);

    }
    header('Location: /pages/userDashboard/index.php');
}

$pdo = connectToDatabase($databases);
$user_id = getUser();
bookTrip($pdo, $user_id);