<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/official_content.php';
require_once __DIR__ . '/../config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = $activePage ?? 'beranda';
$pageTitle = $pageTitle ?? ($officeInfo['name'] . ' | Kabupaten Tasikmalaya');
$pageDescription = $pageDescription ?? 'Portal resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Cek tagihan air, daftar sambungan baru SIMPEL, lapor gangguan 24 jam, profil, tarif 2025, dan informasi pelanggan.';
$pageKeywords = $pageKeywords ?? 'Perumda Tirta Sukapura, PDAM Tasikmalaya, cek tagihan PDAM Tasikmalaya, tarif air 2025 Tasikmalaya, pasang baru PDAM Tasikmalaya, SIMPEL Tirta Sukapura';
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
  <meta name="theme-color" content="#102A43" />

  <!-- Local SEO Tasikmalaya -->
  <meta name="geo.region" content="ID-JB" />
  <meta name="geo.placename" content="Tasikmalaya" />
  <meta name="geo.position" content="-7.3506;108.2172" />
  <meta name="ICBM" content="-7.3506, 108.2172" />

  <link rel="canonical" href="<?= e($canonicalUrl) ?>" />
  <link rel="alternate" hreflang="id-ID" href="<?= e($canonicalUrl) ?>" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />

  <!-- Open Graph & Twitter -->
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="<?= e($pageType) ?>" />
  <meta property="og:site_name" content="<?= e($officeInfo['name']) ?>" />
  <meta property="og:title" content="<?= e($pageTitle) ?>" />
  <meta property="og:description" content="<?= e($pageDescription) ?>" />
  <meta property="og:url" content="<?= e($canonicalUrl) ?>" />
  <meta property="og:image" content="<?= e($pageImage) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= e($pageTitle) ?>" />
  <meta name="twitter:description" content="<?= e($pageDescription) ?>" />
  <meta name="twitter:image" content="<?= e($pageImage) ?>" />

  <!-- SEO + AEO + GEO Entity Graph -->
  <script type="application/ld+json"><?= $jsonLd ?></script>

  <!-- Fonts: DM Sans + IBM Plex Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body class="bg-[#F7F7F5] text-[#1C242B] antialiased min-h-screen flex flex-col">

<!-- Top Utility & Live Scrolling Ticker (Kanan ke Kiri) -->
<div class="bg-[#0A1D30] text-slate-200 text-xs">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-9 flex items-center gap-4">
    <span class="shrink-0 font-bold uppercase tracking-wider text-[11px] text-white bg-[#1E6F5C] px-2 py-0.5 rounded-sm">
      Info
    </span>
    <div class="marquee-viewport flex-1">
      <div class="marquee-track marquee-track--ticker flex items-center gap-12">
        <?php for ($loop = 0; $loop < 2; $loop++): ?>
          <?php foreach ($tickerItems as $tick): ?>
            <a href="<?= e($tick['href']) ?>" class="inline-flex items-center gap-2 whitespace-nowrap text-slate-200 hover:text-white transition-colors">
              <strong class="font-semibold text-sky-300"><?= e($tick['tag']) ?>:</strong>
              <span><?= e($tick['text']) ?></span>
            </a>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>
    <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="hidden lg:inline-flex items-center gap-1.5 shrink-0 font-semibold text-white hover:text-sky-300 transition-colors tabular-nums">
      <i data-lucide="phone" class="w-3.5 h-3.5 text-sky-300"></i>
      <span><?= e($officeInfo['phone']) ?></span>
    </a>
  </div>
</div>

