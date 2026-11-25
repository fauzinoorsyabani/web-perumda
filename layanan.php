<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'layanan';
$pageTitle = 'Layanan Pelanggan, Prosedur & Simulasi Tarif — ' . $officeInfo['name'];
$pageDescription = 'Akses 6 layanan digital Perumda Air Minum Tirta Sukapura: cek tagihan air, daftar pelanggan baru SIMPEL, pengaduan online, catat meter mandiri, prosedur resmi, dan simulasi tarif.';
$canonicalPath = '/layanan.php';

$howToSchema = [
    '@type'       => 'HowTo',
    'name'        => 'Cara Daftar Sambungan Baru Perumda Air Minum Tirta Sukapura',
    'description' => 'Panduan langkah demi langkah mendaftar sambungan air minum baru di Kabupaten Tasikmalaya.',
    'step'        => [
        ['@type' => 'HowToStep', 'name' => 'Daftar Online SIMPEL', 'text' => 'Isi formulir pendaftaran online melalui portal SIMPEL atau datang ke kantor cabang terdekat.'],
        ['@type' => 'HowToStep', 'name' => 'Siapkan Berkas', 'text' => 'Siapkan fotokopi KTP, Kartu Keluarga, dan titik lokasi pemasangan rumah.'],
        ['@type' => 'HowToStep', 'name' => 'Survei & RAB', 'text' => 'Tim teknis melakukan survei jaringan pipa dan menerbitkan rincian biaya pemasangan (RAB).'],
        ['@type' => 'HowToStep', 'name' => 'Pembayaran & Pemasangan', 'text' => 'Lakukan pembayaran resmi, kemudian petugas memasang jaringan dan meter air di lokasi.'],
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
  <!-- Page Header -->
  <section class="bg-[#0B2545] text-white py-14 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-4">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-sky-300 font-semibold">Layanan &amp; Tarif</span>
      </nav>
      <div class="max-w-3xl">
        <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight">
          Layanan Digital &amp; <strong>Prosedur Pelanggan</strong>
        </h1>
        <p class="text-slate-300 mt-3 text-base sm:text-lg leading-relaxed">
          Seluruh kebutuhan administrasi, pelaporan gangguan, pencatatan meter, hingga
          simulasi estimasi rekening air tersedia dalam satu halaman.
        </p>
      </div>
    </div>
  </section>

  <!-- 6 Layanan Digital -->
  <section class="py-16 lg:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-10 reveal">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Portal Online 24 Jam</p>
        <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
          6 Layanan Digital Resmi
        </h2>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($digitalServices as $idx => $svc): ?>
          <a
            href="<?= e($svc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="group elevated-card rounded-2xl p-6 flex flex-col justify-between reveal reveal-delay-<?= ($idx % 3) + 1 ?>"
          >
            <div>
              <div class="w-12 h-12 rounded-xl bg-[#E0F2FE] text-[#026AA2] group-hover:bg-[#026AA2] group-hover:text-white flex items-center justify-center mb-5 transition-colors">
                <i data-lucide="<?= e($svc['icon']) ?>" class="w-6 h-6"></i>
              </div>
              <h3 class="font-display text-xl font-bold text-[#0B2545] group-hover:text-[#026AA2] transition-colors">
                <?= e($svc['title']) ?>
              </h3>
              <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                <?= e($svc['description']) ?>
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-[#026AA2]">
              <span><?= e($svc['cta']) ?></span>
              <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Prosedur Pelanggan -->
  <section id="prosedur" class="py-16 lg:py-20 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-10 reveal">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Panduan Resmi</p>
        <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
          Alur &amp; Prosedur Pelayanan
        </h2>
      </div>

      <div class="grid lg:grid-cols-3 gap-7">
        <?php foreach ($customerProcedures as $idx => $proc): ?>
          <div class="elevated-card rounded-2xl p-6 sm:p-7 flex flex-col justify-between reveal reveal-delay-<?= $idx + 1 ?>">
            <div>
              <div class="flex items-center gap-3 pb-4 border-b border-slate-200">
                <div class="w-10 h-10 rounded-lg bg-[#EFF4F8] text-[#026AA2] flex items-center justify-center">
                  <i data-lucide="<?= e($proc['icon']) ?>" class="w-5 h-5"></i>
                </div>
                <h3 class="font-display text-lg font-bold text-[#0B2545]">
                  <?= e($proc['title']) ?>
                </h3>
              </div>

              <ol class="mt-5 space-y-3.5 text-sm text-slate-700 leading-relaxed">
                <?php foreach ($proc['steps'] as $stepIdx => $step): ?>
                  <li class="flex items-start gap-3">
                    <span class="w-6 h-6 rounded-full bg-[#E0F2FE] text-[#026AA2] font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">
                      <?= $stepIdx + 1 ?>
                    </span>
                    <span><?= $step ?></span>
                  </li>
                <?php endforeach; ?>
              </ol>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100">
              <a
                href="<?= e($proc['href']) ?>"
                <?= str_starts_with($proc['href'], 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                class="inline-flex items-center gap-2 text-sm font-bold text-[#026AA2] hover:text-[#0B2545] transition-colors"
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

  <!-- Simulasi Estimasi Tarif (Dedicated on Layanan page, clean & optional) -->
  <section id="tarif" class="py-16 lg:py-20 bg-[#EFF4F8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-7 space-y-6 reveal">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Simulasi Tarif</p>
            <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
              Kalkulator Estimasi Rekening Bulanan
            </h2>
            <p class="text-sm text-slate-600 mt-2">
              Gunakan alat bantu ini untuk memperkirakan biaya pemakaian kubikasi air per bulan.
            </p>
          </div>

          <div>
            <span class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2.5">
              Golongan Pelanggan
            </span>
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
                  class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors cursor-pointer <?= $isDefault ? 'bg-[#0B2545] text-white' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' ?>"
                >
                  <?= e($preset['label']) ?>
                </button>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="max-w-lg">
            <div class="flex items-baseline justify-between mb-2">
              <label for="cubic-range" class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                Volume Pemakaian
              </label>
              <span id="cubic-display" class="font-display text-2xl font-extrabold text-[#026AA2] tabular-nums">
                20 m³
              </span>
            </div>
            <input
              id="cubic-range"
              type="range"
              min="5"
              max="60"
              step="1"
              value="20"
              class="w-full h-2.5 bg-slate-300 rounded-lg cursor-pointer"
            />
            <div class="flex justify-between text-xs text-slate-500 mt-1.5">
              <span>5 m³</span>
              <span>20 m³ (Rata-rata)</span>
              <span>60 m³</span>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5 reveal reveal-delay-2">
          <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200 shadow-sm">
            <div class="text-xs font-bold uppercase tracking-wider text-slate-500">Estimasi Total Tagihan</div>
            <div id="calc-total" class="font-display text-3xl sm:text-4xl font-extrabold text-[#0B2545] mt-1 tabular-nums">
              Rp 76.000
            </div>
            <dl class="mt-5 pt-4 border-t border-slate-200 space-y-2.5 text-sm">
              <div class="flex justify-between">
                <dt id="calc-tier1-label" class="text-slate-600">Blok I (0–10 m³)</dt>
                <dd id="calc-tier1-cost" class="font-semibold text-slate-900 tabular-nums">Rp 28.000</dd>
              </div>
              <div class="flex justify-between">
                <dt id="calc-tier2-label" class="text-slate-600">Blok II (11–20 m³)</dt>
                <dd id="calc-tier2-cost" class="font-semibold text-slate-900 tabular-nums">Rp 38.000</dd>
              </div>
              <div class="flex justify-between">
                <dt id="calc-tier3-label" class="text-slate-600">Blok III (&gt;20 m³)</dt>
                <dd id="calc-tier3-cost" class="font-semibold text-slate-900 tabular-nums">Rp 0</dd>
              </div>
              <div class="flex justify-between pt-2.5 border-t border-slate-100">
                <dt class="text-slate-600">Biaya Beban / Admin</dt>
                <dd id="calc-admin-cost" class="font-semibold text-slate-900 tabular-nums">Rp 10.000</dd>
              </div>
            </dl>
            <p class="mt-4 text-xs text-slate-500">
              *Angka estimasi simulasi. Tagihan resmi mengacu pada SK Tarif terbaru di
              <a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-[#026AA2] font-bold hover:underline">portal cek tagihan</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mitra Pembayaran Marquee -->
  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>

  <!-- Full FAQ Section -->
  <section class="py-16 lg:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 reveal">
      <div class="text-center mb-10">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">FAQ Pelanggan</p>
        <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
          Pertanyaan yang Sering Diajukan
        </h2>
      </div>
      <div class="divide-y divide-slate-200 border-y border-slate-200">
        <?php foreach ($faqs as $i => $faq): ?>
          <div class="faq-item py-5" data-open="<?= $i === 0 ? 'true' : 'false' ?>">
            <button type="button" data-faq-toggle class="w-full flex items-center justify-between gap-4 text-left cursor-pointer">
              <span class="font-display font-bold text-base text-[#0B2545]"><?= e($faq['q']) ?></span>
              <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-[#026AA2] shrink-0 transition-transform duration-300"></i>
            </button>
            <div class="faq-content">
              <div class="faq-inner">
                <p class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed"><?= e($faq['a']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
