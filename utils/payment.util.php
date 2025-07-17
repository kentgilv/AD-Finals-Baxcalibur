<?php
declare(strict_types=1);

include_once UTILS_PATH . "/envSetter.util.php";

class Payment
{
  public static function createPayment(PDO $pdo, string $booking_id, $booking_amount): void
  {
    $stmt = $pdo->prepare("
            INSERT INTO public.\"payments\"
              (booking_id, amount)
            VALUES
              (:booking_id, :amount)
        ");

    $stmt->execute([
      ':booking_id' => $booking_id,
      ':amount' => $booking_amount
    ]);
  }

  public static function updateBooking(PDO $pdo, string $booking_id): void
  {
    $stmt = $pdo->prepare("
        UPDATE public.\"bookings\"
        SET
            payment_status = :payment_status,
            booking_status = :booking_status
        WHERE id = :id
    ");

    $stmt->execute([
      ':payment_status' => 'Paid',
      ':booking_status' => 'Booked',
      ':id' => $booking_id
    ]);
  }
}