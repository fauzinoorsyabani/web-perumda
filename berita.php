<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'berita';
$query = trim((string) ($_GET['q'] ?? ''));
$pageTitle = ($query !== '' ? 'Pencarian: ' . $query . ' | ' : '') . 'Berita, Info Gangguan & Panduan | ' . $officeInfo['name'];
$pageDescription = 'Kabar perbaikan jaringan pipa distribusi, pemberitahuan gangguan aliran air, laporan kinerja, dan panduan pelanggan Perumda Air Minum Tirta Sukapura.';
$canonicalPath = '/berita.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Berita', 'url' => '/berita.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';

$categories = ['Semua', 'Perbaikan', 'Info Gangguan', 'Panduan', 'Kinerja', 'Pengumuman'];
?>

<main class="flex-1">
  <!-- Clean Page Header -->
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Berita</span>
      </nav>

      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
        <div class="max-w-2xl">
          <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
            Berita, Gangguan Aliran &amp; Panduan
          </h1>
          <p class="text-slate-300 mt-2.5 text-base leading-relaxed">
            Informasi pemeliharaan pipa distribusi, pengumuman pengurasan reservoir, dan panduan praktis untuk pelanggan.
          </p>
        </div>

        <form action="berita.php" method="get" class="w-full lg:w-80">
          <label for="news-search" class="sr-only">Cari berita atau panduan</label>
          <div class="relative">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
            <input
              id="news-search"
              name="q"
              type="search"
              value="<?= e($query) ?>"
              placeholder="Cari pipa, tagihan, kebocoran..."
              class="w-full pl-10 pr-4 py-2.5 rounded-md bg-white text-[#1C242B] text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#005A8D]"
            />
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Newsroom Directory -->
  <section class="py-14 bg-[#F7F7F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Category Bar -->
      <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-[#DCE1E5] mb-10">
        <div class="flex flex-wrap gap-2">
          <?php foreach ($categories as $cat): ?>
            <?php $isAll = ($cat === 'Semua'); ?>
            <button
              type="button"
              data-news-filter="<?= e($cat) ?>"
              class="px-3.5 py-1.5 rounded-md text-xs sm:text-sm font-semibold transition-colors cursor-pointer <?= $isAll ? 'bg-[#102A43] text-white' : 'bg-white text-[#52606D] border border-[#DCE1E5] hover:text-[#102A43]' ?>"
            >
              <?= e($cat) ?>
            </button>
          <?php endforeach; ?>
        </div>
        <div id="news-count" class="text-xs font-semibold text-[#52606D]">
          Menampilkan <?= count($newsItems) ?> tulisan
        </div>
      </div>

      <!-- Editorial Article Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">
        <?php foreach ($newsItems as $item): ?>
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
            <a href="berita-detail.php?slug=<?= urlencode($item['slug']) ?>" class="group block">
              <div class="aspect-[16/10] rounded-md overflow-hidden bg-[#EFEFE9]">
                <img
                  src="<?= e($item['image']) ?>"
                  alt="<?= e($item['title']) ?>"
                  loading="lazy"
                  class="w-full h-full object-cover img-scale"
                  onerror="this.src='<?= e($item['fallback_img']) ?>'"
                />
              </div>

              <div class="mt-3.5 space-y-2">
                <div class="flex items-center gap-2 text-xs font-semibold">
                  <span class="<?= $item['category'] === 'Info Gangguan' ? 'text-amber-700' : 'text-[#005A8D]' ?>">
                    <?= e($item['category']) ?>
                  </span>
                  <span class="text-slate-300">|</span>
                  <span class="text-[#52606D] font-normal"><?= e($item['date_display']) ?></span>
                </div>

                <h2 class="font-display font-bold text-lg text-[#102A43] group-hover:text-[#005A8D] transition-colors leading-snug">
                  <?= e($item['title']) ?>
                </h2>

                <p class="text-sm text-[#52606D] leading-relaxed line-clamp-3">
                  <?= e($item['excerpt']) ?>
                </p>
              </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>

      <div id="news-empty" class="hidden text-center py-14">
        <p class="font-display text-lg font-bold text-[#102A43]">Tidak ada tulisan yang cocok</p>
        <p class="text-sm text-[#52606D] mt-1">Ubah kata kunci pencarian atau pilih kategori Semua.</p>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
