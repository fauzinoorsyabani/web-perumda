<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'profil';
$pageTitle = 'Profil Perusahaan, Sejarah & Infrastruktur Air Minum — ' . $officeInfo['name'];
$pageDescription = 'Sejarah Perumda Air Minum Tirta Sukapura sejak 1925, visi & misi, 9 sumber air baku dengan kapasitas terpasang 513 L/detik, serta data cakupan pelayanan Tasikmalaya.';
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
  <section class="bg-[#0B2545] text-white py-14 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-4">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-sky-300 font-semibold">Profil Perusahaan</span>
      </nav>
      <div class="grid lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-7">
          <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
            Mengabdi Untuk Air Bersih <strong>Tasikmalaya Sejak 1925</strong>
          </h1>
          <p class="text-slate-300 mt-4 text-base sm:text-lg leading-relaxed max-w-2xl">
            Perusahaan Umum Daerah Air Minum Tirta Sukapura berkomitmen menyediakan air minum
            aman, higienis, dan berkelanjutan melalui tata kelola profesional.
          </p>
        </div>
        <div class="lg:col-span-5">
          <div class="rounded-2xl overflow-hidden aspect-[16/10] bg-[#13355E] border border-white/10">
            <img
              src="assets/images/spring-source.jpg"
              alt="Mata Air Alami Kabupaten Tasikmalaya"
              class="w-full h-full object-cover"
            />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Visi & Misi -->
  <section class="py-16 lg:py-20 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-5 reveal">
          <div class="rounded-2xl bg-[#0B2545] text-white p-7 sm:p-8 space-y-4">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-sky-300">Visi Perusahaan</p>
            <h2 class="font-display text-2xl sm:text-3xl font-extrabold leading-snug">
              Menjadi Perumda Air Minum yang Unggul, Mandiri, dan Terpercaya di Kabupaten Tasikmalaya.
            </h2>
            <p class="text-sm text-slate-300 pt-4 border-t border-white/15">
              Didukung penuh oleh Pemerintah Daerah Kabupaten Tasikmalaya berdasarkan
              Perda No. 7 Tahun 1975 &amp; Perda No. 24 Tahun 2002.
            </p>
          </div>
        </div>

        <div class="lg:col-span-7 reveal reveal-delay-2">
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Misi Utama</p>
          <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1 mb-6">
            Empat Pilar Komitmen Layanan
          </h2>
          <div class="divide-y divide-slate-200 border-y border-slate-200">
            <?php foreach ($missions as $idx => $misi): ?>
              <div class="py-4 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-[#E0F2FE] text-[#026AA2] font-display font-extrabold text-xs flex items-center justify-center shrink-0 mt-0.5">
                  0<?= $idx + 1 ?>
                </span>
                <p class="text-sm sm:text-base text-slate-700 leading-relaxed"><?= $misi ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sejarah Singkat -->
  <section id="sejarah" class="py-16 lg:py-20 bg-[#F8FAFC]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-10 reveal">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Sejarah Perusahaan</p>
        <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
          Perjalanan Satu Abad Pelayanan Air Bersih
        </h2>
      </div>

      <div class="space-y-4">
        <?php foreach ($historyTimeline as $idx => $item): ?>
          <div class="elevated-card rounded-2xl p-6 grid sm:grid-cols-12 gap-3 sm:gap-6 items-start reveal">
            <div class="sm:col-span-3">
              <span class="inline-block px-3 py-1 rounded-lg bg-[#0B2545] text-white font-display font-bold text-xs">
                <?= e($item['year']) ?>
              </span>
            </div>
            <div class="sm:col-span-9">
              <h3 class="font-display font-bold text-lg text-[#0B2545]"><?= e($item['title']) ?></h3>
              <p class="text-sm text-slate-600 mt-1.5 leading-relaxed"><?= $item['text'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Infrastruktur: Sumber Air Baku & Kapasitas Produksi (Data Asli 513 L/dtk) -->
  <section id="infrastruktur" class="py-16 lg:py-20 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 reveal">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Infrastruktur &amp; Produksi</p>
          <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
            Sumber Air Baku &amp; <strong>Kapasitas Terpasang</strong>
          </h2>
        </div>
        <div class="inline-flex items-baseline gap-2 px-4 py-2.5 rounded-xl bg-[#EFF4F8]">
          <span class="text-xs font-semibold text-slate-500">Total Kapasitas:</span>
          <span class="font-display text-xl font-extrabold text-[#026AA2] tabular-nums"><?= (int) $totalCapacity ?> L/dtk</span>
        </div>
      </div>

      <!-- Clean Architectural Data Table -->
      <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200 reveal">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
              <th class="py-3.5 px-5">Nama Sumber Air</th>
              <th class="py-3.5 px-5">Kategori</th>
              <th class="py-3.5 px-5">Tahun Bangun</th>
              <th class="py-3.5 px-5 text-right">Kapasitas</th>
              <th class="py-3.5 px-5 hidden md:table-cell w-56">Proporsi Debit</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200 text-sm">
            <?php foreach ($waterSources as $src): ?>
              <?php $pct = max(3, (int) round(($src['capacity'] / $totalCapacity) * 100)); ?>
              <tr class="hover:bg-[#F8FAFC] transition-colors">
                <td class="py-3.5 px-5 font-semibold text-[#0B2545]"><?= e($src['name']) ?></td>
                <td class="py-3.5 px-5">
                  <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-semibold <?= $src['type'] === 'Mata Air' ? 'bg-[#E0F2FE] text-[#026AA2]' : 'bg-[#F0FDFA] text-[#0D9488]' ?>">
                    <?= e($src['type']) ?>
                  </span>
                </td>
                <td class="py-3.5 px-5 text-slate-600 tabular-nums"><?= e($src['year']) ?></td>
                <td class="py-3.5 px-5 text-right font-bold text-[#0B2545] tabular-nums">
                  <?= (int) $src['capacity'] ?> L/dtk
                </td>
                <td class="py-3.5 px-5 hidden md:table-cell">
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-[#026AA2]" style="width: <?= $pct ?>%"></div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Cakupan Pelayanan 2019–2023 -->
      <div class="mt-14 reveal">
        <h3 class="font-display text-xl font-extrabold text-[#0B2545] mb-4">
          Tren Cakupan Pelayanan (2019–2023)
        </h3>
        <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200">
          <table class="w-full text-left border-collapse text-sm">
            <thead>
              <tr class="bg-[#F8FAFC] border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                <th class="py-3.5 px-5">Tahun</th>
                <th class="py-3.5 px-5">Kabupaten Tasikmalaya</th>
                <th class="py-3.5 px-5">Kota Tasikmalaya</th>
                <th class="py-3.5 px-5 text-right">Total Gabungan</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 tabular-nums">
              <?php foreach ($coverageStats as $row): ?>
                <tr class="hover:bg-[#F8FAFC]">
                  <td class="py-3 px-5 font-bold text-[#0B2545]"><?= e($row['year']) ?></td>
                  <td class="py-3 px-5 text-slate-700"><?= e($row['kab']) ?></td>
                  <td class="py-3 px-5 text-slate-700"><?= e($row['kota']) ?></td>
                  <td class="py-3 px-5 text-right font-bold text-[#026AA2]"><?= e($row['total']) ?></td>
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
