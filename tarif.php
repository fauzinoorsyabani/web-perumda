<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'tarif';
$pageTitle = 'Tarif Air 2025, Klasifikasi Pelanggan, Biaya Pemasangan & Mitra Bayar | ' . $officeInfo['name'];
$pageDescription = 'Daftar resmi Klasifikasi Pelanggan, Tarif Air 2025, Biaya Pemasangan Sambungan Baru (Sambar), Simulasi Estimasi Tagihan, dan Mitra Pembayaran Perumda Air Minum Tirta Sukapura.';
$canonicalPath = '/tarif.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Tarif & Mitra Pembayaran', 'url' => '/tarif.php'],
    ], $baseUrl),
];

require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-1">
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Tarif</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
        Klasifikasi Pelanggan, Tarif Air 2025 &amp; Biaya Pasang Baru
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Rincian resmi klasifikasi golongan pelanggan, tarif rekening air, biaya pemasangan sambungan baru, simulasi estimasi, dan daftar mitra pembayaran.
      </p>
      <div class="mt-6 flex flex-wrap gap-2 text-xs font-semibold">
        <a href="#klasifikasi" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Klasifikasi Pelanggan</a>
        <a href="#tarif-air" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Tarif Air 2025</a>
        <a href="#biaya-sambar" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Biaya Pemasangan Baru</a>
        <a href="#simulasi" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Simulasi Tagihan</a>
        <a href="#mitra" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Mitra Pembayaran</a>
      </div>
    </div>
  </section>

  <!-- 1. TARIF AIR 2025 -->
  <section id="tarif-air" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 mb-6">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Daftar Resmi Tarif Air 2025</h2>
        <span class="text-xs text-[#52606D]">Klik gambar untuk perbesar tabel tarif</span>
      </div>
      <button type="button" data-lightbox="assets/images/official/tarif-air-2025.png" data-caption="Daftar Resmi Tarif Air 2025 Perumda Air Minum Tirta Sukapura" class="block w-full bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-4 cursor-pointer hover:border-[#005A8D]">
        <img src="assets/images/official/tarif-air-2025.png" alt="Tabel Tarif Air 2025 Perumda Air Minum Tirta Sukapura" loading="lazy" class="w-full h-auto max-h-[680px] object-contain mx-auto" />
      </button>
    </div>
  </section>

  <!-- 2. KLASIFIKASI PELANGGAN & BIAYA PEMASANGAN BARU -->
  <section id="klasifikasi" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-10">
      <div>
        <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-4">Klasifikasi Pelanggan</h2>
        <button type="button" data-lightbox="assets/images/official/klasifikasi.jpg" data-caption="Klasifikasi Golongan Pelanggan Perumda Air Minum Tirta Sukapura" class="block w-full bg-white border border-[#DCE1E5] rounded-md p-3 cursor-pointer hover:border-[#005A8D]">
          <img src="assets/images/official/klasifikasi.jpg" alt="Klasifikasi Pelanggan Perumda Tirta Sukapura" loading="lazy" class="w-full h-auto object-contain" />
        </button>
      </div>

      <div id="biaya-sambar" class="scroll-mt-24">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-4">Tarif Pemasangan Baru (Sambar)</h2>
        <button type="button" data-lightbox="assets/images/official/biaya-sambar.png" data-caption="Tarif Pemasangan Sambungan Baru (Sambar) Perumda Air Minum Tirta Sukapura" class="block w-full bg-white border border-[#DCE1E5] rounded-md p-3 cursor-pointer hover:border-[#005A8D]">
          <img src="assets/images/official/biaya-sambar.png" alt="Tarif Pemasangan Sambungan Baru Perumda Tirta Sukapura" loading="lazy" class="w-full h-auto object-contain" />
        </button>
      </div>
    </div>
  </section>

  <!-- 3. SIMULASI PERKIRAAN TAGIHAN -->
  <section id="simulasi" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-7 space-y-6">
          <div>
            <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Simulasi Perkiraan Tagihan Bulanan</h2>
            <p class="text-sm text-[#52606D] mt-1.5">Alat bantu estimasi cepat berdasarkan golongan dan volume pemakaian air (m³).</p>
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
              <label for="cubic-range" class="text-xs font-semibold text-[#52606D] uppercase tracking-wider">Pemakaian Bulanan</label>
              <span id="cubic-display" class="font-display text-2xl font-extrabold text-[#005A8D] tabular-nums">20 m³</span>
            </div>
            <input id="cubic-range" type="range" min="5" max="60" step="1" value="20" class="w-full h-2 bg-slate-200 rounded-md cursor-pointer" />
            <div class="flex justify-between text-xs text-[#52606D] mt-1.5 tabular-nums">
              <span>5 m³</span><span>20 m³</span><span>60 m³</span>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5">
          <div class="bg-[#F7F7F5] border border-[#DCE1E5] rounded-md p-6">
            <div class="text-xs font-semibold text-[#52606D] uppercase tracking-wider">Perkiraan Total</div>
            <div id="calc-total" class="font-display text-3xl font-extrabold text-[#102A43] mt-1 tabular-nums">Rp 76.000</div>
            <dl class="mt-5 pt-4 border-t border-[#DCE1E5] space-y-2.5 text-sm">
              <div class="flex justify-between"><dt id="calc-tier1-label" class="text-[#52606D]">Blok I (0-10 m³)</dt><dd id="calc-tier1-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 28.000</dd></div>
              <div class="flex justify-between"><dt id="calc-tier2-label" class="text-[#52606D]">Blok II (11-20 m³)</dt><dd id="calc-tier2-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 38.000</dd></div>
              <div class="flex justify-between"><dt id="calc-tier3-label" class="text-[#52606D]">Blok III (&gt;20 m³)</dt><dd id="calc-tier3-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 0</dd></div>
              <div class="flex justify-between pt-2.5 border-t border-[#DCE1E5]"><dt class="text-[#52606D]">Biaya Administrasi</dt><dd id="calc-admin-cost" class="font-semibold text-[#102A43] tabular-nums">Rp 10.000</dd></div>
            </dl>
            <p class="mt-4 text-xs text-[#52606D]">
              Cek nominal resmi Anda di <a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-[#005A8D] font-bold hover:underline">portal Cek Tagihan</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. MITRA PEMBAYARAN -->
  <section id="mitra" class="py-14 bg-[#F7F7F5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">Mitra Pembayaran Rekening Air</h2>
      <button type="button" data-lightbox="assets/images/official/mitra-pembayaran.png" data-caption="Daftar Mitra Pembayaran Resmi Perumda Air Minum Tirta Sukapura" class="block w-full bg-white border border-[#DCE1E5] rounded-md p-4 cursor-pointer hover:border-[#005A8D]">
        <img src="assets/images/official/mitra-pembayaran.png" alt="Mitra Pembayaran Rekening Air Perumda Tirta Sukapura" loading="lazy" class="w-full h-auto max-h-[540px] object-contain mx-auto" />
      </button>
    </div>
  </section>

  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
