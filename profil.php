<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'profil';
$pageTitle = 'Profil, Pimpinan, Struktur Organisasi & Program Kerja | ' . $officeInfo['name'];
$pageDescription = 'Sejarah Perumda Air Minum Tirta Sukapura sejak 1925, visi misi, Direktur H. Bekti Alamsyah, Dewan Pengawas Dr. H. Rubi Azhara, bagan struktur organisasi, daftar kepegawaian, program kerja, dan filosofi logo.';
$canonicalPath = '/profil.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Profil Perusahaan', 'url' => '/profil.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-1">
  <!-- Header Banner -->
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Profil</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold leading-tight">
        Profil Perumda Air Minum Tirta Sukapura
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Sejarah, visi misi, jajaran pimpinan, bagan struktur organisasi, pejabat struktural, program kerja, serta makna logo perusahaan.
      </p>

      <!-- In-page Anchor Strip -->
      <div class="mt-6 flex flex-wrap gap-2 text-xs font-semibold">
        <?php foreach ($navMenus[1]['children'] as $anchor): ?>
          <a href="<?= e($anchor['href']) ?>" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200 hover:text-white transition-colors">
            <?= e($anchor['label']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 1. SEJARAH SINGKAT -->
  <section id="sejarah" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">Sejarah Singkat (1925 - Kini)</h2>
      <div class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5]">
        <?php foreach ($historyTimeline as $item): ?>
          <div class="py-5 grid sm:grid-cols-12 gap-2 sm:gap-6 items-baseline">
            <div class="sm:col-span-3 font-display font-extrabold text-sm text-[#005A8D] tabular-nums"><?= e($item['year']) ?></div>
            <div class="sm:col-span-9">
              <h3 class="font-display font-bold text-base text-[#102A43]"><?= e($item['title']) ?></h3>
              <p class="text-sm text-[#52606D] mt-1 leading-relaxed"><?= e($item['text']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 2. VISI & MISI (dengan Dokumen Resmi) -->
  <section id="visi-misi" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-6 space-y-6">
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Visi &amp; Misi</h2>
          <div class="bg-white border-l-4 border-[#005A8D] p-5 rounded-r-md">
            <div class="text-xs font-bold uppercase tracking-wider text-[#005A8D]">Visi</div>
            <p class="font-display text-lg font-bold text-[#102A43] mt-1.5 leading-snug">
              Menjadi perusahaan daerah air minum yang unggul, mandiri, dan dipercaya masyarakat Kabupaten Tasikmalaya.
            </p>
          </div>
          <ol class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5] bg-white px-5 rounded-md">
            <?php foreach ($missions as $idx => $misi): ?>
              <li class="py-3.5 flex items-baseline gap-3 text-sm text-[#1C242B]">
                <span class="font-display font-bold text-xs text-[#005A8D] tabular-nums">0<?= $idx + 1 ?></span>
                <span><?= e($misi) ?></span>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>

        <div class="lg:col-span-6">
          <button type="button" data-lightbox="assets/images/official/visi-misi.jpg" data-caption="Dokumen Resmi Visi dan Misi Perumda Air Minum Tirta Sukapura" class="group block w-full text-left cursor-pointer">
            <div class="rounded-md overflow-hidden border border-[#DCE1E5] bg-white">
              <img src="assets/images/official/visi-misi.jpg" alt="Visi dan Misi Resmi Perumda Air Minum Tirta Sukapura" loading="lazy" class="w-full h-auto object-contain img-scale" />
            </div>
            <span class="inline-block mt-2 text-xs font-semibold text-[#005A8D] group-hover:underline">Klik gambar untuk perbesar</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. PIMPINAN: BUPATI, DEWAN PENGAWAS & DIREKTUR -->
  <section id="pimpinan" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">Pimpinan, Dewan Pengawas &amp; Direksi</h2>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <?php foreach ($leadership as $leader): ?>
          <div class="bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-5">
            <div class="text-[11px] font-bold uppercase tracking-wider text-[#005A8D]"><?= e($leader['group']) ?></div>
            <div class="font-display font-bold text-base text-[#102A43] mt-1.5"><?= e($leader['name']) ?></div>
            <div class="text-xs text-[#52606D] mt-1"><?= e($leader['role']) ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <div>
          <h3 class="font-display font-bold text-base text-[#102A43] mb-3">Profil Direktur</h3>
          <button type="button" data-lightbox="assets/images/official/direktur.jpg" data-caption="Direktur Perumda Air Minum Tirta Sukapura: H. Bekti Alamsyah, ST" class="group block w-full text-left cursor-pointer">
            <div class="rounded-md overflow-hidden border border-[#DCE1E5] bg-[#F7F7F5]">
              <img src="assets/images/official/direktur.jpg" alt="Direktur Perumda Air Minum Tirta Sukapura H. Bekti Alamsyah, ST" loading="lazy" class="w-full h-auto object-contain img-scale" />
            </div>
            <span class="inline-block mt-2 text-xs font-semibold text-[#005A8D] group-hover:underline">Perbesar profil direktur</span>
          </button>
        </div>
        <div>
          <h3 class="font-display font-bold text-base text-[#102A43] mb-3">Profil Dewan Pengawas</h3>
          <button type="button" data-lightbox="assets/images/official/dewan-pengawas.jpg" data-caption="Dewan Pengawas Perumda Air Minum Tirta Sukapura: Dr. H. Rubi Azhara, S.STP., M.Si" class="group block w-full text-left cursor-pointer">
            <div class="rounded-md overflow-hidden border border-[#DCE1E5] bg-[#F7F7F5]">
              <img src="assets/images/official/dewan-pengawas.jpg" alt="Dewan Pengawas Perumda Air Minum Tirta Sukapura Dr. H. Rubi Azhara, S.STP., M.Si" loading="lazy" class="w-full h-auto object-contain img-scale" />
            </div>
            <span class="inline-block mt-2 text-xs font-semibold text-[#005A8D] group-hover:underline">Perbesar profil dewan pengawas</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. STRUKTUR ORGANISASI -->
  <section id="struktur" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 mb-6">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Bagan Struktur Organisasi</h2>
        <span class="text-xs text-[#52606D]">Klik bagan untuk melihat ukuran penuh</span>
      </div>

      <button type="button" data-lightbox="assets/images/official/struktur-organisasi.jpg" data-caption="Bagan Struktur Organisasi Perumda Air Minum Tirta Sukapura" class="block w-full bg-white border border-[#DCE1E5] rounded-md p-3 sm:p-5 cursor-pointer hover:border-[#005A8D] transition-colors">
        <img src="assets/images/official/struktur-organisasi.jpg" alt="Bagan Struktur Organisasi Perumda Air Minum Tirta Sukapura" loading="lazy" class="w-full h-auto max-h-[620px] object-contain mx-auto" />
      </button>
    </div>
  </section>

  <!-- 5. KEPEGAWAIAN & PEJABAT STRUKTURAL -->
  <section id="kepegawaian" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-[#DCE1E5] mb-8">
        <div>
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Direktori Kepegawaian &amp; Pejabat Struktural</h2>
          <p class="text-sm text-[#52606D] mt-1">Susunan Kepala Bagian Kantor Pusat, SPI, Kepala Cabang, dan Kepala Unit.</p>
        </div>
        <div class="flex flex-wrap gap-2" data-filter-group="staff">
          <button type="button" data-filter-val="all" class="px-3.5 py-1.5 rounded-md text-xs font-bold bg-[#102A43] text-white cursor-pointer">Semua</button>
          <button type="button" data-filter-val="pusat" class="px-3.5 py-1.5 rounded-md text-xs font-bold bg-white text-[#52606D] border border-[#DCE1E5] cursor-pointer">Kantor Pusat &amp; SPI</button>
          <button type="button" data-filter-val="cabang" class="px-3.5 py-1.5 rounded-md text-xs font-bold bg-white text-[#52606D] border border-[#DCE1E5] cursor-pointer">17 Cabang &amp; Unit</button>
        </div>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($staffCentral as $dept): ?>
          <div data-filter-item="staff" data-filter-cat="pusat" class="bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-5">
            <div class="text-[11px] font-bold uppercase text-[#005A8D]">Kantor Pusat</div>
            <h3 class="font-display font-bold text-base text-[#102A43] mt-1"><?= e($dept['unit']) ?></h3>
            <div class="text-sm font-semibold text-[#1C242B] mt-1"><?= e($dept['head']) ?></div>
            <ul class="mt-3 pt-3 border-t border-[#DCE1E5] space-y-1.5 text-xs text-[#52606D]">
              <?php foreach ($dept['subs'] as $sub): ?>
                <li><?= e($sub) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>

        <?php foreach ($staffBranches as $dept): ?>
          <div data-filter-item="staff" data-filter-cat="cabang" class="bg-white border border-[#DCE1E5] rounded-md p-5">
            <div class="text-[11px] font-bold uppercase text-[#1E6F5C]">Cabang / Unit</div>
            <h3 class="font-display font-bold text-base text-[#102A43] mt-1"><?= e($dept['unit']) ?></h3>
            <div class="text-sm font-semibold text-[#1C242B] mt-1"><?= e($dept['head']) ?></div>
            <ul class="mt-3 pt-3 border-t border-[#DCE1E5] space-y-1.5 text-xs text-[#52606D]">
              <?php foreach ($dept['subs'] as $sub): ?>
                <li><?= e($sub) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 6. PROGRAM KERJA -->
  <section id="program-kerja" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mb-8">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Program Kerja Strategis</h2>
        <p class="text-sm text-[#52606D] mt-1.5">
          Fokus penekanan kehilangan air (NRW), perluasan daerah layanan, dan diversifikasi usaha dengan sumber pendanaan APBN serta internal perusahaan.
        </p>
      </div>

      <ol class="grid md:grid-cols-2 gap-x-8 divide-y md:divide-y-0">
        <?php foreach ($workPrograms as $idx => $prog): ?>
          <li class="py-4 border-b border-[#DCE1E5] flex items-start gap-3.5 text-sm text-[#1C242B] leading-relaxed">
            <span class="font-display font-extrabold text-xs text-[#005A8D] tabular-nums mt-0.5"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <span><?= e($prog) ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- 7. FILOSOFI LOGO -->
  <section id="filosofi-logo" class="py-14 bg-white scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-4 bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-8 flex flex-col items-center text-center">
          <img src="assets/images/logo-perumda.png" alt="Logo Perumda Air Minum Tirta Sukapura" class="h-28 w-auto object-contain" />
          <h2 class="font-display text-xl font-extrabold text-[#102A43] mt-5">Filosofi Logo</h2>
          <p class="text-xs text-[#52606D] mt-1.5">Makna enam unsur utama pada lambang resmi Perumda Air Minum Tirta Sukapura.</p>
        </div>

        <div class="lg:col-span-8 divide-y divide-[#DCE1E5] border-y border-[#DCE1E5]">
          <?php foreach ($logoPhilosophy as $item): ?>
            <div class="py-4 grid sm:grid-cols-12 gap-2 sm:gap-4 items-baseline">
              <div class="sm:col-span-4 font-display font-bold text-sm text-[#102A43]">
                <span class="text-[#005A8D] mr-2 tabular-nums"><?= e($item['num']) ?></span>
                <?= e($item['element']) ?>
              </div>
              <div class="sm:col-span-8 text-sm text-[#52606D] leading-relaxed"><?= e($item['meaning']) ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
