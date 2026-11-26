<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'air-minum';
$pageTitle = 'Air Minum: Sumber Air Baku, Kapasitas 513 L/dtk & Sistem Distribusi | ' . $officeInfo['name'];
$pageDescription = 'Data resmi sumber air baku Perumda Air Minum Tirta Sukapura (473 L/dtk mata air dan 40 L/dtk sungai), kapasitas produksi terpasang 513 L/detik, sistem distribusi 17 cabang, serta cakupan pelayanan.';
$canonicalPath = '/air-minum.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Air Minum', 'url' => '/air-minum.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';

$totalCapacity = array_sum(array_column($waterSources, 'capacity'));
$springCapacity = array_sum(array_map(static fn(array $s): int => $s['type'] === 'Mata Air' ? (int) $s['capacity'] : 0, $waterSources));
$surfaceCapacity = $totalCapacity - $springCapacity;
?>

<main class="flex-1">
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Air Minum</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
        Sumber Air Baku, Kapasitas &amp; Sistem Distribusi
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Data teknis sumber mata air, instalasi pengolahan air (IPA), pembagian jalur distribusi regional, dan cakupan pelayanan di Tasikmalaya.
      </p>
      <div class="mt-6 flex flex-wrap gap-2 text-xs font-semibold">
        <a href="#sumber-air" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Sumber Air Baku</a>
        <a href="#kapasitas" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Kapasitas Produksi</a>
        <a href="#distribusi" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Sistem Distribusi</a>
        <a href="#cakupan" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Cakupan Pelayanan</a>
      </div>
    </div>
  </section>

  <!-- 1. SUMBER AIR BAKU -->
  <section id="sumber-air" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-6 space-y-5">
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Sumber Air Baku</h2>
          <p class="text-sm sm:text-base text-[#52606D] leading-relaxed">
            Air baku Perumda Air Minum Tirta Sukapura berasal dari kombinasi mata air pegunungan alami dan pengolahan air sungai permukaan dengan total kapasitas terpasang <strong class="text-[#102A43]"><?= (int) $totalCapacity ?> L/detik</strong>.
          </p>

          <div class="grid sm:grid-cols-2 gap-4 pt-2">
            <div class="bg-[#F7F7F5] border-l-4 border-[#005A8D] p-5 rounded-r-md">
              <div class="font-display text-2xl font-extrabold text-[#102A43] tabular-nums"><?= (int) $springCapacity ?> L/dtk</div>
              <div class="text-xs font-bold text-[#005A8D] mt-1">Sumber Mata Air Alami</div>
              <p class="text-xs text-[#52606D] mt-2 leading-relaxed">
                Mata Air Cipondok, Leuwirupit, Cibunigeulis, Sangiang/Cianeut, Cipanyusupan, Cisitu/Cibatur, dan Cisalada.
              </p>
            </div>

            <div class="bg-[#F7F7F5] border-l-4 border-[#1E6F5C] p-5 rounded-r-md">
              <div class="font-display text-2xl font-extrabold text-[#102A43] tabular-nums"><?= (int) $surfaceCapacity ?> L/dtk</div>
              <div class="text-xs font-bold text-[#1E6F5C] mt-1">Air Permukaan (IPA)</div>
              <p class="text-xs text-[#52606D] mt-2 leading-relaxed">
                Sungai Ciwulan (±20 L/dtk di IPA Sukaraja) dan Sungai Cilangla (±20 L/dtk di IPA Bantarkalong/Karangnunggal).
              </p>
            </div>
          </div>
        </div>

        <div class="lg:col-span-6">
          <div class="rounded-md overflow-hidden aspect-[16/10] bg-[#EFEFE9]">
            <img src="assets/images/spring-source.jpg" alt="Sumber mata air pegunungan Kabupaten Tasikmalaya" loading="lazy" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. KAPASITAS PRODUKSI (Live MySQL Table) -->
  <section id="kapasitas" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 mb-6">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Kapasitas Produksi Terpasang</h2>
        <span class="font-display font-extrabold text-base text-[#005A8D] tabular-nums">Total: <?= (int) $totalCapacity ?> L/detik</span>
      </div>

      <div class="overflow-x-auto bg-white border border-[#DCE1E5] rounded-md">
        <table class="w-full text-left border-collapse text-sm">
          <thead>
            <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
              <th class="py-3.5 px-5">Nama Sumber Air</th>
              <th class="py-3.5 px-5">Jenis</th>
              <th class="py-3.5 px-5">Tahun Pembuatan</th>
              <th class="py-3.5 px-5 text-right">Kapasitas</th>
              <th class="py-3.5 px-5 hidden md:table-cell w-52">Porsi Debit</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#DCE1E5]">
            <?php foreach ($waterSources as $src): ?>
              <?php $pct = max(3, (int) round(($src['capacity'] / max(1, $totalCapacity)) * 100)); ?>
              <tr class="hover:bg-[#F7F7F5]">
                <td class="py-3.5 px-5 font-bold text-[#102A43]"><?= e($src['name']) ?></td>
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
    </div>
  </section>

  <!-- 3. SISTEM DISTRIBUSI -->
  <section id="distribusi" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
        <div>
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Sistem Distribusi Wilayah</h2>
          <p class="text-sm text-[#52606D] mt-1">Pembagian jaringan distribusi berdasarkan sumber utama dan peta jaringan GIS.</p>
        </div>
        <a href="<?= e($officeInfo['gis_url']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#005A8D] hover:underline">
          <span>Buka Peta Jaringan GIS</span>
          <i data-lucide="external-link" class="w-4 h-4"></i>
        </a>
      </div>

      <div class="grid lg:grid-cols-2 gap-8">
        <?php foreach ($distributionSystems as $sys): ?>
          <div class="bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-6">
            <h3 class="font-display font-bold text-lg text-[#102A43]"><?= e($sys['title']) ?></h3>
            <p class="text-xs sm:text-sm text-[#52606D] mt-1.5"><?= e($sys['summary']) ?></p>
            <ul class="mt-4 pt-4 border-t border-[#DCE1E5] grid sm:grid-cols-2 gap-2.5 text-sm text-[#1C242B]">
              <?php foreach ($sys['areas'] as $area): ?>
                <li class="flex items-center gap-2">
                  <span class="w-1.5 h-1.5 rounded-full bg-[#005A8D] shrink-0"></span>
                  <span><?= e($area) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 4. CAKUPAN PELAYANAN -->
  <section id="cakupan" class="py-14 bg-[#F7F7F5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">Cakupan Pelayanan (2019 - 2023)</h2>
      <div class="overflow-x-auto bg-white border border-[#DCE1E5] rounded-md">
        <table class="w-full text-left border-collapse text-sm tabular-nums">
          <thead>
            <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
              <th class="py-3.5 px-5">Tahun</th>
              <th class="py-3.5 px-5">Kabupaten Tasikmalaya</th>
              <th class="py-3.5 px-5">Kota Tasikmalaya</th>
              <th class="py-3.5 px-5 text-right">Total Gabungan</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#DCE1E5]">
            <?php foreach ($coverageStats as $row): ?>
              <tr class="hover:bg-[#F7F7F5]">
                <td class="py-3.5 px-5 font-bold text-[#102A43]"><?= e($row['year']) ?></td>
                <td class="py-3.5 px-5 text-[#1C242B]"><?= e($row['kab']) ?></td>
                <td class="py-3.5 px-5 text-[#1C242B]"><?= e($row['kota']) ?></td>
                <td class="py-3.5 px-5 text-right font-bold text-[#005A8D]"><?= e($row['total']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
