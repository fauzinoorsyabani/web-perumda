<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'layanan';
$pageTitle = 'Layanan & 5 Prosedur Pelanggan Resmi | ' . $officeInfo['name'];
$pageDescription = 'Akses 6 layanan digital pelanggan serta 5 prosedur resmi Perumda Tirta Sukapura: Sambungan Baru, Bukaan Kembali, Penutupan Sambungan, Pembayaran Rekening, dan Balik Nama.';
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
        ['name' => 'Pelanggan & Prosedur', 'url' => '/layanan.php'],
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
        <span class="text-white font-semibold">Pelanggan</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
        Layanan Online &amp; 5 Prosedur Pelanggan
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Tautan portal pelanggan 24 jam beserta poster alur resmi sambungan baru, bukaan kembali, penutupan, pembayaran rekening, dan balik nama.
      </p>
      <div class="mt-6 flex flex-wrap gap-2 text-xs font-semibold">
        <a href="#portal" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">Layanan Online</a>
        <?php foreach ($officialProcedures as $proc): ?>
          <a href="#<?= e($proc['id']) ?>" class="px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 text-slate-200">
            <?= e(str_replace('Prosedur ', '', $proc['title'])) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 6 Layanan Online -->
  <section id="portal" class="py-14 bg-white border-b border-[#DCE1E5] scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 pb-5 border-b border-[#DCE1E5]">
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">Portal Layanan Online</h2>
        <a href="tarif.php" class="text-sm font-bold text-[#005A8D] hover:underline">Lihat Tarif Air 2025 &amp; Simulasi →</a>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 divide-y md:divide-y-0 md:gap-x-10">
        <?php foreach ($digitalServices as $svc): ?>
          <div class="py-7 border-b border-[#DCE1E5] flex flex-col justify-between gap-4">
            <div>
              <div class="flex items-center gap-2.5 mb-2">
                <i data-lucide="<?= e($svc['icon']) ?>" class="w-5 h-5 text-[#005A8D]"></i>
                <h3 class="font-display text-lg font-bold text-[#102A43]"><?= e($svc['title']) ?></h3>
              </div>
              <p class="text-sm text-[#52606D] leading-relaxed"><?= e($svc['description']) ?></p>
            </div>
            <div>
              <a href="<?= e($svc['href']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#005A8D] hover:text-[#102A43]">
                <span><?= e($svc['cta']) ?></span>
                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 5 PROSEDUR PELANGGAN RESMI DENGAN INFOGRAFIS ASLI -->
  <section id="prosedur" class="py-14 bg-[#F7F7F5] border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
      <div>
        <h2 class="font-display text-2xl font-extrabold text-[#102A43]">5 Prosedur Pelayanan Resmi</h2>
        <p class="text-sm text-[#52606D] mt-1">Klik gambar prosedur untuk memperbesar dan membaca rincian syarat lengkap.</p>
      </div>

      <div class="space-y-8">
        <?php foreach ($officialProcedures as $idx => $proc): ?>
          <div id="<?= e($proc['id']) ?>" class="bg-white border border-[#DCE1E5] rounded-md p-6 grid lg:grid-cols-12 gap-8 items-center scroll-mt-24">
            <div class="lg:col-span-5 space-y-4">
              <div class="text-xs font-bold text-[#005A8D] tabular-nums">PROSEDUR 0<?= $idx + 1 ?></div>
              <h3 class="font-display text-2xl font-extrabold text-[#102A43]"><?= e($proc['title']) ?></h3>
              <p class="text-sm text-[#52606D] leading-relaxed"><?= e($proc['summary']) ?></p>
              <div class="pt-2 flex flex-wrap items-center gap-3">
                <a
                  href="<?= e($proc['cta_url']) ?>"
                  <?= str_starts_with($proc['cta_url'], 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                  class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-xs font-bold"
                >
                  <span><?= e($proc['cta']) ?></span>
                  <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
                <button
                  type="button"
                  data-lightbox="<?= e($proc['image']) ?>"
                  data-caption="<?= e($proc['title']) ?> — Perumda Air Minum Tirta Sukapura"
                  class="px-4 py-2.5 rounded-md bg-[#EFEFE9] hover:bg-[#DCE1E5] text-[#102A43] text-xs font-bold cursor-pointer"
                >
                  Perbesar Infografis
                </button>
              </div>
            </div>
            <div class="lg:col-span-7">
              <button
                type="button"
                data-lightbox="<?= e($proc['image']) ?>"
                data-caption="<?= e($proc['title']) ?> — Perumda Air Minum Tirta Sukapura"
                class="block w-full rounded-md overflow-hidden border border-[#DCE1E5] bg-[#F7F7F5] cursor-pointer"
              >
                <img src="<?= e($proc['image']) ?>" alt="<?= e($proc['title']) ?>" loading="lazy" class="w-full h-auto max-h-[420px] object-contain mx-auto" />
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>

  <!-- FAQ Lengkap -->
  <section class="py-14 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-display text-2xl font-extrabold text-[#102A43] mb-6">Pertanyaan Umum Pelanggan</h2>
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
