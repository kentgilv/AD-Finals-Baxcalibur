<?php

declare(strict_types=1);

include_once UTILS_PATH . "/envSetter.util.php";

class Cancel
{
  public static function cancelBooking(PDO $pdo, string $booking_id): void
  {
    $stmt = $pdo->prepare("
        UPDATE public.\"bookings\"
        SET
            booking_status = :booking_status,
            payment_status = :payment_status
        WHERE id = :id
    ");

    $stmt->execute([
      ':booking_status' => 'Cancelled',
      ':payment_status' => 'Cancelled',
      ':id' => $booking_id
    ]);
  }
}
