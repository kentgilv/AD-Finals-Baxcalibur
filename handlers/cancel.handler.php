<?php

declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';
require_once UTILS_PATH . '/booking.util.php';
require_once UTILS_PATH . '/cancel.util.php';

Auth::init();

function getUser()
{
    $loggedUser = Auth::user();
    return $loggedUser['id'];
}

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

function cancelUserBooking(PDO $pdo, string $user_id)
{
    $bookings = Booking::fetchUserBookings($pdo, $user_id);
    $user_booking_id = $_REQUEST['booking_id'];

    foreach ($bookings as $booking) {
        if ($booking['id'] === $user_booking_id) {
            Cancel::cancelBooking($pdo, $user_booking_id);
            // echo "✅ Booking cancelled: $user_booking_id\n\n";
            header("Location: /pages/userDashboard/index.php?message=Booking%20cancelled%20successfully");
            exit;
        }
    }

    echo "❌ Booking ID not found or invalid.\n\n";
}

$pdo = connectToDatabase($databases);
$user_id = getUser();
cancelUserBooking($pdo, $user_id);