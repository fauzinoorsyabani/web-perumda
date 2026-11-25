<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($officeInfo['name']) ?> — <?= e($officeInfo['region']) ?></title>
  <meta
    name="description"
    content="Portal Resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Cek tagihan air, pengaduan online, catat meter mandiri, pendaftaran sambungan baru, dan informasi layanan air bersih."
  />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
    rel="stylesheet"
  />

  <!-- Tailwind CSS v4 Browser CDN + Lucide Icons -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-sky-500/20 selection:text-sky-900 min-h-screen flex flex-col">

<header class="sticky top-0 z-50 w-full">
  <!-- Top Utility Bar -->
  <div class="bg-slate-950 text-slate-300 text-xs border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-wrap items-center justify-between gap-2">
      <div class="flex flex-wrap items-center gap-x-5 gap-y-1">
        <a
          href="tel:<?= e($officeInfo['phone_clean']) ?>"
          class="inline-flex items-center gap-1.5 hover:text-sky-400 transition-colors font-medium"
        >
          <i data-lucide="phone" class="w-3.5 h-3.5 text-sky-400"></i>
          <span>Call Center: <?= e($officeInfo['phone']) ?></span>
        </a>
        <a
          href="mailto:<?= e($officeInfo['email']) ?>"
          class="hidden sm:inline-flex items-center gap-1.5 hover:text-sky-400 transition-colors"
        >
          <i data-lucide="mail" class="w-3.5 h-3.5 text-sky-400"></i>
          <span><?= e($officeInfo['email']) ?></span>
        </a>
        <span class="hidden md:inline-flex items-center gap-1.5 text-slate-400">
          <i data-lucide="clock" class="w-3.5 h-3.5 text-sky-400"></i>
          <span><?= e($officeInfo['hours_weekday']) ?></span>
        </span>
      </div>

      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-1.5 text-sky-300 hover:text-white font-medium transition-colors"
      >
        <i data-lucide="layout-grid" class="w-3.5 h-3.5"></i>
        <span>Launcher SIMPADU</span>
        <i data-lucide="external-link" class="w-3 h-3"></i>
      </a>
    </div>
  </div>

  <!-- Main Glass Navbar -->
  <nav class="glass-nav border-b border-slate-200/80 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
      <!-- Brand -->
      <a href="#beranda" class="flex items-center gap-3 group shrink-0">
        <img
          src="assets/images/logo-perumda.png"
          alt="Logo Perumda Air Minum Tirta Sukapura"
          class="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
          onerror="this.style.display='none'"
        />
        <div class="hidden sm:block leading-tight">
          <div class="font-display font-extrabold text-slate-900 text-sm tracking-tight">
            PERUMDA TIRTA SUKAPURA
          </div>
          <div class="text-[11px] font-medium text-sky-700">
            <?= e($officeInfo['region']) ?>
          </div>
        </div>
      </a>

      <!-- Desktop Links -->
      <div class="hidden lg:flex items-center gap-1">
        <?php foreach ($navLinks as $item): ?>
          <a
            href="<?= e($item['href']) ?>"
            class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-sky-700 hover:bg-sky-50/80 transition-colors"
          >
            <?= e($item['label']) ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Desktop CTA -->
      <div class="hidden md:flex items-center gap-2.5">
        <a
          href="http://asindotama.com/layanantirtasukapura/"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold shadow-sm shadow-sky-600/25 transition-all hover:-translate-y-0.5"
        >
          <i data-lucide="droplets" class="w-4 h-4"></i>
          <span>Cek Tagihan</span>
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <button
        type="button"
        id="mobile-menu-btn"
        class="lg:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors"
        aria-label="Buka menu navigasi"
      >
        <i id="menu-icon-open" data-lucide="menu" class="w-6 h-6"></i>
        <i id="menu-icon-close" data-lucide="x" class="w-6 h-6 hidden"></i>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-1 shadow-lg">
      <?php foreach ($navLinks as $item): ?>
        <a
          href="<?= e($item['href']) ?>"
          class="block px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors"
        >
          <?= e($item['label']) ?>
        </a>
      <?php endforeach; ?>
      <div class="pt-3 mt-2 border-t border-slate-100 flex flex-col gap-2">
        <a
          href="http://asindotama.com/layanantirtasukapura/"
          target="_blank"
          rel="noopener noreferrer"
          class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-sky-600 text-white text-sm font-semibold"
        >
          <i data-lucide="droplets" class="w-4 h-4"></i>
          <span>Cek Tagihan Air</span>
        </a>
        <a
          href="<?= e($officeInfo['simpadu_url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 text-slate-800 text-sm font-semibold"
        >
          <i data-lucide="layout-grid" class="w-4 h-4"></i>
          <span>Launcher SIMPADU</span>
        </a>
      </div>
    </div>
  </nav>
</header>
