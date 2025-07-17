<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

// Connects to database
function connectToDatabase(array $config): PDO {
    $dsn = sprintf("pgsql:host=%s;port=%s;dbname=%s", $config['pgHost'], $config['pgPort'], $config['pgDB']);

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

// Check if a table exists
function tableExists(PDO $pdo, string $table): bool {
    $stmt = $pdo->prepare("
        SELECT EXISTS (
            SELECT 1
            FROM information_schema.tables
            WHERE table_schema = 'public'
              AND table_name = :table
        )
    ");
    $stmt->execute(['table' => $table]);
    return (bool) $stmt->fetchColumn();
}

// Load and apply SQL schema files
function applyModels(PDO $pdo, array $modelFiles): void {
    foreach ($modelFiles as $table => $filePath) {
        echo "📄 Applying model for '$table' from '$filePath'…\n";

        $sql = @file_get_contents($filePath);
        if ($sql === false) {
            echo "❌ Failed to read file: $filePath\n";
            continue;
        }

        try {
            $pdo->exec($sql);
            echo "✅ Model applied: $table\n";
        } catch (PDOException $e) {
            echo "❌ Failed to apply model for $table: " . $e->getMessage() . "\n";
        }
    }
}

// Truncate tables
function truncateTables(PDO $pdo, array $tables): void {
    echo "\n🧹 Truncating tables…\n";

    foreach ($tables as $table) {
        if (tableExists($pdo, $table)) {
            try {
                $pdo->exec("TRUNCATE TABLE \"$table\" RESTART IDENTITY CASCADE;");
                echo "✅ Truncated table: $table\n";
            } catch (PDOException $e) {
                echo "❌ Failed to truncate table $table: " . $e->getMessage() . "\n";
            }
        } else {
            echo "⚠️ Skipped: Table '$table' does not exist.\n";
        }
    }
}

// Main execution
$pdo = connectToDatabase($databases);

$modelFiles = [
    'users'    => 'database/users.model.sql',
    'trips'    => 'database/trips.model.sql',
    'bookings' => 'database/bookings.model.sql',
    'payments' => 'database/payments.model.sql',
];

applyModels($pdo, $modelFiles);
truncateTables($pdo, array_keys($modelFiles));

echo "\n🏁 Database Resetting Complete.\n";
