<!-- Clean Payment Partners Strip (no boxes) -->
<section class="py-12 bg-white border-t border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="shrink-0">
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-500">
          Mitra Pembayaran Resmi
        </p>
      </div>
      <div class="flex flex-wrap items-center gap-x-10 gap-y-5">
        <?php foreach ($paymentPartners as $partner): ?>
          <img
            src="<?= e($partner['logo']) ?>"
            alt="<?= e($partner['name']) ?>"
            title="<?= e($partner['name']) ?>"
            loading="lazy"
            class="h-8 w-auto object-contain opacity-80 hover:opacity-100 transition-opacity"
            onerror="this.style.display='none'"
          />
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Flat Solid Footer -->
<footer id="kontak" class="bg-[#0B2545] text-slate-300 pt-14 pb-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid md:grid-cols-3 gap-10 pb-10 border-b border-white/15">
      <!-- Identitas -->
      <div class="space-y-3">
        <div class="font-display font-bold text-white text-base">
          <?= e($officeInfo['name']) ?>
        </div>
        <p class="text-sm text-slate-400 leading-relaxed">
          BUMD Pemerintah Daerah Kabupaten Tasikmalaya penyedia layanan air minum.
        </p>
      </div>

      <!-- Kontak & Jam Kerja -->
      <div class="space-y-2.5 text-sm">
        <div class="font-display font-bold text-white text-xs uppercase tracking-wider mb-3">
          Kontak &amp; Jam Kerja
        </div>
        <div>
          <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="text-white font-semibold hover:text-sky-300">
            <?= e($officeInfo['phone']) ?>
          </a>
        </div>
        <div>
          <a href="mailto:<?= e($officeInfo['email']) ?>" class="hover:text-white">
            <?= e($officeInfo['email']) ?>
          </a>
        </div>
        <div class="text-slate-400 pt-1"><?= e($officeInfo['hours_weekday']) ?></div>
      </div>

      <!-- Sistem Internal -->
      <div class="space-y-2.5 text-sm">
        <div class="font-display font-bold text-white text-xs uppercase tracking-wider mb-3">
          Portal Terhubung
        </div>
        <div class="flex flex-col gap-2">
          <a href="<?= e($officeInfo['simpadu_url']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white inline-flex items-center gap-1.5">
            <span>Launcher SIMPADU</span>
            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
          </a>
          <a href="<?= e($officeInfo['gis_url']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white inline-flex items-center gap-1.5">
            <span>GIS Tirta Sukapura</span>
            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
          </a>
          <a href="<?= e($officeInfo['simpel_url']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white inline-flex items-center gap-1.5">
            <span>SIMPEL Pelanggan Baru</span>
            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-400">
      <span>© <?= date('Y') ?> Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya.</span>
      <span>Didukung oleh Pemkab Tasikmalaya</span>
    </div>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>
