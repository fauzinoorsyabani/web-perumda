<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'profil';
$pageTitle = 'Profil Perusahaan, Sejarah & Sumber Air | ' . $officeInfo['name'];
$pageDescription = 'Sejarah Perumda Air Minum Tirta Sukapura sejak 1925, visi dan misi, daftar 9 sumber air baku dengan kapasitas terpasang 513 L/detik, serta cakupan pelayanan Tasikmalaya.';
$canonicalPath = '/profil.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Profil Perusahaan', 'url' => '/profil.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';

$totalCapacity = array_sum(array_column($waterSources, 'capacity'));
?>

<main class="flex-1">
  <!-- Page Header -->
  <section class="bg-[#102A43] text-white py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Profil</span>
      </nav>
      <div class="grid lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-7">
          <h1 class="font-display text-3xl sm:text-4xl font-extrabold leading-tight">
            Profil Perumda Air Minum Tirta Sukapura
          </h1>
          <p class="text-slate-300 mt-3 text-base leading-relaxed max-w-2xl">
            Berawal dari jaringan Mata Air Cibunigeulis pada 1925 dan diresmikan lewat Perda Nomor 7 Tahun 1975, kami mengelola pasokan air minum untuk warga Kabupaten dan Kota Tasikmalaya.
          </p>
        </div>
        <div class="lg:col-span-5">
          <div class="rounded-md overflow-hidden aspect-[16/10] bg-[#0A1D30]">
            <img src="assets/images/spring-source.jpg" alt="Sumber mata air pegunungan Tasikmalaya" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Visi & Misi -->
  <section class="py-14 lg:py-18 bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-5 reveal">
          <div class="bg-[#F7F7F5] border-l-4 border-[#005A8D] p-6 sm:p-7 rounded-r-md">
            <h2 class="font-display text-sm font-bold uppercase tracking-wider text-[#005A8D]">Visi</h2>
            <p class="font-display text-xl sm:text-2xl font-bold text-[#102A43] mt-2 leading-snug">
              Menjadi perusahaan daerah air minum yang unggul, mandiri, dan dipercaya masyarakat Kabupaten Tasikmalaya.
            </p>
          </div>
        </div>

        <div class="lg:col-span-7 reveal reveal-delay-1">
          <h2 class="font-display text-xl font-extrabold text-[#102A43] mb-4">Misi Perusahaan</h2>
          <ol class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5]">
            <?php foreach ($missions as $idx => $misi): ?>
              <li class="py-3.5 flex items-baseline gap-4 text-sm sm:text-base text-[#1C242B]">
                <span class="font-display font-bold text-xs text-[#005A8D] tabular-nums">0<?= $idx + 1 ?></span>
                <span><?= e($misi) ?></span>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Sejarah Singkat -->
  <section id="sejarah" class="py-14 lg:py-18 bg-[#F7F7F5] border-b border-[#DCE1E5]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-8 reveal">
        Sejarah Singkat (1925 - Kini)
      </h2>

      <div class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5] bg-white px-6 rounded-md">
        <?php foreach ($historyTimeline as $item): ?>
          <div class="py-6 grid sm:grid-cols-12 gap-2 sm:gap-6 items-baseline reveal">
            <div class="sm:col-span-3 font-display font-extrabold text-sm text-[#005A8D] tabular-nums">
              <?= e($item['year']) ?>
            </div>
            <div class="sm:col-span-9">
              <h3 class="font-display font-bold text-base text-[#102A43]"><?= e($item['title']) ?></h3>
              <p class="text-sm text-[#52606D] mt-1.5 leading-relaxed"><?= e($item['text']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Sumber Air Baku & Kapasitas Produksi (Data Resmi 513 L/dtk) -->
  <section id="infrastruktur" class="py-14 lg:py-18 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-4 mb-6 reveal">
        <div>
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">
            Sumber Air Baku &amp; Kapasitas Terpasang
          </h2>
          <p class="text-sm text-[#52606D] mt-1">
            Total kapasitas 513 L/detik dari 7 kelompok mata air alami dan 2 instalasi air permukaan.
          </p>
        </div>
        <div class="font-display text-lg font-extrabold text-[#005A8D] tabular-nums">
          Total: <?= (int) $totalCapacity ?> L/detik
        </div>
      </div>

      <div class="overflow-x-auto border border-[#DCE1E5] rounded-md reveal">
        <table class="w-full text-left border-collapse text-sm">
          <thead>
            <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
              <th class="py-3.5 px-5">Nama Sumber</th>
              <th class="py-3.5 px-5">Jenis</th>
              <th class="py-3.5 px-5">Tahun</th>
              <th class="py-3.5 px-5 text-right">Kapasitas</th>
              <th class="py-3.5 px-5 hidden md:table-cell w-52">Porsi Debit</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#DCE1E5]">
            <?php foreach ($waterSources as $src): ?>
              <?php $pct = max(3, (int) round(($src['capacity'] / $totalCapacity) * 100)); ?>
              <tr class="hover:bg-[#F7F7F5]">
                <td class="py-3.5 px-5 font-semibold text-[#102A43]"><?= e($src['name']) ?></td>
                <td class="py-3.5 px-5 text-[#52606D]"><?= e($src['type']) ?></td>
                <td class="py-3.5 px-5 text-[#52606D] tabular-nums"><?= e($src['year']) ?></td>
                <td class="py-3.5 px-5 text-right font-bold text-[#102A43] tabular-nums"><?= (int) $src['capacity'] ?> L/dtk</td>
                <td class="py-3.5 px-5 hidden md:table-cell">
                  <div class="w-full h-2 bg-[#EFEFE9] rounded-sm overflow-hidden">
                    <div class="h-full <?= $src['type'] === 'Mata Air' ? 'bg-[#005A8D]' : 'bg-[#1E6F5C]' ?>" style="width: <?= $pct ?>%"></div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Cakupan Pelayanan -->
      <div class="mt-14 reveal">
        <h2 class="font-display text-xl font-extrabold text-[#102A43] mb-4">
          Cakupan Pelayanan (2019 - 2023)
        </h2>
        <div class="overflow-x-auto border border-[#DCE1E5] rounded-md">
          <table class="w-full text-left border-collapse text-sm tabular-nums">
            <thead>
              <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
                <th class="py-3 px-5">Tahun</th>
                <th class="py-3 px-5">Kabupaten Tasikmalaya</th>
                <th class="py-3 px-5">Kota Tasikmalaya</th>
                <th class="py-3 px-5 text-right">Total Gabungan</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#DCE1E5]">
              <?php foreach ($coverageStats as $row): ?>
                <tr class="hover:bg-[#F7F7F5]">
                  <td class="py-3 px-5 font-bold text-[#102A43]"><?= e($row['year']) ?></td>
                  <td class="py-3 px-5 text-[#1C242B]"><?= e($row['kab']) ?></td>
                  <td class="py-3 px-5 text-[#1C242B]"><?= e($row['kota']) ?></td>
                  <td class="py-3 px-5 text-right font-bold text-[#005A8D]"><?= e($row['total']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
