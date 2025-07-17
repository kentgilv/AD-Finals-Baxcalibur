<?php

$pageTitle = "Dashboard | Baxcalibur";
$cssFile = './assets/css/style.css';

require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/auth.handler.php';

require_once COMPONENTS_PATH . '/templates/head.component.php';

// Start session and verify user is logged in
Auth::init();
if (!Auth::check()) {
  header('Location: /pages/loginPage/index.php');
  exit;
}
$loggedUser = Auth::user();


require_once UTILS_PATH . '/userPage.util.php';
require_once HANDLERS_PATH . '/payment.handler.php';





// Connect to PostgreSQL
$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDB']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Fetch full user data
$user = UserPage::fetchCurrentUser($pdo, $loggedUser['id']);
if (!$user) {
  header('Location: /pages/loginPage/index.php');
  exit;
}

// Fetch user bookings
$bookings = UserPage::fetchUserBookings($pdo, $user['id'])?? [];
?>
<body>
  <div class="user-dashboard-wrapper">
    <section class="dashboard-section">
      <h1 class="dashboard-title">user dashboard</h1>

      <div class="dashboard-container">
        <!-- USER INFO -->
        <div class="user-info">
          <div class="user-profile">
            <div class="user-avatar">
              <span class="material-icons" style="font-size: 100px;">account_circle</span>
            </div>

            <div class="user-details">
              <h2 class="user-greeting">Hello, <span><?= htmlspecialchars($user['name']) ?>.</span></h2>
              <p><span class="label">Username:</span> <?= htmlspecialchars($user['username']) ?></p>
              <p><span class="label">Country:</span> Philippines</p>
            </div>
          </div>
        </div>

        <!-- BOOKINGS -->
        <div class="bookings-info">
          <h2>my bookings:</h2>
          <?php if (!empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
              <div class="booking-card">
                <p><span class="label">Place:</span> <?= htmlspecialchars($booking['destination']) ?></p>
                <p><span class="label">Itinerary:</span> <?= htmlspecialchars($booking['description']) ?></p>
                <p><span class="label">Date:</span> <?= htmlspecialchars($booking['booking_date']) ?></p>
                <p><span class="label">Booking Status:</span> <?= htmlspecialchars($booking['booking_status']) ?></p>
                <p><span class="label">Payment Status:</span> <?= htmlspecialchars($booking['payment_status']) ?></p>
                <p><span class="label">Amount:</span> <?= htmlspecialchars($booking['price']) ?></p>

<?php
  $paymentStatus = $booking['payment_status'];
  $bookingStatus = $booking['booking_status'];

  // Only show buttons if not Paid and not Cancelled
  if ($paymentStatus !== "Paid" && $bookingStatus !== "Cancelled"):
?>
  <!-- Payment Form -->
  <form class="payment-form" action="/handlers/payment.handler.php" method="POST" style="display:inline-block;">
    <input type="hidden" name="booking_id" value="<?= htmlspecialchars($booking['id']) ?>" />
    <input type="hidden" name="amount" value="<?= htmlspecialchars($booking['price']) ?>" />
    <button class="pay-now" type="submit">
      <span class="material-icons">payments</span>Pay Now
    </button>
  </form>

  <!-- Cancel Form -->
  <form class="cancel-form" action="/handlers/cancel.handler.php" method="POST" style="display:inline-block;">
    <input type="hidden" name="booking_id" value="<?= htmlspecialchars($booking['id']) ?>" />
    <button class="cancel-now" type="submit" onclick="return confirm('Are you sure you want to cancel this booking?');">
      <span class="material-icons">cancel</span>Cancel
    </button>
  </form>
<?php endif; ?>

              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="no-bookings">
              <p>You have no bookings yet.</p>
              <a href="/pages/trips/index.php" class="add-booking">Book your first trip <span
                  class="highlight">here</span>.</a>
            </div>
          <?php endif; ?>

          <a href="/pages/trips/index.php" class="add-booking">Add more bookings <span
              class="highlight">here</span>.</a>
        </div>
      </div>
    </section>
  </div>

  <!-- ✅ Alert for Login Success -->
  <?php
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
</body>

</html>