<!-- Main Institutional Header with Complete Official Dropdowns -->
<header id="site-header" class="site-header sticky top-0 z-50 bg-white border-b border-[#DCE1E5]">
  <nav aria-label="Navigasi Utama" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
    <a href="index.php" class="flex items-center gap-2.5 shrink-0">
      <img
        src="assets/images/logo-perumda.png"
        alt="Logo Perumda Air Minum Tirta Sukapura"
        class="h-9 sm:h-10 w-auto object-contain"
        onerror="this.style.display='none'"
      />
      <div class="leading-tight">
        <div class="font-display font-extrabold text-[#102A43] text-sm">
          Tirta Sukapura
        </div>
        <div class="text-[11px] text-[#52606D] hidden sm:block">
          Perumda Air Minum Tasikmalaya
        </div>
      </div>
    </a>

    <!-- Desktop Menu with Clean Dropdowns -->
    <div class="hidden xl:flex items-center gap-1">
      <?php foreach ($navMenus as $menu): ?>
        <?php
        $isActive = ($activePage === $menu['id']);
        $hasChildren = !empty($menu['children']);
        ?>
        <?php if ($hasChildren): ?>
          <div class="nav-dropdown relative">
            <a
              href="<?= e($menu['href']) ?>"
              aria-current="<?= $isActive ? 'page' : 'false' ?>"
              class="inline-flex items-center gap-1 px-3 py-2 rounded-md text-sm transition-colors <?= $isActive ? 'font-bold text-[#005A8D]' : 'font-medium text-[#52606D] hover:text-[#102A43] hover:bg-[#F7F7F5]' ?>"
            >
              <span><?= e($menu['label']) ?></span>
              <i data-lucide="chevron-down" class="w-3.5 h-3.5 opacity-70"></i>
            </a>
            <div class="nav-dropdown-panel absolute left-0 top-full pt-2 w-60 z-50">
              <div class="bg-white border border-[#DCE1E5] rounded-md shadow-lg py-1.5">
                <?php foreach ($menu['children'] as $sub): ?>
                  <a
                    href="<?= e($sub['href']) ?>"
                    class="block px-4 py-2 text-xs font-medium text-[#1C242B] hover:bg-[#F7F7F5] hover:text-[#005A8D] transition-colors"
                  >
                    <?= e($sub['label']) ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php else: ?>
          <a
            href="<?= e($menu['href']) ?>"
            aria-current="<?= $isActive ? 'page' : 'false' ?>"
            class="px-3 py-2 rounded-md text-sm transition-colors <?= $isActive ? 'font-bold text-[#005A8D]' : 'font-medium text-[#52606D] hover:text-[#102A43] hover:bg-[#F7F7F5]' ?>"
          >
            <?= e($menu['label']) ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <!-- Right Utility Actions -->
    <div class="hidden xl:flex items-center gap-3 shrink-0">
      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="text-xs font-bold text-[#52606D] hover:text-[#102A43] px-2.5 py-2"
      >
        SIMPADU
      </a>
      <a
        href="<?= e($officeInfo['bill_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-xs font-bold transition-colors"
      >
        <span>Cek Tagihan</span>
        <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
      </a>
    </div>

    <!-- Mobile / Tablet Trigger -->
    <button
      type="button"
      id="mobile-menu-btn"
      class="xl:hidden p-2 rounded-md text-[#102A43] hover:bg-[#F7F7F5]"
      aria-label="Buka menu navigasi"
      aria-expanded="false"
    >
      <i id="menu-icon-open" data-lucide="menu" class="w-6 h-6"></i>
      <i id="menu-icon-close" data-lucide="x" class="w-6 h-6 hidden"></i>
    </button>
  </nav>

  <!-- Mobile / Tablet Complete Drawer with Collapsible Submenus -->
  <div id="mobile-menu" class="hidden xl:hidden border-t border-[#DCE1E5] bg-white px-4 py-4 max-h-[80vh] overflow-y-auto space-y-1 shadow-xl">
    <?php foreach ($navMenus as $menu): ?>
      <?php $hasChildren = !empty($menu['children']); ?>
      <?php if ($hasChildren): ?>
        <div class="border-b border-[#DCE1E5]/60 pb-1">
          <div class="flex items-center justify-between">
            <a href="<?= e($menu['href']) ?>" class="py-2.5 px-2 text-sm font-bold text-[#102A43] flex-1">
              <?= e($menu['label']) ?>
            </a>
            <button type="button" data-mobile-sub-toggle class="p-2 text-[#52606D]" aria-label="Buka submenu <?= e($menu['label']) ?>">
              <i data-lucide="chevron-down" class="w-4 h-4"></i>
            </button>
          </div>
          <div class="hidden pl-4 pb-2 space-y-1" data-mobile-sub-panel>
            <?php foreach ($menu['children'] as $sub): ?>
              <a href="<?= e($sub['href']) ?>" class="block py-1.5 px-2 text-xs font-medium text-[#52606D] hover:text-[#005A8D]">
                <?= e($sub['label']) ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php else: ?>
        <a href="<?= e($menu['href']) ?>" class="block py-2.5 px-2 text-sm font-bold text-[#102A43] border-b border-[#DCE1E5]/60">
          <?= e($menu['label']) ?>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
    <div class="pt-3 grid grid-cols-2 gap-2.5">
      <a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-center py-2.5 rounded-md bg-[#005A8D] text-white text-sm font-bold">
        Cek Tagihan
      </a>
      <a href="<?= e($officeInfo['simpadu_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-center py-2.5 rounded-md bg-[#EFEFE9] text-[#102A43] text-sm font-bold">
        SIMPADU
      </a>
    </div>
  </div>
</header>
