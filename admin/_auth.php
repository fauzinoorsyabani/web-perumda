<?php
declare(strict_types=1);

/**
 * Bootstrap Sesi, Autentikasi Admin, CSRF, Flash Message, & Layout Helper
 */

if (session_status() === PHP_SESSION_NONE) {
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

define('PERUMDA_SKIP_DB_LOAD', true);
require_once __DIR__ . '/../config/data.php';
require_once __DIR__ . '/../config/database.php';

function csrfToken(): string
{
    if (empty($_SESSION['admin_csrf'])) {
        $_SESSION['admin_csrf'] = bin2hex(random_bytes(32));
    }
    return (string) $_SESSION['admin_csrf'];
}

function verifyCsrf(?string $token): bool
{
    $session = (string) ($_SESSION['admin_csrf'] ?? '');
    return $session !== '' && $token !== null && hash_equals($session, $token);
}

function setFlash(string $type, string $message): void
{
    $_SESSION['admin_flash'] = ['type' => $type, 'message' => $message];
}

function getFlash(): ?array
{
    if (empty($_SESSION['admin_flash'])) {
        return null;
    }
    $flash = $_SESSION['admin_flash'];
    unset($_SESSION['admin_flash']);
    return $flash;
}

function currentAdmin(): ?array
{
    return isset($_SESSION['admin_user']) && is_array($_SESSION['admin_user'])
        ? $_SESSION['admin_user']
        : null;
}

function requireAdmin(): array
{
    $admin = currentAdmin();
    if (!$admin) {
        header('Location: login.php');
        exit;
    }
    return $admin;
}

function slugify(string $text): string
{
    $text = strtolower(trim($text));
    $text = (string) preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');
    return $text !== '' ? substr($text, 0, 160) : ('artikel-' . date('YmdHis'));
}

function renderAdminHeader(string $title, string $activeNav, array $admin): void
{
    $flash = getFlash();
    $navItems = [
        ['id' => 'dashboard', 'label' => 'Dashboard',       'href' => 'index.php',      'icon' => 'layout-dashboard'],
        ['id' => 'berita',    'label' => 'Berita',          'href' => 'berita.php',     'icon' => 'newspaper'],
        ['id' => 'pesan',     'label' => 'Pesan',           'href' => 'pesan.php',      'icon' => 'inbox'],
        ['id' => 'cabang',    'label' => 'Cabang',          'href' => 'cabang.php',     'icon' => 'building-2'],
        ['id' => 'sumber',    'label' => 'Sumber Air',      'href' => 'sumber-air.php', 'icon' => 'droplets'],
        ['id' => 'akun',      'label' => 'Akun',            'href' => 'akun.php',       'icon' => 'shield'],
    ];
    ?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title><?= e($title) ?> | Admin Tirta Sukapura</title>
  <link rel="icon" type="image/x-icon" href="../favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
  <link rel="stylesheet" href="../assets/css/custom.css" />
</head>
<body class="bg-[#F7F7F5] text-[#1C242B] antialiased min-h-screen flex flex-col">

<header class="bg-[#102A43] text-white border-b border-white/10 sticky top-0 z-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
    <div class="flex items-center gap-6">
      <a href="index.php" class="flex items-center gap-2.5 shrink-0">
        <img src="../assets/images/logo-perumda.png" alt="Logo" class="h-8 w-auto bg-white rounded-sm p-0.5" onerror="this.style.display='none'" />
        <div class="leading-tight">
          <div class="font-display font-bold text-sm">Panel Admin</div>
          <div class="text-[11px] text-slate-300">Tirta Sukapura</div>
        </div>
      </a>

      <nav class="hidden md:flex items-center gap-1" aria-label="Menu Admin">
        <?php foreach ($navItems as $item): ?>
          <?php $isActive = ($activeNav === $item['id']); ?>
          <a
            href="<?= e($item['href']) ?>"
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-sm transition-colors <?= $isActive ? 'bg-[#005A8D] text-white font-bold' : 'text-slate-300 hover:text-white hover:bg-white/10 font-medium' ?>"
          >
            <i data-lucide="<?= e($item['icon']) ?>" class="w-4 h-4"></i>
            <span><?= e($item['label']) ?></span>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>

    <div class="flex items-center gap-3 text-xs sm:text-sm">
      <a href="../index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-slate-300 hover:text-white">
        <span>Lihat Website</span>
        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
      </a>
      <span class="hidden lg:inline text-slate-400">|</span>
      <span class="hidden lg:inline font-medium text-slate-200"><?= e((string) $admin['name']) ?></span>
      <form action="logout.php" method="post" class="inline">
        <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
        <button type="submit" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-white text-xs font-bold cursor-pointer">
          Keluar
        </button>
      </form>
    </div>
  </div>

  <!-- Mobile Admin Nav -->
  <div class="md:hidden border-t border-white/10 px-4 py-2 flex items-center gap-2 overflow-x-auto">
    <?php foreach ($navItems as $item): ?>
      <?php $isActive = ($activeNav === $item['id']); ?>
      <a href="<?= e($item['href']) ?>" class="shrink-0 px-3 py-1.5 rounded-md text-xs font-bold <?= $isActive ? 'bg-[#005A8D] text-white' : 'text-slate-300' ?>">
        <?= e($item['label']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</header>

<main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <?php if ($flash): ?>
    <div class="mb-6 rounded-md px-4 py-3 text-sm font-medium border <?= $flash['type'] === 'error' ? 'bg-red-50 border-red-200 text-red-800' : 'bg-[#F0FDFA] border-[#1E6F5C]/30 text-[#1E6F5C]' ?>">
      <?= e((string) $flash['message']) ?>
    </div>
  <?php endif; ?>
    <?php
}

function renderAdminFooter(): void
{
    ?>
</main>
<footer class="border-t border-[#DCE1E5] bg-white py-4 text-xs text-[#52606D]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
    <span>Panel Admin CMS — Perumda Air Minum Tirta Sukapura</span>
    <span>PHP <?= e(PHP_VERSION) ?> • MySQL PDO</span>
  </div>
</footer>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide) window.lucide.createIcons();
  });
</script>
</body>
</html>
    <?php
}
