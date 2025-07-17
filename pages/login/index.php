<?php

declare(strict_types=1);

$pageTitle = "Login | Baxcalibur";
$cssFile = './pages/login/assets/css/style.css';

require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/auth.handler.php';

Auth::init();

if (Auth::check()) {
  header('Location: /index.php');
  exit;
}

require_once COMPONENTS_PATH . '/templates/head.component.php';

?>
<main>
<section class="login-section">
  <div class="left-panel">
    <!-- Optional: You may add an image or keep it blank for alignment -->
  </div>
  <div class="container">
    
    
    <form class="login-form" action="/handlers/auth.handler.php" method="POST">
      <h2>Welcome Back!</h2>

      <!-- <?php if (!empty($message)): ?>
        <div class="mb-4 text-green-600"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?> -->

      <div class="input-group">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required />
      </div>

      <?php if (!empty($error)): ?>
        <div class="mb-4 text-red-600"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <input type="hidden" name="action" value="login" />
      <button type="submit">Log In</button>
      <p class="error-message" id="error-message"></p>
    </form>
  </div>
</section>
<script src="script.js"></script>
<?php if (!empty($error)): ?>
  <script>
    alert("<?= htmlspecialchars($error) ?>");
  </script>
<?php endif; ?>
</main>

<?php
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>
