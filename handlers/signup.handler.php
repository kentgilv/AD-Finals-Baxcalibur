<?php 

declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/signup.util.php';

// Initialize session
Auth::init();

$host = $databases['pgHost'];
$port = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname = $databases['pgDB'];

// Connect to Postgres
$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$action = $_REQUEST['action'] ?? null;

// --- SIGNUP ---
if ($action === 'signup' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'first_name' => $_POST['first_name'] ?? '',
        'last_name' => $_POST['last_name'] ?? '',
        'username' => $_POST['username'] ?? '',
        'password' => $_POST['password'] ?? '',
        'confirm_password' => $_POST['confirm_password'] ?? '',
        'role' => 'user',  // force user role
    ];

    $errors = Signup::validate($formData);

    if (!empty($errors)) {
        // Redirect back to signup with error messages (can be improved with session flash or query params)
        $errorString = urlencode(implode(', ', $errors));
        header("Location: /pages/signupPage/index.php?error={$errorString}");
        exit;
    }

    try {
        Signup::create($pdo, $formData);
        Auth::login($pdo, $formData['username'], $formData['password']);
        $user = Auth::user();
        // Updated redirect with urlencode:
        header('Location: /pages/userDashboard/index.php?message=' . urlencode('Account created successfully'));
        exit;
    } catch (PDOException $e) {
        // Handle duplicate username or DB errors
        error_log('[Signup Handler] PDOException: ' . $e->getMessage());
        header("Location: /pages/signupPage/index.php?error=Something%20went%20wrong%20while%20creating%20account");
        exit;
    }
}

// If no valid action, redirect to signup
header('Location: /pages/signupPage/index.php');
exit;
?>
