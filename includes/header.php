<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = $activePage ?? 'beranda';
$pageTitle = $pageTitle ?? ($officeInfo['name'] . ' — Portal Resmi Air Minum ' . $officeInfo['region']);
$pageDescription = $pageDescription ?? 'Portal resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Cek tagihan air, daftar sambungan baru SIMPEL, pengaduan online 24 jam, profil perusahaan, dan informasi layanan air bersih.';
$pageKeywords = $pageKeywords ?? 'Perumda Tirta Sukapura, PDAM Tasikmalaya, cek tagihan PDAM Tasikmalaya, pasang baru PDAM Tasikmalaya, SIMPEL Tirta Sukapura, pengaduan PDAM Tasikmalaya, air bersih Tasikmalaya';
$pageImage = $pageImage ?? ($baseUrl . '/assets/images/hero-water.jpg');
$pageType = $pageType ?? 'website';
$canonicalPath = $canonicalPath ?? '/';
$canonicalUrl = $baseUrl . '/' . ltrim($canonicalPath, '/');
$extraSchemas = $extraSchemas ?? [];

$schemaGraph = array_merge(buildCoreEntityGraph($officeInfo, $baseUrl), $extraSchemas);
$jsonLd = json_encode(
    ['@context' => 'https://schema.org', '@graph' => $schemaGraph],
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>" />
  <meta name="keywords" content="<?= e($pageKeywords) ?>" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="author" content="<?= e($officeInfo['name']) ?>" />
  <meta name="theme-color" content="#0B2545" />

  <!-- Geo Meta (Local SEO Tasikmalaya) -->
  <meta name="geo.region" content="ID-JB" />
  <meta name="geo.placename" content="Tasikmalaya" />
  <meta name="geo.position" content="-7.3506;108.2172" />
  <meta name="ICBM" content="-7.3506, 108.2172" />

  <!-- Canonical & Hreflang -->
  <link rel="canonical" href="<?= e($canonicalUrl) ?>" />
  <link rel="alternate" hreflang="id-ID" href="<?= e($canonicalUrl) ?>" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />

  <!-- Open Graph (Social & AI Previews) -->
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="<?= e($pageType) ?>" />
  <meta property="og:site_name" content="<?= e($officeInfo['name']) ?>" />
  <meta property="og:title" content="<?= e($pageTitle) ?>" />
  <meta property="og:description" content="<?= e($pageDescription) ?>" />
  <meta property="og:url" content="<?= e($canonicalUrl) ?>" />
  <meta property="og:image" content="<?= e($pageImage) ?>" />

  <!-- Twitter / X Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= e($pageTitle) ?>" />
  <meta name="twitter:description" content="<?= e($pageDescription) ?>" />
  <meta name="twitter:image" content="<?= e($pageImage) ?>" />

  <!-- Structured Data JSON-LD (SEO + AEO + GEO Entity Graph) -->
  <script type="application/ld+json"><?= $jsonLd ?></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
    rel="stylesheet"
  />

  <!-- Tailwind CSS v4 + Lucide Icons -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body class="bg-[#F8FAFC] text-slate-900 antialiased min-h-screen flex flex-col">

<!-- Live Info Ticker Bar (Scrolling Right-to-Left) -->
<div class="bg-[#06182B] text-slate-200 border-b border-white/10 text-xs">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-9 flex items-center gap-4">
    <span class="shrink-0 inline-flex items-center gap-2 font-bold uppercase tracking-wider text-[11px] text-sky-300">
      <span class="relative inline-flex w-2 h-2 rounded-full bg-emerald-400 text-emerald-400 pulse-dot"></span>
      <span>Info Terkini</span>
    </span>
    <div class="marquee-viewport flex-1">
      <div class="marquee-track marquee-track--ticker flex items-center gap-10">
        <?php for ($loop = 0; $loop < 2; $loop++): ?>
          <?php foreach ($tickerItems as $tick): ?>
            <a href="<?= e($tick['href']) ?>" class="inline-flex items-center gap-2.5 whitespace-nowrap hover:text-white transition-colors">
              <span class="px-2 py-0.5 rounded bg-white/10 text-sky-200 font-semibold text-[10px] uppercase tracking-wide">
                <?= e($tick['tag']) ?>
              </span>
              <span><?= e($tick['text']) ?></span>
            </a>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>
    <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="hidden lg:inline-flex items-center gap-1.5 shrink-0 font-semibold text-white hover:text-sky-300 transition-colors">
      <i data-lucide="phone" class="w-3.5 h-3.5 text-sky-400"></i>
      <span><?= e($officeInfo['phone']) ?></span>
    </a>
  </div>
</div>

<!-- Sticky Main Navigation -->
<header id="site-header" class="site-header sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
  <nav aria-label="Navigasi Utama" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-6">
    <!-- Brand -->
    <a href="index.php" class="flex items-center gap-3 group shrink-0">
      <img
        src="assets/images/logo-perumda.png"
        alt="Logo Perumda Air Minum Tirta Sukapura"
        class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
        onerror="this.style.display='none'"
      />
      <div class="leading-tight">
        <div class="font-display font-extrabold text-[#0B2545] text-sm sm:text-base tracking-tight">
          Tirta Sukapura
        </div>
        <div class="text-[11px] font-medium text-slate-500">
          Perumda Air Minum • Tasikmalaya
        </div>
      </div>
    </a>

    <!-- Desktop Links -->
    <div class="hidden md:flex items-center gap-1">
      <?php foreach ($navLinks as $item): ?>
        <?php $isActive = ($activePage === $item['id']); ?>
        <a
          href="<?= e($item['href']) ?>"
          aria-current="<?= $isActive ? 'page' : 'false' ?>"
          class="px-3.5 py-2 rounded-lg text-sm transition-colors <?= $isActive ? 'font-bold text-[#026AA2] bg-[#E0F2FE]/70' : 'font-medium text-slate-600 hover:text-[#0B2545] hover:bg-slate-100' ?>"
        >
          <?= e($item['label']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Desktop CTA -->
    <div class="hidden md:flex items-center gap-3">
      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-[#0B2545] hover:bg-slate-100 transition-colors"
      >
        <i data-lucide="layout-grid" class="w-4 h-4 text-[#026AA2]"></i>
        <span>SIMPADU</span>
      </a>
      <a
        href="<?= e($officeInfo['bill_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#026AA2] hover:bg-[#0B2545] text-white text-sm font-bold transition-colors"
      >
        <span>Cek Tagihan</span>
        <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
      </a>
    </div>

    <!-- Mobile Hamburger -->
    <button
      type="button"
      id="mobile-menu-btn"
      class="md:hidden p-2 rounded-lg text-slate-700 hover:bg-slate-100"
      aria-label="Buka menu navigasi"
      aria-expanded="false"
    >
      <i id="menu-icon-open" data-lucide="menu" class="w-6 h-6"></i>
      <i id="menu-icon-close" data-lucide="x" class="w-6 h-6 hidden"></i>
    </button>
  </nav>

  <!-- Mobile Drawer -->
  <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-1 shadow-xl">
    <?php foreach ($navLinks as $item): ?>
      <?php $isActive = ($activePage === $item['id']); ?>
      <a
        href="<?= e($item['href']) ?>"
        class="block px-3.5 py-2.5 rounded-lg text-sm <?= $isActive ? 'font-bold text-[#026AA2] bg-[#E0F2FE]/70' : 'font-medium text-slate-700 hover:bg-slate-50' ?>"
      >
        <?= e($item['label']) ?>
      </a>
    <?php endforeach; ?>
    <div class="pt-3 mt-2 border-t border-slate-200 grid grid-cols-2 gap-2.5">
      <a
        href="<?= e($officeInfo['bill_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="text-center py-2.5 rounded-lg bg-[#026AA2] text-white text-sm font-bold"
      >
        Cek Tagihan
      </a>
      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="text-center py-2.5 rounded-lg bg-[#EFF4F8] text-[#0B2545] text-sm font-bold"
      >
        SIMPADU
      </a>
    </div>
  </div>
</header>
