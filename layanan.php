<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'layanan';
$pageTitle = 'Layanan Pelanggan, Prosedur & Simulasi Tarif | ' . $officeInfo['name'];
$pageDescription = 'Akses cek tagihan air, daftar sambungan baru SIMPEL, pengaduan online, catat meter mandiri, prosedur resmi, dan simulasi estimasi tagihan Perumda Tirta Sukapura.';
$canonicalPath = '/layanan.php';

$howToSchema = [
    '@type'       => 'HowTo',
    'name'        => 'Cara Daftar Sambungan Baru Perumda Air Minum Tirta Sukapura',
    'description' => 'Tahapan pendaftaran sambungan air minum baru di Kabupaten dan Kota Tasikmalaya.',
    'step'        => [
        ['@type' => 'HowToStep', 'name' => 'Daftar lewat SIMPEL', 'text' => 'Isi formulir online melalui portal SIMPEL atau datang ke kantor cabang wilayah Anda.'],
        ['@type' => 'HowToStep', 'name' => 'Siapkan dokumen', 'text' => 'Siapkan fotokopi KTP, Kartu Keluarga, dan alamat lengkap titik rumah.'],
        ['@type' => 'HowToStep', 'name' => 'Survei jaringan dan RAB', 'text' => 'Petugas mensurvei jarak pipa distribusi dan menerbitkan rincian biaya pemasangan (RAB).'],
        ['@type' => 'HowToStep', 'name' => 'Pembayaran dan pemasangan', 'text' => 'Setelah biaya sambungan dibayar, petugas menjadwalkan pemasangan meter air.'],
    ],
];

$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Layanan & Tarif', 'url' => '/layanan.php'],
    ], $baseUrl),
    buildFaqSchema($faqs),
    $howToSchema,
];

