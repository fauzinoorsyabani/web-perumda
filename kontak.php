<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'kontak';
$pageTitle = 'Kontak Kami, Call Center & 17 Kantor Cabang — ' . $officeInfo['name'];
$pageDescription = 'Alamat Kantor Pusat Perumda Air Minum Tirta Sukapura Jl. Jend. A.H. Nasution Km. 8 Tasikmalaya, Call Center 24 jam +62 821-2910-2345, formulir bantuan, dan direktori 17 cabang pelayanan.';
$canonicalPath = '/kontak.php';
$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Kontak & Cabang', 'url' => '/kontak.php'],
    ], $baseUrl),
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
        <span class="text-sky-300 font-semibold">Kontak &amp; Cabang</span>
      </nav>
      <div class="max-w-3xl">
        <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight">
          Hubungi Kami &amp; <strong>Direktori 17 Cabang</strong>
        </h1>
        <p class="text-slate-300 mt-3 text-base sm:text-lg leading-relaxed">
          Kantor Pusat, Call Center 24 Jam, formulir pertanyaan pelanggan, serta alamat resmi
          seluruh cabang dan unit pelayanan di Kabupaten &amp; Kota Tasikmalaya.
        </p>
      </div>
    </div>
  </section>

  <!-- Main Contact & Form Grid -->
  <section class="py-16 lg:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <!-- Left: Kantor Pusat Info + Map -->
        <div class="lg:col-span-5 space-y-6 reveal">
          <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-7 space-y-5">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-[#026AA2]">Kantor Pusat</span>
              <h2 class="font-display text-xl font-extrabold text-[#0B2545] mt-1">
                <?= e($officeInfo['name']) ?>
              </h2>
            </div>

            <div class="space-y-4 text-sm">
              <div class="flex items-start gap-3">
                <i data-lucide="map-pin" class="w-4 h-4 text-[#026AA2] shrink-0 mt-1"></i>
                <div>
                  <div class="font-bold text-[#0B2545]">Alamat Resmi</div>
                  <div class="text-slate-600 mt-0.5"><?= e($officeInfo['address']) ?></div>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <i data-lucide="phone-call" class="w-4 h-4 text-[#026AA2] shrink-0 mt-1"></i>
                <div>
                  <div class="font-bold text-[#0B2545]">Call Center &amp; Telepon</div>
                  <div class="mt-0.5">
                    <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="font-bold text-[#026AA2] hover:underline">
                      <?= e($officeInfo['phone']) ?>
                    </a>
                    <span class="text-xs text-slate-500"> (WhatsApp / Hotline)</span>
                  </div>
                  <div class="text-slate-600 text-xs mt-0.5">Kantor: <?= e($officeInfo['office_phone']) ?></div>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <i data-lucide="mail" class="w-4 h-4 text-[#026AA2] shrink-0 mt-1"></i>
                <div>
                  <div class="font-bold text-[#0B2545]">Email Resmi</div>
                  <div class="text-slate-600 mt-0.5"><?= e($officeInfo['email']) ?></div>
                  <div class="text-slate-500 text-xs"><?= e($officeInfo['email_alt']) ?></div>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <i data-lucide="clock" class="w-4 h-4 text-[#026AA2] shrink-0 mt-1"></i>
                <div>
                  <div class="font-bold text-[#0B2545]">Jam Kerja Loket</div>
                  <div class="text-slate-600 mt-0.5"><?= e($officeInfo['hours_weekday']) ?></div>
                  <div class="text-slate-500 text-xs"><?= e($officeInfo['hours_weekend']) ?></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Google Maps Embed -->
          <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-200 aspect-[16/10]">
            <iframe
              title="Peta Lokasi Kantor Pusat Perumda Air Minum Tirta Sukapura"
              src="<?= e($officeInfo['maps_embed']) ?>"
              class="w-full h-full border-0"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>

        <!-- Right: Interactive Contact Form -->
        <div class="lg:col-span-7 reveal reveal-delay-2">
          <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8">
            <span class="text-xs font-bold uppercase tracking-wider text-[#026AA2]">Formulir Bantuan</span>
            <h2 class="font-display text-2xl font-extrabold text-[#0B2545] mt-1">
              Kirim Pertanyaan, Saran, atau Keluhan
            </h2>
            <p class="text-sm text-slate-600 mt-2">
              Isi formulir di bawah ini untuk langsung terhubung ke tim Call Center WhatsApp resmi kami.
            </p>

            <form id="contact-form" data-wa-phone="<?= e($officeInfo['phone_clean']) ?>" class="mt-6 space-y-4">
              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="cf-name" class="block text-xs font-bold text-[#0B2545] mb-1.5">Nama Lengkap *</label>
                  <input id="cf-name" type="text" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-[#026AA2]" />
                </div>
                <div>
                  <label for="cf-nosam" class="block text-xs font-bold text-[#0B2545] mb-1.5">No. Sambungan (Opsional)</label>
                  <input id="cf-nosam" type="text" placeholder="Contoh: 01023456" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-[#026AA2]" />
                </div>
              </div>

              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="cf-topic" class="block text-xs font-bold text-[#0B2545] mb-1.5">Kategori Keperluan *</label>
                  <select id="cf-topic" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:outline-none focus:border-[#026AA2]">
                    <option value="Informasi Tagihan">Informasi Tagihan Air</option>
                    <option value="Gangguan Aliran / Pipa Bocor">Gangguan Aliran / Pipa Bocor</option>
                    <option value="Pendaftaran Sambungan Baru">Pendaftaran Sambungan Baru</option>
                    <option value="Balik Nama / Bukaan Kembali">Balik Nama / Bukaan Kembali</option>
                    <option value="Kritik & Saran">Kritik &amp; Saran</option>
                  </select>
                </div>
                <div>
                  <label for="cf-area" class="block text-xs font-bold text-[#0B2545] mb-1.5">Wilayah / Kecamatan *</label>
                  <input id="cf-area" type="text" required placeholder="Contoh: Singaparna / Tawang" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-[#026AA2]" />
                </div>
              </div>

              <div>
                <label for="cf-message" class="block text-xs font-bold text-[#0B2545] mb-1.5">Pesan Lengkap *</label>
                <textarea id="cf-message" rows="4" required placeholder="Tuliskan detail pertanyaan atau kondisi aliran di lokasi Anda..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-[#026AA2]"></textarea>
              </div>

              <div id="contact-feedback" class="hidden rounded-xl bg-emerald-50 border border-emerald-200 p-3.5 text-sm text-emerald-800 font-medium"></div>

              <div class="flex flex-wrap items-center gap-3 pt-2">
                <button
                  type="submit"
                  class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#026AA2] hover:bg-[#0B2545] text-white font-bold text-sm transition-colors cursor-pointer"
                >
                  <i data-lucide="send" class="w-4 h-4"></i>
                  <span>Kirim via WhatsApp Call Center</span>
                </button>
                <a
                  href="<?= e($officeInfo['complaint_url']) ?>"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="inline-flex items-center gap-1.5 px-4 py-3 rounded-xl bg-[#EFF4F8] hover:bg-slate-200 text-[#0B2545] font-bold text-sm transition-colors"
                >
                  <span>Buat Tiket Pengaduan Resmi</span>
                  <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Direktori 17 Cabang & Unit Pelayanan -->
  <section id="cabang" class="py-16 lg:py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 border-b border-slate-200 mb-8 reveal">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">Jaringan Pelayanan</p>
          <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#0B2545] mt-1">
            Direktori <strong>17 Cabang &amp; Unit</strong> Resmi
          </h2>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <?php foreach (['Semua', 'Kota Tasikmalaya', 'Kab. Tasikmalaya'] as $area): ?>
            <button
              type="button"
              data-branch-filter="<?= e($area) ?>"
              class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors cursor-pointer <?= $area === 'Semua' ? 'bg-[#0B2545] text-white' : 'bg-[#EFF4F8] text-slate-700 hover:bg-slate-200' ?>"
            >
              <?= e($area) ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($branches as $branch): ?>
          <div
            data-branch-card
            data-area="<?= e($branch['area']) ?>"
            class="elevated-card rounded-xl p-5 flex flex-col justify-between gap-3"
          >
            <div>
              <div class="flex items-center justify-between gap-2 mb-2">
                <h3 class="font-display font-bold text-base text-[#0B2545]"><?= e($branch['name']) ?></h3>
                <span class="px-2 py-0.5 rounded bg-[#E0F2FE] text-[#026AA2] text-[10px] font-bold shrink-0">
                  <?= e($branch['area']) ?>
                </span>
              </div>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed"><?= e($branch['address']) ?></p>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center gap-2 text-xs font-bold text-[#026AA2]">
              <i data-lucide="phone" class="w-3.5 h-3.5"></i>
              <span><?= e($branch['phone']) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
