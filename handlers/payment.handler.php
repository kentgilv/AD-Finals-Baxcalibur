<?php

declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';
require_once UTILS_PATH . '/booking.util.php';
require_once UTILS_PATH . '/payment.util.php';

Auth::init();

function getUser(): string
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

function payBooking(PDO $pdo, string $user_id): void
{
    // Check if required data exists in the request
    if (!isset($_REQUEST['booking_id'], $_REQUEST['amount'])) {
        echo "⚠️ booking_id or amount not set. Skipping payment processing.\n\n";
        return;
    }

    $user_booking_id = $_REQUEST['booking_id'];
    $booking_amount = $_REQUEST['amount'];

    $bookings = Booking::fetchUserBookings($pdo, $user_id);

    foreach ($bookings as $booking) {
        if ($booking['id'] === $user_booking_id) {
            Payment::createPayment($pdo, $user_booking_id, $booking_amount);
            Payment::updateBooking($pdo, $user_booking_id);
            // echo "✅ Payment created for booking: $user_booking_id\n\n";
            header('Location: /pages/userDashboard/index.php');
            return;
        }
    }

    echo "❌ Booking ID not found or invalid.\n\n";
}

// === RUN ===
$pdo = connectToDatabase($databases);
$user_id = getUser();
payBooking($pdo, $user_id);
