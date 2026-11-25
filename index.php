<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-1">
  <?php
  require_once __DIR__ . '/includes/hero.php';
  require_once __DIR__ . '/includes/services.php';
  require_once __DIR__ . '/includes/profile.php';
  require_once __DIR__ . '/includes/news.php';
  ?>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