require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-1">
  <!-- Clean Page Banner -->
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Layanan</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
        Layanan Pelanggan &amp; Prosedur Resmi
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Tautan langsung ke 6 layanan online pelanggan, alur pengajuan sambungan, dan simulasi perkiraan rekening bulanan.
      </p>
    </div>
  </section>

  <!-- 6 Layanan Online (Editorial Hairline Table-Grid, Non-Slop) -->
  <section class="py-14 lg:py-18 bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] pb-5 border-b border-[#DCE1E5]">
        Portal Layanan Online
      </h2>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 divide-y md:divide-y-0 md:gap-x-10">
        <?php foreach ($digitalServices as $svc): ?>
          <div class="py-7 border-b border-[#DCE1E5] flex flex-col justify-between gap-4 reveal">
            <div>
              <div class="flex items-center gap-2.5 mb-2">
                <i data-lucide="<?= e($svc['icon']) ?>" class="w-5 h-5 text-[#005A8D]"></i>
                <h3 class="font-display text-lg font-bold text-[#102A43]"><?= e($svc['title']) ?></h3>
              </div>
              <p class="text-sm text-[#52606D] leading-relaxed">
                <?= e($svc['description']) ?>
              </p>
            </div>
            <div>
              <a
                href="<?= e($svc['href']) ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-1.5 text-sm font-bold text-[#005A8D] hover:text-[#102A43] transition-colors"
              >
                <span><?= e($svc['cta']) ?></span>
                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Prosedur Pelanggan -->
  <section id="prosedur" class="py-14 lg:py-18 bg-[#F7F7F5] border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-8 reveal">
        Prosedur Pelayanan
      </h2>

      <div class="grid lg:grid-cols-3 gap-7">
        <?php foreach ($customerProcedures as $proc): ?>
          <div class="bg-white border border-[#DCE1E5] rounded-md p-6 flex flex-col justify-between reveal">
            <div>
              <h3 class="font-display text-lg font-bold text-[#102A43] pb-3.5 border-b border-[#DCE1E5]">
                <?= e($proc['title']) ?>
              </h3>
              <ol class="mt-4 space-y-3 text-sm text-[#1C242B] leading-relaxed">
                <?php foreach ($proc['steps'] as $i => $step): ?>
                  <li class="flex items-start gap-3">
                    <span class="font-display font-bold text-xs text-[#005A8D] mt-0.5 tabular-nums"><?= $i + 1 ?>.</span>
                    <span><?= e($step) ?></span>
                  </li>
                <?php endforeach; ?>
              </ol>
            </div>
            <div class="mt-6 pt-4 border-t border-[#DCE1E5]">
              <a
                href="<?= e($proc['href']) ?>"
                <?= str_starts_with($proc['href'], 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                class="inline-flex items-center gap-1.5 text-sm font-bold text-[#005A8D] hover:underline"
              >
                <span><?= e($proc['cta']) ?></span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Simulasi Perkiraan Tarif (Hanya ada di halaman Layanan, tidak membebani Beranda) -->
  <section id="tarif" class="py-14 lg:py-18 bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-7 space-y-6 reveal">
          <div>
            <h2 class="font-display text-2xl font-extrabold text-[#102A43]">
              Simulasi Perkiraan Tagihan Bulanan
            </h2>
            <p class="text-sm text-[#52606D] mt-1.5">
              Pilih golongan dan geser volume kubikasi untuk melihat gambaran tagihan.
            </p>
          </div>

          <div class="flex flex-wrap gap-2">
            <?php foreach ($tariffPresets as $preset): ?>
              <?php $isDefault = ($preset['id'] === 'rt1'); ?>
              <button
                type="button"
                data-tariff-btn
                data-rate1="<?= (int) $preset['rate1'] ?>"
                data-rate2="<?= (int) $preset['rate2'] ?>"
                data-rate3="<?= (int) $preset['rate3'] ?>"
                data-admin="<?= (int) $preset['admin'] ?>"
                class="px-4 py-2 rounded-md text-sm font-semibold transition-colors cursor-pointer <?= $isDefault ? 'bg-[#102A43] text-white' : 'bg-[#F7F7F5] text-[#1C242B] border border-[#DCE1E5] hover:bg-[#EFEFE9]' ?>"
              >
                <?= e($preset['label']) ?>
              </button>
            <?php endforeach; ?>
          </div>

          <div class="max-w-lg">
            <div class="flex items-baseline justify-between mb-2">
              <label for="cubic-range" class="text-xs font-semibold text-[#52606D] uppercase tracking-wider">
                Pemakaian Bulanan
              </label>
              <span id="cubic-display" class="font-display text-2xl font-extrabold text-[#005A8D] tabular-nums">
                20 m³
              </span>
            </div>
            <input id="cubic-range" type="range" min="5" max="60" step="1" value="20" class="w-full h-2 bg-slate-200 rounded-md cursor-pointer" />
            <div class="flex justify-between text-xs text-[#52606D] mt-1.5 tabular-nums">
              <span>5 m³</span>
              <span>20 m³</span>
              <span>60 m³</span>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5 reveal reveal-delay-1">
          <div class="bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-6">
            <div class="text-xs font-semibold text-[#52606D] uppercase tracking-wider">Perkiraan Total</div>
            <div id="calc-total" class="font-display text-3xl font-extrabold text-[#102A43] mt-1 tabular-nums">
              Rp 76.000
            </div>
            <dl class="mt-5 pt-4 border-t border-[#DCE1E5] space-y-2.5 text-sm">
              <div class="flex justify-between">
                <dt id="calc-tier1-label" class="text-[#52606D]">Blok I (0-10 m³)</dt>
                <dd id="calc-tier1-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 28.000</dd>
              </div>
              <div class="flex justify-between">
                <dt id="calc-tier2-label" class="text-[#52606D]">Blok II (11-20 m³)</dt>
                <dd id="calc-tier2-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 38.000</dd>
              </div>
              <div class="flex justify-between">
                <dt id="calc-tier3-label" class="text-[#52606D]">Blok III (&gt;20 m³)</dt>
                <dd id="calc-tier3-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 0</dd>
              </div>
              <div class="flex justify-between pt-2.5 border-t border-[#DCE1E5]">
                <dt class="text-[#52606D]">Biaya Beban / Administrasi</dt>
                <dd id="calc-admin-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 10.000</dd>
              </div>
            </dl>
            <p class="mt-4 text-xs text-[#52606D]">
              Hasil di atas hanya simulasi. Nominal resmi mengikuti SK Tarif terbaru di
              <a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-[#005A8D] font-bold hover:underline">portal Cek Tagihan</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>

  <!-- FAQ Lengkap -->
  <section class="py-14 lg:py-18 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 reveal">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">
        Pertanyaan Umum Pelanggan
      </h2>
      <div class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5]">
        <?php foreach ($faqs as $i => $faq): ?>
          <div class="faq-item py-4" data-open="<?= $i === 0 ? 'true' : 'false' ?>">
            <button type="button" data-faq-toggle class="w-full flex items-center justify-between gap-4 text-left cursor-pointer">
              <span class="font-display font-bold text-base text-[#102A43]"><?= e($faq['q']) ?></span>
              <i data-lucide="chevron-down" class="faq-chevron w-4 h-4 text-[#005A8D] shrink-0 transition-transform duration-300"></i>
            </button>
            <div class="faq-content">
              <div class="faq-inner">
                <p class="pt-3 text-sm text-[#52606D] leading-relaxed"><?= e($faq['a']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
