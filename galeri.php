<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'galeri';
$pageTitle = 'Galeri Foto Kegiatan & Infrastruktur | ' . $officeInfo['name'];
$pageDescription = 'Dokumentasi foto pemasangan pipa HDD Jl. SL Tobing - Jl. Paseh, kegiatan pegawai, serta infrastruktur pengolahan air bersih Perumda Air Minum Tirta Sukapura.';
$canonicalPath = '/galeri.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Galeri Foto', 'url' => '/galeri.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';

$albums = array_values(array_unique(array_column($galleryPhotos, 'album')));
?>

<main class="flex-1">
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Galeri Foto</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">Galeri Kegiatan &amp; Infrastruktur</h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Dokumentasi pemasangan pipa distribusi, kegiatan pegawai, dan fasilitas pengolahan air bersih di Kabupaten dan Kota Tasikmalaya.
      </p>
    </div>
  </section>

  <section class="py-14 bg-[#F7F7F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Album Filters -->
      <div class="flex flex-wrap gap-2 pb-6 border-b border-[#DCE1E5] mb-8" data-filter-group="gallery">
        <button type="button" data-filter-val="all" class="px-3.5 py-1.5 rounded-md text-xs font-bold bg-[#102A43] text-white cursor-pointer">
          Semua Album
        </button>
        <?php foreach ($albums as $alb): ?>
          <button type="button" data-filter-val="<?= e($alb) ?>" class="px-3.5 py-1.5 rounded-md text-xs font-bold bg-white text-[#52606D] border border-[#DCE1E5] cursor-pointer">
            <?= e($alb) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Photo Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
        <?php foreach ($galleryPhotos as $photo): ?>
          <figure data-filter-item="gallery" data-filter-cat="<?= e($photo['album']) ?>" class="group bg-white border border-[#DCE1E5] rounded-md overflow-hidden flex flex-col">
            <button
              type="button"
              data-lightbox="<?= e($photo['image']) ?>"
              data-caption="<?= e($photo['title'] . ' — ' . $photo['caption']) ?>"
              class="block w-full aspect-[16/10] bg-[#EFEFE9] overflow-hidden cursor-pointer"
            >
              <img src="<?= e($photo['image']) ?>" alt="<?= e($photo['title']) ?>" loading="lazy" class="w-full h-full object-cover img-scale" />
            </button>
            <figcaption class="p-4 space-y-1">
              <div class="text-[11px] font-bold uppercase text-[#005A8D]"><?= e($photo['album']) ?></div>
              <div class="font-display font-bold text-sm text-[#102A43]"><?= e($photo['title']) ?></div>
              <p class="text-xs text-[#52606D] leading-relaxed"><?= e($photo['caption']) ?></p>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
