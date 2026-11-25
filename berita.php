<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'berita';
$query = trim((string) ($_GET['q'] ?? ''));
$pageTitle = ($query !== '' ? 'Pencarian: ' . $query . ' — ' : '') . 'Berita, Info Gangguan & Edukasi Pelanggan — ' . $officeInfo['name'];
$pageDescription = 'Berita resmi, pengumuman gangguan aliran air, perbaikan jaringan pipa distribusi, laporan kinerja, serta tips hemat air bagi pelanggan Perumda Air Minum Tirta Sukapura.';
$canonicalPath = '/berita.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Berita & Info', 'url' => '/berita.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';

$categories = ['Semua', 'Perbaikan', 'Info Gangguan', 'Edukasi & Tips', 'Kinerja', 'Pengumuman'];
?>

<main class="flex-1">
  <!-- Page Header -->
  <section class="bg-[#0B2545] text-white py-14 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-4">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-sky-300 font-semibold">Berita &amp; Edukasi</span>
      </nav>
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
        <div class="max-w-2xl">
          <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight">
            Berita, Info Gangguan &amp; <strong>Tips Pelanggan</strong>
          </h1>
          <p class="text-slate-300 mt-3 text-base leading-relaxed">
            Pantau informasi pemeliharaan jaringan pipa, laporan kinerja perusahaan, serta panduan praktis pengelolaan air di rumah.
          </p>
        </div>

        <!-- Search Form -->
        <form action="berita.php" method="get" class="w-full lg:w-80">
          <label for="news-search" class="sr-only">Cari berita atau tips</label>
          <div class="relative">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
            <input
              id="news-search"
              name="q"
              type="search"
              value="<?= e($query) ?>"
              placeholder="Cari berita, pipa, tagihan..."
              class="w-full pl-10 pr-4 py-3 rounded-xl bg-white text-slate-900 text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-400"
            />
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Filter & Articles Grid -->
  <section class="py-14 lg:py-18 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Category Filters -->
      <div class="flex flex-wrap items-center justify-between gap-4 pb-8 border-b border-slate-200 mb-10">
        <div class="flex flex-wrap gap-2">
          <?php foreach ($categories as $cat): ?>
            <?php $isAll = ($cat === 'Semua'); ?>
            <button
              type="button"
              data-news-filter="<?= e($cat) ?>"
              class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-colors cursor-pointer <?= $isAll ? 'bg-[#0B2545] text-white' : 'bg-white text-slate-600 border border-slate-200 hover:border-[#026AA2]' ?>"
            >
              <?= e($cat) ?>
            </button>
          <?php endforeach; ?>
        </div>
        <div id="news-count" class="text-xs font-semibold text-slate-500">
          Menampilkan <?= count($newsItems) ?> artikel
        </div>
      </div>

      <!-- Cards -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
        <?php foreach ($newsItems as $idx => $item): ?>
          <?php
          $haystack = strtolower($item['title'] . ' ' . $item['excerpt'] . ' ' . $item['category']);
          $hiddenByQuery = ($query !== '' && strpos($haystack, strtolower($query)) === false);
          ?>
          <article
            data-news-card
            data-category="<?= e($item['category']) ?>"
            data-search="<?= e($haystack) ?>"
            class="<?= $hiddenByQuery ? 'hidden' : '' ?> reveal"
          >
            <a
              href="berita-detail.php?slug=<?= urlencode($item['slug']) ?>"
              class="group elevated-card rounded-2xl overflow-hidden flex flex-col h-full"
            >
              <div class="aspect-[16/10] bg-slate-200 overflow-hidden relative">
                <img
                  src="<?= e($item['image']) ?>"
                  alt="<?= e($item['title']) ?>"
                  loading="lazy"
                  class="w-full h-full object-cover img-zoom"
                  onerror="this.src='<?= e($item['fallback_img']) ?>'"
                />
                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-lg text-[11px] font-bold <?= $item['category'] === 'Info Gangguan' ? 'bg-amber-500 text-slate-950' : 'bg-[#0B2545] text-white' ?>">
                  <?= e($item['category']) ?>
                </span>
              </div>

              <div class="p-6 flex-1 flex flex-col justify-between">
                <div>
                  <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                    <span><?= e($item['date_display']) ?></span>
                    <span>•</span>
                    <span><?= e($item['read_time']) ?></span>
                  </div>
                  <h2 class="font-display font-bold text-lg text-[#0B2545] group-hover:text-[#026AA2] transition-colors leading-snug">
                    <?= e($item['title']) ?>
                  </h2>
                  <p class="text-sm text-slate-600 mt-2.5 leading-relaxed line-clamp-3">
                    <?= e($item['excerpt']) ?>
                  </p>
                </div>

                <div class="mt-5 pt-4 border-t border-slate-100 inline-flex items-center gap-1.5 text-sm font-bold text-[#026AA2]">
                  <span>Baca Selengkapnya</span>
                  <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </div>
              </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>

      <div id="news-empty" class="hidden text-center py-16">
        <p class="font-display text-lg font-bold text-[#0B2545]">Artikel tidak ditemukan</p>
        <p class="text-sm text-slate-500 mt-1">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
