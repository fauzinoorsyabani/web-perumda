<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = (string) $_SESSION['csrf_token'];

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$baseUrl = getSiteBaseUrl();
$activePage = 'kontak';
$pageTitle = 'Kontak, Call Center & Daftar 17 Cabang | ' . $officeInfo['name'];
$pageDescription = 'Alamat Kantor Pusat Perumda Air Minum Tirta Sukapura Jl. Jend. A.H. Nasution Km. 8 Tasikmalaya, Call Center +62 821-2910-2345, formulir bantuan, dan 17 cabang pelayanan.';
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
  <section class="bg-[#102A43] text-white py-12 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-300 mb-3">
        <a href="index.php" class="hover:text-white">Beranda</a>
        <span>/</span>
        <span class="text-white font-semibold">Kontak</span>
      </nav>
      <h1 class="font-display text-3xl sm:text-4xl font-extrabold">
        Kontak &amp; Daftar 17 Cabang Pelayanan
      </h1>
      <p class="text-slate-300 mt-2.5 text-base max-w-2xl leading-relaxed">
        Hubungi Kantor Pusat, kirim pesan langsung ke WhatsApp Call Center, atau temukan kantor cabang terdekat di Tasikmalaya.
      </p>
    </div>
  </section>

  <!-- Contact Details + Form -->
  <section class="py-14 lg:py-18 bg-[#F7F7F5] border-b border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <!-- Kantor Pusat + Map -->
        <div class="lg:col-span-5 space-y-6 reveal">
          <div class="bg-white border border-[#DCE1E5] rounded-md p-6 space-y-4">
            <h2 class="font-display text-xl font-extrabold text-[#102A43]">Kantor Pusat</h2>

            <dl class="space-y-4 text-sm">
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Alamat</dt>
                <dd class="text-[#1C242B] mt-0.5"><?= e($officeInfo['address']) ?></dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Call Center / WhatsApp 24 Jam</dt>
                <dd class="mt-0.5 tabular-nums">
                  <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="font-bold text-base text-[#005A8D] hover:underline">
                    <?= e($officeInfo['phone']) ?>
                  </a>
                </dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Telepon Kantor</dt>
                <dd class="text-[#1C242B] mt-0.5 tabular-nums"><?= e($officeInfo['office_phone']) ?></dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Email</dt>
                <dd class="text-[#1C242B] mt-0.5">
                  <?= e($officeInfo['email']) ?><br />
                  <span class="text-xs text-[#52606D]"><?= e($officeInfo['email_alt']) ?></span>
                </dd>
              </div>
              <div>
                <dt class="text-xs font-semibold text-[#52606D]">Jam Kerja Loket</dt>
                <dd class="text-[#1C242B] mt-0.5">
                  <?= e($officeInfo['hours_weekday']) ?><br />
                  <span class="text-xs text-[#52606D]"><?= e($officeInfo['hours_weekend']) ?></span>
                </dd>
              </div>
            </dl>
          </div>

          <div class="rounded-md overflow-hidden border border-[#DCE1E5] bg-[#EFEFE9] aspect-[16/10]">
            <iframe
              title="Lokasi Kantor Pusat Perumda Air Minum Tirta Sukapura"
              src="<?= e($officeInfo['maps_embed']) ?>"
              class="w-full h-full border-0"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>

        <!-- Form Pesan Pelanggan -->
        <div class="lg:col-span-7 reveal reveal-delay-1">
          <div class="bg-white border border-[#DCE1E5] rounded-md p-6 sm:p-8">
            <h2 class="font-display text-2xl font-extrabold text-[#102A43]">
              Kirim Pesan ke Layanan Pelanggan
            </h2>
            <p class="text-sm text-[#52606D] mt-1.5">
              Pesan Anda dicatat langsung ke database sistem kami dengan nomor tiket, dan dapat dilanjutkan lewat WhatsApp resmi <?= e($officeInfo['phone']) ?>.
            </p>

            <form id="contact-form" data-wa-phone="<?= e($officeInfo['phone_clean']) ?>" class="mt-6 space-y-4">
              <input type="hidden" id="cf-csrf" value="<?= e($csrfToken) ?>" />
              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="cf-name" class="block text-xs font-bold text-[#102A43] mb-1.5">Nama Lengkap *</label>
                  <input id="cf-name" type="text" required placeholder="Nama Anda" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
                </div>
                <div>
                  <label for="cf-nosam" class="block text-xs font-bold text-[#102A43] mb-1.5">Nomor Sambungan (opsional)</label>
                  <input id="cf-nosam" type="text" placeholder="Contoh: 01023456" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
                </div>
              </div>

              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="cf-topic" class="block text-xs font-bold text-[#102A43] mb-1.5">Keperluan *</label>
                  <select id="cf-topic" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm bg-white focus:outline-none focus:border-[#005A8D]">
                    <option value="Informasi Tagihan">Informasi Tagihan Air</option>
                    <option value="Gangguan Aliran / Pipa Bocor">Gangguan Aliran / Pipa Bocor</option>
                    <option value="Pendaftaran Sambungan Baru">Pendaftaran Sambungan Baru</option>
                    <option value="Balik Nama / Bukaan Kembali">Balik Nama / Bukaan Kembali</option>
                    <option value="Saran dan Masukan">Saran dan Masukan</option>
                  </select>
                </div>
                <div>
                  <label for="cf-branch" class="block text-xs font-bold text-[#102A43] mb-1.5">Cabang / Unit Terkait (opsional)</label>
                  <select id="cf-branch" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm bg-white focus:outline-none focus:border-[#005A8D]">
                    <option value="">Kantor Pusat / Umum</option>
                    <?php foreach ($branches as $b): ?>
                      <?php if (isset($b['id'])): ?>
                        <option value="<?= (int) $b['id'] ?>"><?= e($b['name']) ?> (<?= e($b['area']) ?>)</option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div>
                <label for="cf-area" class="block text-xs font-bold text-[#102A43] mb-1.5">Kecamatan / Alamat Singkat *</label>
                <input id="cf-area" type="text" required placeholder="Contoh: Singaparna / Tawang" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
              </div>

              <div>
                <label for="cf-message" class="block text-xs font-bold text-[#102A43] mb-1.5">Pesan *</label>
                <textarea id="cf-message" rows="4" required minlength="8" placeholder="Jelaskan pertanyaan atau kondisi aliran di rumah Anda..." class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"></textarea>
              </div>

              <div id="contact-feedback" class="hidden rounded-md p-3.5 text-sm font-medium"></div>

              <div class="flex flex-wrap items-center gap-3 pt-2">
                <button
                  type="submit"
                  id="cf-submit-btn"
                  class="inline-flex items-center gap-2 px-5 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white font-bold text-sm transition-colors cursor-pointer"
                >
                  <i data-lucide="send" class="w-4 h-4"></i>
                  <span>Kirim Pesan</span>
                </button>
                <a
                  id="cf-wa-link"
                  href="https://wa.me/<?= e($officeInfo['phone_clean']) ?>"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-md bg-[#EFEFE9] hover:bg-[#DCE1E5] text-[#102A43] font-bold text-sm transition-colors"
                >
                  <span>Chat WhatsApp Langsung</span>
                  <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Direktori 17 Cabang & Unit -->
  <section id="cabang" class="py-14 lg:py-18 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-[#DCE1E5] mb-8 reveal">
        <div>
          <h2 class="font-display text-2xl font-extrabold text-[#102A43]">
            Daftar 17 Cabang &amp; Unit Pelayanan
          </h2>
          <p class="text-sm text-[#52606D] mt-1">Pilih wilayah untuk menyaring lokasi terdekat.</p>
        </div>

        <div class="flex flex-wrap gap-2">
          <?php foreach (['Semua', 'Kota Tasikmalaya', 'Kab. Tasikmalaya'] as $area): ?>
            <button
              type="button"
              data-branch-filter="<?= e($area) ?>"
              class="px-3.5 py-1.5 rounded-md text-xs font-bold transition-colors cursor-pointer <?= $area === 'Semua' ? 'bg-[#102A43] text-white' : 'bg-[#F7F7F5] text-[#52606D] border border-[#DCE1E5] hover:text-[#102A43]' ?>"
            >
              <?= e($area) ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-8 divide-y sm:divide-y-0">
        <?php foreach ($branches as $branch): ?>
          <div
            data-branch-card
            data-area="<?= e($branch['area']) ?>"
            class="py-5 border-b border-[#DCE1E5] flex flex-col justify-between gap-2"
          >
            <div>
              <div class="flex items-baseline justify-between gap-2">
                <h3 class="font-display font-bold text-base text-[#102A43]"><?= e($branch['name']) ?></h3>
                <span class="text-[11px] font-semibold text-[#1E6F5C] shrink-0"><?= e($branch['area']) ?></span>
              </div>
              <p class="text-xs sm:text-sm text-[#52606D] mt-1 leading-relaxed"><?= e($branch['address']) ?></p>
            </div>
            <div class="text-xs font-bold text-[#005A8D] tabular-nums pt-1">
              <?= e($branch['phone']) ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
