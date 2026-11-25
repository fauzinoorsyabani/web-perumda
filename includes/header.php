<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($officeInfo['name']) ?> — <?= e($officeInfo['region']) ?></title>
  <meta name="description" content="Portal Resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
    rel="stylesheet"
  />

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body class="bg-white text-slate-900 antialiased min-h-screen flex flex-col">

<header class="sticky top-0 z-50 bg-white border-b border-slate-200">
  <nav class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-6">
    <!-- Brand -->
    <a href="#beranda" class="flex items-center gap-3 shrink-0">
      <img
        src="assets/images/logo-perumda.png"
        alt="Logo Perumda Tirta Sukapura"
        class="h-9 w-auto object-contain"
        onerror="this.style.display='none'"
      />
      <div class="leading-tight">
        <div class="font-display font-bold text-[#0B2545] text-sm tracking-tight">
          Tirta Sukapura
        </div>
        <div class="text-[11px] text-slate-500"><?= e($officeInfo['region']) ?></div>
      </div>
    </a>

    <!-- Desktop Links -->
    <div class="hidden md:flex items-center gap-7">
      <?php foreach ($navLinks as $item): ?>
        <a
          href="<?= e($item['href']) ?>"
          class="text-sm font-medium text-slate-600 hover:text-[#0077B6] transition-colors"
        >
          <?= e($item['label']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Desktop Actions -->
    <div class="hidden md:flex items-center gap-4">
      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="text-sm font-medium text-slate-600 hover:text-[#0B2545] transition-colors"
      >
        SIMPADU
      </a>
      <a
        href="http://asindotama.com/layanantirtasukapura/"
        target="_blank"
        rel="noopener noreferrer"
        class="px-4 py-2 rounded-lg bg-[#0077B6] hover:bg-[#005F92] text-white text-sm font-semibold transition-colors"
      >
        Cek Tagihan
      </a>
    </div>

    <!-- Mobile Toggle -->
    <button
      type="button"
      id="mobile-menu-btn"
      class="md:hidden p-2 text-slate-700"
      aria-label="Menu"
    >
      <i id="menu-icon-open" data-lucide="menu" class="w-5 h-5"></i>
      <i id="menu-icon-close" data-lucide="x" class="w-5 h-5 hidden"></i>
    </button>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-2">
    <?php foreach ($navLinks as $item): ?>
      <a href="<?= e($item['href']) ?>" class="block py-2 text-sm font-medium text-slate-700">
        <?= e($item['label']) ?>
      </a>
    <?php endforeach; ?>
    <div class="pt-3 border-t border-slate-200 flex gap-3">
      <a
        href="http://asindotama.com/layanantirtasukapura/"
        target="_blank"
        rel="noopener noreferrer"
        class="flex-1 text-center py-2.5 rounded-lg bg-[#0077B6] text-white text-sm font-semibold"
      >
        Cek Tagihan
      </a>
      <a
        href="<?= e($officeInfo['simpadu_url']) ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="flex-1 text-center py-2.5 rounded-lg bg-[#F4F6F9] text-[#0B2545] text-sm font-semibold"
      >
        SIMPADU
      </a>
    </div>
  </div>
</header>
