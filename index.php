<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$activePage = 'beranda';
$pageTitle = 'Perumda Air Minum Tirta Sukapura — Portal Resmi Air Minum Kabupaten Tasikmalaya';
$pageDescription = 'Portal resmi Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Cek tagihan air online, daftar pelanggan baru SIMPEL, lapor gangguan 24 jam, profil perusahaan, dan berita terkini.';
$canonicalPath = '/';
$extraSchemas = [
    buildFaqSchema(array_slice($faqs, 0, 4)),
];

require_once __DIR__ . '/includes/header.php';

$featuredServices = array_values(array_filter($digitalServices, fn($s) => !empty($s['featured'])));
$secondaryServices = array_values(array_filter($digitalServices, fn($s) => empty($s['featured'])));
$leadNews = $newsItems[0];
$sideNews = array_slice($newsItems, 1, 3);
?>

<main class="flex-1">
  <!-- HERO SECTION -->
  <section class="bg-[#0B2545] text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-22">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <!-- Editorial Copy -->
        <div class="lg:col-span-6 space-y-6 reveal">
          <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 text-sky-200 text-xs font-semibold">
            <span class="relative inline-flex w-2 h-2 rounded-full bg-emerald-400 text-emerald-400 pulse-dot"></span>
            <span>BUMD Resmi Pemerintah Kabupaten Tasikmalaya</span>
          </div>

          <h1 class="font-display text-4xl sm:text-5xl lg:text-[3.35rem] font-extrabold leading-[1.08] tracking-tight">
            Air Minum <span class="text-sky-300">Jernih &amp; Andal</span>, Layanan Digital Lebih Cepat.
          </h1>

          <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-xl">
            Melayani masyarakat Tasikmalaya sejak <strong class="text-white font-bold">1925</strong>
            dengan kapasitas terpasang <strong class="text-white font-bold">513 Liter/detik</strong>.
            Cek tagihan, lapor gangguan, dan daftar sambungan baru langsung dari ponsel Anda.
          </p>

          <div class="flex flex-wrap items-center gap-3.5 pt-2">
            <a
              href="<?= e($officeInfo['bill_url']) ?>"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-xl bg-[#0284C7] hover:bg-sky-500 text-white font-bold text-sm sm:text-base transition-all hover:-translate-y-0.5"
            >
              <span>Cek Tagihan Air</span>
              <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
            </a>

            <a
              href="layanan.php"
              class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 border border-white/15 text-white font-semibold text-sm sm:text-base transition-colors"
            >
              <span>Jelajahi Semua Layanan</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
          </div>
        </div>

        <!-- Visual Hero Composition -->
        <div class="lg:col-span-6 reveal reveal-delay-2">
          <div class="relative">
            <div class="rounded-2xl overflow-hidden bg-[#13355E] aspect-[16/10] shadow-2xl border border-white/10">
              <img
                src="assets/images/hero-water.jpg"
                alt="Instalasi Pengolahan Air Bersih Perumda Air Minum Tirta Sukapura Tasikmalaya"
                fetchpriority="high"
                class="w-full h-full object-cover"
              />
            </div>

            <!-- Floating Real Operational Info Badge -->
            <div class="mt-4 sm:mt-0 sm:absolute sm:-bottom-5 sm:left-5 sm:right-5 bg-white text-slate-900 rounded-xl p-4 shadow-xl border border-slate-200 flex flex-wrap items-center justify-between gap-4">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-[#E0F2FE] text-[#026AA2] flex items-center justify-center shrink-0">
                  <i data-lucide="droplets" class="w-5 h-5"></i>
                </div>
                <div class="leading-tight">
                  <div class="text-xs font-semibold text-slate-500">Sumber Mata Air Alami</div>
                  <div class="font-display font-bold text-sm text-[#0B2545]">
                    <strong>9 Sumber Utama</strong> • Uji Mutu Berkala
                  </div>
                </div>
              </div>
              <a
                href="profil.php#infrastruktur"
                class="inline-flex items-center gap-1.5 text-xs font-bold text-[#026AA2] hover:text-[#0B2545] transition-colors"
              >
                <span>Lihat Kapasitas</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Animated Key Metrics Bar -->
      <div class="mt-16 sm:mt-20 pt-8 border-t border-white/15 grid grid-cols-2 md:grid-cols-4 gap-6 reveal">
        <?php foreach ($heroStats as $stat): ?>
          <div>
            <div class="font-display text-3xl sm:text-4xl font-extrabold text-white tabular-nums">
              <span data-counter="<?= (int) $stat['value'] ?>"><?= (int) $stat['value'] ?></span><?= e($stat['suffix']) ?>
            </div>
            <div class="text-xs sm:text-sm text-slate-300 mt-1 font-medium">
              <?= e($stat['label']) ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- RIGHT-TO-LEFT SCROLLING PARTNER MARQUEE -->
  <?php require __DIR__ . '/includes/partner-marquee.php'; ?>

  <!-- VISUAL QUICK ACCESS LAYANAN -->
  <section class="py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 reveal">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">
            Akses Cepat Pelanggan
          </p>
          <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-[#0B2545] mt-1.5">
            Layanan Digital <span class="text-[#026AA2]">Tanpa Antre</span>
          </h2>
        </div>
        <a
          href="layanan.php"
          class="inline-flex items-center gap-2 text-sm font-bold text-[#026AA2] hover:text-[#0B2545] transition-colors"
        >
          <span>Lihat Semua Layanan &amp; Tarif</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

      <!-- 3 Featured Visual Service Cards -->
      <div class="grid md:grid-cols-3 gap-6">
        <?php foreach ($featuredServices as $idx => $svc): ?>
          <a
            href="<?= e($svc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="group elevated-card rounded-2xl overflow-hidden flex flex-col reveal reveal-delay-<?= $idx + 1 ?>"
          >
            <div class="aspect-[16/9] bg-slate-200 overflow-hidden relative">
              <img
                src="<?= e($svc['image']) ?>"
                alt="<?= e($svc['title']) ?>"
                loading="lazy"
                class="w-full h-full object-cover img-zoom"
              />
              <div class="absolute top-3 left-3 w-10 h-10 rounded-xl bg-white/95 text-[#026AA2] flex items-center justify-center shadow-sm">
                <i data-lucide="<?= e($svc['icon']) ?>" class="w-5 h-5"></i>
              </div>
            </div>
            <div class="p-6 flex-1 flex flex-col justify-between">
              <div>
                <h3 class="font-display text-xl font-bold text-[#0B2545] group-hover:text-[#026AA2] transition-colors">
                  <?= e($svc['title']) ?>
                </h3>
                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                  <?= e($svc['short']) ?>
                </p>
              </div>
              <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-[#026AA2]">
                <span><?= e($svc['cta']) ?></span>
                <i data-lucide="arrow-up-right" class="w-4 h-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- 3 Compact Secondary Service Shortcuts -->
      <div class="mt-6 grid sm:grid-cols-3 gap-4 reveal">
        <?php foreach ($secondaryServices as $svc): ?>
          <a
            href="<?= e($svc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="group elevated-card rounded-xl p-5 flex items-center justify-between gap-4"
          >
            <div class="flex items-center gap-3.5 min-w-0">
              <div class="w-10 h-10 rounded-lg bg-[#EFF4F8] text-[#026AA2] group-hover:bg-[#026AA2] group-hover:text-white flex items-center justify-center shrink-0 transition-colors">
                <i data-lucide="<?= e($svc['icon']) ?>" class="w-5 h-5"></i>
              </div>
              <div class="min-w-0">
                <div class="font-display font-bold text-sm text-[#0B2545] truncate">
                  <?= e($svc['title']) ?>
                </div>
                <div class="text-xs text-slate-500 truncate mt-0.5">
                  <?= e($svc['short']) ?>
                </div>
              </div>
            </div>
            <i data-lucide="arrow-up-right" class="w-4 h-4 text-slate-400 group-hover:text-[#026AA2] shrink-0"></i>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SEKILAS PROFIL & INFRASTRUKTUR (Editorial Asymmetric) -->
  <section class="py-20 bg-white border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-6 reveal">
          <div class="rounded-2xl overflow-hidden aspect-[16/10] bg-slate-200 shadow-lg">
            <img
              src="assets/images/spring-source.jpg"
              alt="Sumber Mata Air Alami Pegunungan Tasikmalaya"
              loading="lazy"
              class="w-full h-full object-cover"
            />
          </div>
        </div>

        <div class="lg:col-span-6 space-y-6 reveal reveal-delay-2">
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">
            Tentang Tirta Sukapura
          </p>
          <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-[#0B2545] leading-tight">
            Dari <strong>Mata Air Pegunungan</strong> Langsung ke Rumah Anda
          </h2>
          <p class="text-slate-600 text-base leading-relaxed">
            Mengelola <strong>7 gugus mata air alami (473 L/dtk)</strong> termasuk Mata Air Cipondok
            Leuwisari serta <strong>2 instalasi pengolahan air permukaan (40 L/dtk)</strong>, kami
            berkomitmen menjaga kualitas, tekanan, dan keberlanjutan suplai air minum di Tasikmalaya.
          </p>

          <div class="grid grid-cols-2 gap-6 pt-2">
            <div class="border-l-2 border-[#026AA2] pl-4">
              <div class="font-display text-2xl font-extrabold text-[#0B2545]">473 L/dtk</div>
              <div class="text-xs text-slate-500 mt-0.5 font-medium">Sumber Mata Air Alami</div>
            </div>
            <div class="border-l-2 border-[#0D9488] pl-4">
              <div class="font-display text-2xl font-extrabold text-[#0B2545]">17 Lokasi</div>
              <div class="text-xs text-slate-500 mt-0.5 font-medium">Cabang &amp; Unit Pelayanan</div>
            </div>
          </div>

          <div class="pt-2 flex flex-wrap gap-3">
            <a
              href="profil.php"
              class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-[#0B2545] hover:bg-[#026AA2] text-white text-sm font-bold transition-colors"
            >
              <span>Baca Profil &amp; Sejarah</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <a
              href="kontak.php#cabang"
              class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-[#EFF4F8] hover:bg-slate-200 text-[#0B2545] text-sm font-bold transition-colors"
            >
              <span>Daftar 17 Cabang</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BERITA & EDUKASI TERKINI (Links to berita-detail.php & berita.php) -->
  <section class="py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 reveal">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">
            Berita &amp; Edukasi
          </p>
          <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-[#0B2545] mt-1.5">
            Informasi Gangguan &amp; <strong>Panduan Pelanggan</strong>
          </h2>
        </div>
        <a
          href="berita.php"
          class="inline-flex items-center gap-2 text-sm font-bold text-[#026AA2] hover:text-[#0B2545] transition-colors"
        >
          <span>Semua Berita &amp; Artikel</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

      <div class="grid lg:grid-cols-12 gap-7">
        <!-- Lead Story -->
        <article class="lg:col-span-6 reveal">
          <a
            href="berita-detail.php?slug=<?= urlencode($leadNews['slug']) ?>"
            class="group elevated-card rounded-2xl overflow-hidden flex flex-col h-full"
          >
            <div class="aspect-[16/10] bg-slate-200 overflow-hidden relative">
              <img
                src="<?= e($leadNews['image']) ?>"
                alt="<?= e($leadNews['title']) ?>"
                loading="lazy"
                class="w-full h-full object-cover img-zoom"
                onerror="this.src='<?= e($leadNews['fallback_img']) ?>'"
              />
              <span class="absolute top-4 left-4 px-3 py-1 rounded-lg bg-[#0B2545] text-white text-xs font-bold">
                <?= e($leadNews['category']) ?>
              </span>
            </div>
            <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
              <div>
                <div class="text-xs font-medium text-slate-500 mb-2">
                  <?= e($leadNews['date_display']) ?> • <?= e($leadNews['read_time']) ?>
                </div>
                <h3 class="font-display text-xl sm:text-2xl font-extrabold text-[#0B2545] group-hover:text-[#026AA2] transition-colors leading-snug">
                  <?= e($leadNews['title']) ?>
                </h3>
                <p class="text-sm text-slate-600 mt-3 leading-relaxed">
                  <?= e($leadNews['excerpt']) ?>
                </p>
              </div>
              <div class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#026AA2]">
                <span>Baca Artikel Lengkap</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
              </div>
            </div>
          </a>
        </article>

        <!-- Side Useful Stories -->
        <div class="lg:col-span-6 flex flex-col gap-5">
          <?php foreach ($sideNews as $idx => $item): ?>
            <article class="reveal reveal-delay-<?= $idx + 1 ?>">
              <a
                href="berita-detail.php?slug=<?= urlencode($item['slug']) ?>"
                class="group elevated-card rounded-2xl p-4 flex flex-col sm:flex-row gap-4 items-center"
              >
                <div class="w-full sm:w-40 aspect-[16/10] sm:aspect-[4/3] rounded-xl overflow-hidden bg-slate-200 shrink-0">
                  <img
                    src="<?= e($item['image']) ?>"
                    alt="<?= e($item['title']) ?>"
                    loading="lazy"
                    class="w-full h-full object-cover img-zoom"
                    onerror="this.src='<?= e($item['fallback_img']) ?>'"
                  />
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-2 text-xs font-bold text-[#026AA2] mb-1">
                    <span><?= e($item['category']) ?></span>
                    <span class="text-slate-300">•</span>
                    <span class="font-medium text-slate-500"><?= e($item['read_time']) ?></span>
                  </div>
                  <h3 class="font-display font-bold text-base text-[#0B2545] group-hover:text-[#026AA2] transition-colors leading-snug line-clamp-2">
                    <?= e($item['title']) ?>
                  </h3>
                  <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                    <?= e($item['excerpt']) ?>
                  </p>
                </div>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- AEO FAQ RINGKAS & CTA KONTAK -->
  <section class="py-20 bg-white border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-12 items-start">
        <!-- Quick Answers (AEO-optimized) -->
        <div class="lg:col-span-7 space-y-6 reveal">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">
              Pertanyaan Umum
            </p>
            <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
              Jawaban Cepat Untuk Pelanggan
            </h2>
          </div>

          <div class="divide-y divide-slate-200 border-y border-slate-200">
            <?php foreach (array_slice($faqs, 0, 4) as $i => $faq): ?>
              <div class="faq-item py-4" data-open="<?= $i === 0 ? 'true' : 'false' ?>">
                <button
                  type="button"
                  data-faq-toggle
                  class="w-full flex items-center justify-between gap-4 text-left cursor-pointer"
                >
                  <span class="font-display font-bold text-sm sm:text-base text-[#0B2545]">
                    <?= e($faq['q']) ?>
                  </span>
                  <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-[#026AA2] shrink-0 transition-transform duration-300"></i>
                </button>
                <div class="faq-content">
                  <div class="faq-inner">
                    <p class="pt-3 text-sm text-slate-600 leading-relaxed">
                      <?= e($faq['a']) ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Clean Contact CTA Card -->
        <div class="lg:col-span-5 reveal reveal-delay-2">
          <div class="rounded-2xl bg-[#0B2545] text-white p-7 sm:p-8 space-y-5">
            <div class="w-11 h-11 rounded-xl bg-white/10 text-sky-300 flex items-center justify-center">
              <i data-lucide="headphones" class="w-5 h-5"></i>
            </div>
            <h3 class="font-display text-2xl font-extrabold leading-snug">
              Butuh Bantuan Teknis atau Informasi Sambungan?
            </h3>
            <p class="text-sm text-slate-300 leading-relaxed">
              Tim layanan pelanggan kami siap membantu melalui <strong>Call Center 24 Jam</strong>,
              pengaduan online, maupun 17 kantor cabang di seluruh Tasikmalaya.
            </p>
            <div class="pt-2 space-y-3">
              <a
                href="tel:<?= e($officeInfo['phone_clean']) ?>"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#0284C7] hover:bg-sky-500 text-white font-bold text-sm transition-colors"
              >
                <i data-lucide="phone-call" class="w-4 h-4"></i>
                <span>Hubungi <?= e($officeInfo['phone']) ?></span>
              </a>
              <a
                href="kontak.php"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white/10 hover:bg-white/15 text-white font-semibold text-sm transition-colors"
              >
                <span>Buka Halaman Kontak &amp; Peta Cabang</span>
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
