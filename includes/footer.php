<!-- Payment Partners & Ecosystem Banner -->
<section class="py-16 lg:py-20 bg-white border-t border-slate-200/70">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider">
        Mitra Pembayaran Resmi
      </span>
      <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3">
        Bayar Tagihan Air Lebih Praktis di Berbagai Kanal
      </h2>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
      <?php foreach ($paymentPartners as $partner): ?>
        <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-5 flex flex-col items-center justify-center text-center hover:bg-white hover:border-sky-300 hover:shadow-md transition-all">
          <div class="h-12 flex items-center justify-center mb-3">
            <img
              src="<?= e($partner['logo']) ?>"
              alt="<?= e($partner['name']) ?>"
              loading="lazy"
              class="max-h-10 max-w-[120px] object-contain"
              onerror="this.style.display='none'"
            />
          </div>
          <div class="font-semibold text-sm text-slate-900"><?= e($partner['name']) ?></div>
          <div class="text-[11px] text-slate-500 mt-0.5"><?= e($partner['type']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Internal & GIS Ecosystem Strip -->
    <div class="mt-12 rounded-3xl bg-gradient-to-r from-sky-600 to-cyan-600 text-white p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-lg shadow-sky-600/20">
      <div class="space-y-1.5">
        <div class="text-xs font-bold uppercase tracking-wider text-sky-100">
          Ekosistem Digital Internal &amp; Geospasial
        </div>
        <h3 class="font-display text-xl sm:text-2xl font-extrabold">
          Akses Portal SIMPADU &amp; Peta Jaringan GIS
        </h3>
        <p class="text-sm text-sky-100 max-w-xl">
          Terintegrasi dengan Launcher SIMPADU (Billing, Monitoring, Baca Meter, Kepegawaian,
          Manajemen Aset) dan GIS Perumda Tirta Sukapura.
        </p>
      </div>
      <div class="flex flex-wrap gap-3 shrink-0">
        <a
          href="<?= e($officeInfo['simpadu_url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-sky-800 hover:bg-sky-50 font-bold text-sm transition-colors"
        >
          <i data-lucide="layout-grid" class="w-4 h-4"></i>
          <span>Launcher SIMPADU</span>
          <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
        </a>
        <a
          href="<?= e($officeInfo['gis_url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-sky-900/40 hover:bg-sky-900/60 border border-white/25 text-white font-semibold text-sm transition-colors"
        >
          <i data-lucide="map" class="w-4 h-4"></i>
          <span>Portal GIS</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Contact & Footer -->
<footer id="kontak" class="bg-slate-950 text-slate-300 pt-16 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-slate-800">
      <!-- Brand -->
      <div class="lg:col-span-4 space-y-4">
        <div class="flex items-center gap-3">
          <img
            src="assets/images/logo-perumda.png"
            alt="Perumda Tirta Sukapura"
            class="h-11 w-auto object-contain bg-white/95 rounded-xl p-1.5"
            onerror="this.style.display='none'"
          />
          <div>
            <div class="font-display font-extrabold text-white text-base">
              Perumda Tirta Sukapura
            </div>
            <div class="text-xs text-sky-400"><?= e($officeInfo['region']) ?></div>
          </div>
        </div>
        <p class="text-sm text-slate-400 leading-relaxed">
          Perusahaan Umum Daerah Air Minum Tirta Sukapura Kabupaten Tasikmalaya. Berkomitmen
          menghadirkan air bersih berkualitas dan pelayanan pelanggan modern berbasis
          teknologi.
        </p>
        <div class="inline-flex items-center gap-2 text-xs text-slate-400 bg-slate-900 border border-slate-800 px-3 py-2 rounded-xl">
          <i data-lucide="building-2" class="w-4 h-4 text-sky-400"></i>
          <span>Didukung oleh Pemerintah Daerah Kabupaten Tasikmalaya</span>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="lg:col-span-4 space-y-4">
        <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider">
          Kontak Kami
        </h4>
        <ul class="space-y-3 text-sm">
          <li class="flex items-start gap-3">
            <i data-lucide="phone" class="w-4 h-4 text-sky-400 shrink-0 mt-1"></i>
            <div>
              <div class="text-slate-400 text-xs">Call Center / WhatsApp</div>
              <a
                href="tel:<?= e($officeInfo['phone_clean']) ?>"
                class="text-white font-semibold hover:text-sky-400 transition-colors"
              >
                <?= e($officeInfo['phone']) ?>
              </a>
            </div>
          </li>
          <li class="flex items-start gap-3">
            <i data-lucide="mail" class="w-4 h-4 text-sky-400 shrink-0 mt-1"></i>
            <div>
              <div class="text-slate-400 text-xs">Email Resmi</div>
              <a
                href="mailto:<?= e($officeInfo['email']) ?>"
                class="text-white font-semibold hover:text-sky-400 transition-colors"
              >
                <?= e($officeInfo['email']) ?>
              </a>
            </div>
          </li>
          <li class="flex items-start gap-3">
            <i data-lucide="map-pin" class="w-4 h-4 text-sky-400 shrink-0 mt-1"></i>
            <div>
              <div class="text-slate-400 text-xs">Wilayah Layanan</div>
              <div class="text-slate-200"><?= e($officeInfo['address']) ?></div>
            </div>
          </li>
        </ul>
      </div>

      <!-- Working Hours & Quick Links -->
      <div class="lg:col-span-4 space-y-4">
        <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider">
          Jam Kerja Pelayanan
        </h4>
        <div class="rounded-2xl bg-slate-900 border border-slate-800 p-4 space-y-2.5 text-sm">
          <div class="flex items-center gap-2 text-sky-400 font-semibold">
            <i data-lucide="clock" class="w-4 h-4"></i>
            <span>Loket Kantor</span>
          </div>
          <div class="flex justify-between text-slate-300">
            <span>Senin – Jum'at</span>
            <span class="font-semibold text-white">08:00 – 16:00 WIB</span>
          </div>
          <div class="flex justify-between text-slate-400">
            <span>Sabtu – Minggu</span>
            <span>Libur</span>
          </div>
        </div>
        <div class="flex flex-wrap gap-x-4 gap-y-2 text-xs text-slate-400 pt-1">
          <a href="#layanan" class="hover:text-sky-400 transition-colors">Layanan Digital</a>
          <a href="#kalkulator" class="hover:text-sky-400 transition-colors">Kalkulator Tarif</a>
          <a href="#profil" class="hover:text-sky-400 transition-colors">Profil Perusahaan</a>
          <a href="#berita" class="hover:text-sky-400 transition-colors">Berita &amp; Info</a>
        </div>
      </div>
    </div>

    <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
      <p>
        © <?= date('Y') ?> PERUMDA AIR MINUM TIRTA SUKAPURA KABUPATEN TASIKMALAYA. All rights reserved.
      </p>
      <p>Modern Redesign • PHP Native Modular + Tailwind CSS</p>
    </div>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>
