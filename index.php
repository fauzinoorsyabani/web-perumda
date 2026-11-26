<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$activePage = 'beranda';
$pageTitle = 'Perumda Air Minum Tirta Sukapura | Kabupaten Tasikmalaya';
$pageDescription = 'Portal resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Cek tagihan air, daftar sambungan baru SIMPEL, lapor gangguan 24 jam, profil perusahaan, dan berita pelanggan.';
$canonicalPath = '/';
$extraSchemas = [
    buildFaqSchema(array_slice($faqs, 0, 4)),
];

require_once __DIR__ . '/includes/header.php';

$leadNews = $newsItems[0];
$sideNews = array_slice($newsItems, 1, 4);
?>

<main class="flex-1">
  <!-- EDITORIAL PHOTOGRAPHIC HERO (Grounded, Architectural, Non-SaaS) -->
  <section class="bg-[#102A43] text-white">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-12">
      <!-- Left Editorial Column -->
      <div class="lg:col-span-5 px-4 sm:px-6 lg:px-10 py-14 lg:py-20 flex flex-col justify-between gap-10">
        <div class="space-y-5 reveal">
          <p class="text-xs font-semibold tracking-wide text-slate-300">
            Kabupaten &amp; Kota Tasikmalaya
          </p>
          <h1 class="font-display text-3xl sm:text-4xl lg:text-[2.75rem] font-extrabold leading-[1.1] text-white">
            Air Minum Bersih untuk Warga Tasikmalaya.
          </h1>
          <p class="text-base text-slate-300 leading-relaxed">
            Perumda Air Minum Tirta Sukapura menyalurkan air dari 9 sumber mata air dan sungai berkapasitas 513 L/detik melalui 17 cabang pelayanan.
          </p>
          <div class="pt-2 flex flex-wrap gap-3">
            <a
              href="<?= e($officeInfo['bill_url']) ?>"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center gap-2 px-5 py-3 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold transition-colors"
            >
              <span>Cek Tagihan Air</span>
              <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
            </a>
            <a
              href="<?= e($officeInfo['simpel_url']) ?>"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center gap-2 px-5 py-3 rounded-md border border-white/25 hover:bg-white/10 text-white text-sm font-semibold transition-colors"
            >
              <span>Daftar Sambungan Baru</span>
            </a>
          </div>
        </div>

        <div class="pt-6 border-t border-white/15 flex flex-wrap items-center justify-between gap-4 text-xs text-slate-300 tabular-nums">
          <span>Call Center 24 Jam</span>
          <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="font-bold text-white text-sm hover:text-sky-300">
            <?= e($officeInfo['phone']) ?>
          </a>
        </div>
      </div>

      <!-- Right Edge-to-Edge Real Photo -->
      <div class="lg:col-span-7 bg-[#0A1D30] min-h-[280px] sm:min-h-[380px] lg:min-h-[500px] overflow-hidden">
        <img
          src="assets/images/hero-water.jpg"
          alt="Instalasi pengolahan air bersih Perumda Air Minum Tirta Sukapura di Kabupaten Tasikmalaya"
          fetchpriority="high"
          class="w-full h-full object-cover"
        />
      </div>
    </div>
  </section>

  <!-- UTILITY QUICK-ACCESS DOCK (Clean Hairline Bar — Zero Card Bloat) -->
  <section aria-label="Akses Cepat Pelanggan" class="bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 divide-y md:divide-y-0 md:divide-x divide-[#DCE1E5]">
        <?php foreach ($digitalServices as $svc): ?>
          <a
            href="<?= e($svc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="group py-5 px-4 flex flex-col justify-between gap-3 hover:bg-[#F7F7F5] transition-colors"
          >
            <div class="flex items-center justify-between">
              <i data-lucide="<?= e($svc['icon']) ?>" class="w-5 h-5 text-[#005A8D]"></i>
              <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#005A8D] transition-colors"></i>
            </div>
            <div>
              <div class="font-display font-bold text-sm text-[#102A43] group-hover:text-[#005A8D] transition-colors">
                <?= e($svc['title']) ?>
              </div>
              <div class="text-xs text-[#52606D] mt-1 leading-snug">
                <?= e($svc['short']) ?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- MITRA PEMBAYARAN & KERJASAMA (Smooth Right-to-Left Marquee) -->
  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>

  <!-- EDITORIAL SPLIT 1: LAYANAN PELANGGAN & PENANGANAN LAPANGAN -->
  <section class="py-16 lg:py-22 bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
        <div class="lg:col-span-7 reveal">
          <div class="overflow-hidden rounded-md bg-[#EFEFE9] aspect-[16/10]">
            <img
              src="assets/images/service-field.jpg"
              alt="Petugas lapangan memeriksa instalasi meter dan distribusi air Perumda Tirta Sukapura"
              loading="lazy"
              class="w-full h-full object-cover"
            />
          </div>
        </div>

        <div class="lg:col-span-5 space-y-5 reveal reveal-delay-1">
          <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#102A43] leading-tight">
            Urus Tagihan, Sambungan Baru, dan Pengaduan Tanpa Perlu Antre.
          </h2>
          <p class="text-sm sm:text-base text-[#52606D] leading-relaxed">
            Pelanggan bisa mendaftar sambungan baru lewat SIMPEL, mengirim foto stand meter tiap bulan, dan memantau progres tiket perbaikan pipa langsung dari ponsel.
          </p>

          <ul class="pt-2 divide-y divide-[#DCE1E5] border-y border-[#DCE1E5] text-sm">
            <li class="py-3 flex items-center justify-between">
              <span class="font-semibold text-[#102A43]">Cek &amp; bayar tagihan bulanan</span>
              <a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-[#005A8D] font-bold hover:underline">Buka</a>
            </li>
            <li class="py-3 flex items-center justify-between">
              <span class="font-semibold text-[#102A43]">Prosedur pasang baru &amp; balik nama</span>
              <a href="layanan.php#prosedur" class="text-[#005A8D] font-bold hover:underline">Lihat alur</a>
            </li>
            <li class="py-3 flex items-center justify-between">
              <span class="font-semibold text-[#102A43]">Tarif air 2025 &amp; simulasi tagihan</span>
              <a href="tarif.php" class="text-[#005A8D] font-bold hover:underline">Buka tarif</a>
            </li>
          </ul>

          <div class="pt-2">
            <a
              href="layanan.php"
              class="inline-flex items-center gap-2 px-5 py-2.5 rounded-md bg-[#102A43] hover:bg-[#005A8D] text-white text-sm font-bold transition-colors"
            >
              <span>Buka Halaman Layanan</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- EDITORIAL SPLIT 2: SUMBER AIR & DATA INFRASTRUKTUR NYATA -->
  <section class="py-16 lg:py-22 bg-[#F7F7F5] border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
        <div class="lg:col-span-5 space-y-6 order-2 lg:order-1 reveal">
          <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#102A43] leading-tight">
            Dikelola dari Mata Air Pegunungan Tasikmalaya Sejak 1925.
          </h2>
          <p class="text-sm sm:text-base text-[#52606D] leading-relaxed">
            Pasokan utama berasal dari Mata Air Cipondok di Kecamatan Leuwisari (367 L/detik) dan enam mata air lainnya, ditambah dua instalasi pengolahan air di Sungai Ciwulan dan Cilangla.
          </p>

          <!-- Clean Architectural Data Grid -->
          <div class="grid grid-cols-2 gap-x-6 gap-y-5 pt-2 border-t border-[#DCE1E5] tabular-nums">
            <div>
              <div class="font-display text-2xl font-extrabold text-[#102A43]">513 L/dtk</div>
              <div class="text-xs text-[#52606D] mt-0.5">Kapasitas produksi terpasang</div>
            </div>
            <div>
              <div class="font-display text-2xl font-extrabold text-[#1E6F5C]">473 L/dtk</div>
              <div class="text-xs text-[#52606D] mt-0.5">Debit dari 7 mata air alami</div>
            </div>
            <div>
              <div class="font-display text-2xl font-extrabold text-[#102A43]">17 Lokasi</div>
              <div class="text-xs text-[#52606D] mt-0.5">Cabang &amp; unit pelayanan</div>
            </div>
            <div>
              <div class="font-display text-2xl font-extrabold text-[#005A8D]">9,49%</div>
              <div class="text-xs text-[#52606D] mt-0.5">Cakupan layanan gabungan</div>
            </div>
          </div>

          <div class="pt-1 flex flex-wrap gap-5">
            <a
              href="air-minum.php"
              class="inline-flex items-center gap-2 text-sm font-bold text-[#005A8D] hover:text-[#102A43] transition-colors"
            >
              <span>Data Sumber Air &amp; Distribusi</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <a
              href="profil.php"
              class="inline-flex items-center gap-2 text-sm font-bold text-[#102A43] hover:text-[#005A8D] transition-colors"
            >
              <span>Profil &amp; Struktur Organisasi</span>
            </a>
          </div>
        </div>

        <div class="lg:col-span-7 order-1 lg:order-2 reveal reveal-delay-1">
          <div class="overflow-hidden rounded-md bg-[#EFEFE9] aspect-[16/10]">
            <img
              src="assets/images/spring-source.jpg"
              alt="Aliran mata air pegunungan jernih di Kabupaten Tasikmalaya"
              loading="lazy"
              class="w-full h-full object-cover"
            />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- RUANG BERITA & PANDUAN (Newspaper Editorial Grid — Bukan Kartu AI Seragam) -->
  <section class="py-16 lg:py-22 bg-white border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-4 pb-6 border-b-2 border-[#102A43] mb-10 reveal">
        <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#102A43]">
          Berita, Gangguan Aliran &amp; Panduan Pelanggan
        </h2>
        <a href="berita.php" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#005A8D] hover:underline">
          <span>Lihat semua berita</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

      <div class="grid lg:grid-cols-12 gap-10">
        <!-- Lead Article (7 cols) -->
        <article class="lg:col-span-7 reveal">
          <a href="berita-detail.php?slug=<?= urlencode($leadNews['slug']) ?>" class="group block">
            <div class="aspect-[16/10] rounded-md overflow-hidden bg-[#EFEFE9]">
              <img
                src="<?= e($leadNews['image']) ?>"
                alt="<?= e($leadNews['title']) ?>"
                loading="lazy"
                class="w-full h-full object-cover img-scale"
                onerror="this.src='<?= e($leadNews['fallback_img']) ?>'"
              />
            </div>
            <div class="mt-4 flex items-center gap-2.5 text-xs font-semibold">
              <span class="text-[#005A8D]"><?= e($leadNews['category']) ?></span>
              <span class="text-slate-300">|</span>
              <span class="text-[#52606D]"><?= e($leadNews['date_display']) ?></span>
            </div>
            <h3 class="font-display text-2xl sm:text-[1.65rem] font-extrabold text-[#102A43] group-hover:text-[#005A8D] transition-colors mt-2 leading-snug">
              <?= e($leadNews['title']) ?>
            </h3>
            <p class="text-sm sm:text-base text-[#52606D] mt-2.5 leading-relaxed">
              <?= e($leadNews['excerpt']) ?>
            </p>
          </a>
        </article>

        <!-- Stacked Newsroom List (5 cols) -->
        <div class="lg:col-span-5 divide-y divide-[#DCE1E5] border-t lg:border-t-0 border-[#DCE1E5] reveal reveal-delay-1">
          <?php foreach ($sideNews as $item): ?>
            <article class="py-5 first:pt-0">
              <a href="berita-detail.php?slug=<?= urlencode($item['slug']) ?>" class="group block space-y-1.5">
                <div class="flex items-center gap-2 text-xs font-semibold">
                  <span class="<?= $item['category'] === 'Info Gangguan' ? 'text-amber-700' : 'text-[#005A8D]' ?>">
                    <?= e($item['category']) ?>
                  </span>
                  <span class="text-slate-300">|</span>
                  <span class="text-[#52606D] font-normal"><?= e($item['date_display']) ?></span>
                </div>
                <h3 class="font-display font-bold text-base sm:text-lg text-[#102A43] group-hover:text-[#005A8D] transition-colors leading-snug">
                  <?= e($item['title']) ?>
                </h3>
                <p class="text-xs sm:text-sm text-[#52606D] line-clamp-2 leading-relaxed">
                  <?= e($item['excerpt']) ?>
                </p>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- PERTANYAAN UMUM (AEO) & KONTAK CEPAT -->
  <section class="py-16 lg:py-20 bg-[#F7F7F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-7 reveal">
          <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">
            Pertanyaan yang Sering Ditanyakan
          </h2>
          <div class="divide-y divide-[#DCE1E5] border-y border-[#DCE1E5] bg-white px-5 rounded-md">
            <?php foreach (array_slice($faqs, 0, 4) as $i => $faq): ?>
              <div class="faq-item py-4" data-open="<?= $i === 0 ? 'true' : 'false' ?>">
                <button type="button" data-faq-toggle class="w-full flex items-center justify-between gap-4 text-left cursor-pointer">
                  <span class="font-display font-bold text-sm sm:text-base text-[#102A43]"><?= e($faq['q']) ?></span>
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

        <div class="lg:col-span-5 reveal reveal-delay-1">
          <div class="bg-white border border-[#DCE1E5] rounded-md p-6 sm:p-7 space-y-5">
            <h2 class="font-display text-xl font-extrabold text-[#102A43]">
              Kantor Pusat &amp; Pengaduan
            </h2>
            <dl class="space-y-3.5 text-sm">
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Alamat</dt>
                <dd class="text-[#1C242B] mt-0.5"><?= e($officeInfo['address']) ?></dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Call Center / WhatsApp 24 Jam</dt>
                <dd class="mt-0.5">
                  <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="font-bold text-base text-[#005A8D] hover:underline tabular-nums">
                    <?= e($officeInfo['phone']) ?>
                  </a>
                </dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Jam Loket Kantor</dt>
                <dd class="text-[#1C242B] mt-0.5"><?= e($officeInfo['hours_weekday']) ?></dd>
              </div>
            </dl>
            <div class="pt-3 border-t border-[#DCE1E5] flex flex-wrap gap-3">
              <a
                href="kontak.php"
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold transition-colors"
              >
                <span>Kirim Pesan &amp; Lihat 17 Cabang</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
