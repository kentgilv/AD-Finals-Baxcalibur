<?php
declare(strict_types=1);

include_once UTILS_PATH . "/envSetter.util.php";

class Booking
{
    public static function createBooking(PDO $pdo, $user_id, $trip_id): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO public.\"bookings\"
              (user_id, trip_id)
            VALUES
              (:user_id, :trip_id)
        ");

        $stmt->execute([
            ':user_id' => $user_id,
            ':trip_id' => $trip_id,
        ]);
    }




    function seedAdmins(PDO $pdo, array $admins): void
    {
        echo "\n🌱 Seeding admins…\n";

        $stmt = $pdo->prepare("
        INSERT INTO users (username, first_name, last_name, password, role)
        VALUES (:username, :first_name, :last_name, :password, :role)
    ");

        foreach ($admins as $admin) {
            try {
                $stmt->execute([
                    ':username' => $admin['username'],
                    ':first_name' => $admin['first_name'],
                    ':last_name' => $admin['last_name'],
                    ':password' => password_hash($admin['password'], PASSWORD_DEFAULT),
                    ':role' => $admin['role'],
                ]);
                echo "✅ Inserted admin: {$admin['username']}\n";
            } catch (PDOException $e) {
                echo "❌ Failed to insert admin {$admin['username']}: " . $e->getMessage() . "\n";
            }
        }
    }


    public static function fetchUserBookings(PDO $pdo, string $userId): ?array
    {
        try {
            $stmt = $pdo->prepare('
                SELECT id, user_id, trip_id, payment_status, booking_status, created_at, updated_at
                FROM public."bookings"
                WHERE user_id = :user_id
            ');
            $stmt->execute(['user_id' => $userId]);

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
               $bookings = [];

                foreach ($rows as $row) {
                     $bookings[] = [
                        'id' => $row['id'],
                        'user_id' => $row['user_id'],
                        'trip_id' => $row['trip_id'],
                        'payment_status' => $row['payment_status'],
                        'booking_status' => $row['booking_status'],
                        'created_at' => $row['created_at'],
                        'updated_at' => $row['updated_at']
            ];
        }
        return $bookings;
    }
            return [null];

        } catch (PDOException $e) {
            error_log('[UserPage::fetchCurrentUser] PDOException: ' . $e->getMessage());
            return null;
        }
    }}