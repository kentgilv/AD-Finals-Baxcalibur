<?php

$pageTitle = "Admin Dashboard | Baxcalibur";
$cssFile = './assets/css/style.css';

require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/adminPage.util.php';
require_once UTILS_PATH . '/auth.util.php';



Auth::init();
if (!Auth::check() || Auth::user()['role'] !== 'admin') {
    header('Location: /pages/login/index.php');
    exit;
}

require_once COMPONENTS_PATH . '/templates/head.component.php';

// Handle search input
$search = $_GET['search'] ?? '';
$sortOrder = 'asc';

// Connect to PostgreSQL
$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDB']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$users = AdminPage::displayUsers($pdo, $search, $sortOrder);

// Fetch bookings
$stmt = $pdo->query("SELECT id, user_id, trip_id, payment_status, booking_status, created_at, updated_at FROM bookings ORDER BY created_at DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch payments
$stmt = $pdo->query("SELECT id, booking_id, amount, payment_date, payment_method, created_at FROM payments ORDER BY created_at DESC");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
  <div class="page-wrapper">
    <div class="admin-dashboard-wrapper">
      <section class="admin-section">
        <h1 class="dashboard-title">admin dashboard</h1>

        <!-- ACCOUNTS TABLE -->
        <div class="admin-accounts-card">
  <div class="card-header">
    <h2>Accounts:</h2>
   <form method="GET" class="admin-filter-form" style="display: flex; gap: 10px; align-items: center;">
  <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search user..." class="admin-search" />
  <button type="submit" class="btn">Search</button>
  <?php if (!empty($search)): ?>
    <button type="button" class="btn" onclick="window.location.href='/pages/adminDashboardPage/index.php'">Clear</button>
  <?php endif; ?>
</form>
  </div>

          <div class="admin-table-wrapper">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Booked</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($users)): ?>
                  <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?= htmlspecialchars($user['id']) ?></td>
                      <td><?= htmlspecialchars($user['username']) ?></td>
                      <td><?= htmlspecialchars($user['name']) ?></td>
                      <td><?= htmlspecialchars($user['booked']) ?></td>
                      <td><?= htmlspecialchars($user['payment']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="5">No users found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- BOOKINGS TABLE -->
        <div class="admin-accounts-card" style="margin-top: 40px;">
          <div class="card-header">
            <h2>Bookings:</h2>
          </div>

          <div class="admin-table-wrapper">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User ID</th>
                  <th>Trip ID</th>
                  <th>Payment Status</th>
                  <th>Booking Status</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($bookings)): ?>
                  <?php foreach ($bookings as $booking): ?>
                    <tr>
                      <td><?= htmlspecialchars($booking['id']) ?></td>
                      <td><?= htmlspecialchars($booking['user_id']) ?></td>
                      <td><?= htmlspecialchars($booking['trip_id']) ?></td>
                      <td><?= htmlspecialchars($booking['payment_status']) ?></td>
                      <td><?= htmlspecialchars($booking['booking_status']) ?></td>
                      <td><?= htmlspecialchars($booking['created_at']) ?></td>
                      <td><?= htmlspecialchars($booking['updated_at']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="7">No bookings found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- PAYMENTS TABLE -->
        <div class="admin-accounts-card" style="margin-top: 40px;">
          <div class="card-header">
            <h2>Payments:</h2>
          </div>

          <div class="admin-table-wrapper">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Booking ID</th>
                  <th>Amount</th>
                  <th>Payment Date</th>
                  <th>Payment Method</th>
                  <th>Created At</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($payments)): ?>
                  <?php foreach ($payments as $payment): ?>
                    <tr>
                      <td><?= htmlspecialchars($payment['id']) ?></td>
                      <td><?= htmlspecialchars($payment['booking_id']) ?></td>
                      <td><?= htmlspecialchars($payment['amount']) ?></td>
                      <td><?= htmlspecialchars($payment['payment_date']) ?></td>
                      <td><?= htmlspecialchars($payment['payment_method']) ?></td>
                      <td><?= htmlspecialchars($payment['created_at']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="6">No payments found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </section>
    </div>
</main>

  </div>
    <!-- ✅ Alert for Login Success -->
  <?php
    require_once COMPONENTS_PATH . '/templates/footer.component.php';
    require_once COMPONENTS_PATH . '/templates/foot.component.php';
    $successMessage = trim((string) ($_GET['message'] ?? ''));
    $successMessage = str_replace("%", " ", $successMessage);
    if (!empty($successMessage)):
  ?>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        alert("<?= htmlspecialchars($successMessage, ENT_QUOTES) ?>");
      });
    </script>
  <?php endif; ?>
