<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

// Load static data
$admins = require STATIC_DATAS_PATH . '/admins.staticData.php';
$trips = require STATIC_DATAS_PATH . '/trips.staticData.php';

// Create PDO connection
function connectToDatabase(array $config): PDO {
    $dsn = "pgsql:host={$config['pgHost']};port={$config['pgPort']};dbname={$config['pgDB']}";
    try {
        $pdo = new PDO($dsn, $config['pgUser'], $config['pgPassword'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        echo "✅ Connected to database.\n\n";
        return $pdo;
    } catch (PDOException $e) {
        die("❌ Connection failed: " . $e->getMessage() . "\n\n");
    }
}

// Apply schema files
function applyModels(PDO $pdo, array $modelFiles): void {
    foreach ($modelFiles as $table => $path) {
        echo "📄 Applying model from $table [$path]...\n";
        $sql = @file_get_contents($path);

        if ($sql === false) {
            echo "❌ Could not read $path\n";
            continue;
        }

        try {
            $pdo->exec($sql);
            echo "✅ model applied: $table\n";
        } catch (PDOException $e) {
            echo "❌ Error applying model for $table: " . $e->getMessage() . "\n";
        }
    }
}

// Seed users
function seedAdmins(PDO $pdo, array $admins): void {
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

function seedTrips(PDO $pdo, array $trips): void {
    echo "\n🌱 Seeding Trips…\n";

    $stmt = $pdo->prepare("
        INSERT INTO trips (destination, description, booking_date, start_time, end_time, price)
        VALUES (:destination, :description, :booking_date, :start_time, :end_time, :price)
    ");

    foreach ($trips as $trip) {
        try {
            $stmt->execute([
                ':destination' => $trip['destination'],
                ':description' => $trip['description'],
                ':booking_date' => $trip['booking_date'],
                ':start_time' => $trip['start_time'],
                ':end_time' => $trip['end_time'],
                ':price' => $trip['price'],
            ]);
            echo "✅ Inserted trip: {$trip['destination']}\n";
        } catch (PDOException $e) {
            echo "❌ Failed to insert trip {$trip['destination']}: " . $e->getMessage() . "\n";
        }
    }
}

// Main execution
$pdo = connectToDatabase($databases);

applyModels($pdo, [
    'users'    => 'database/users.model.sql',
    'trips'    => 'database/trips.model.sql',
    'bookings' => 'database/bookings.model.sql',
    'payments' => 'database/payments.model.sql',
]);

seedAdmins($pdo, $admins);
seedTrips($pdo, $trips);

echo "\n🏁 Database Seeding complete.\n";