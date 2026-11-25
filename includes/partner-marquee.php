<!-- Mitra Pembayaran & Kerjasama — Animasi Menggulir Kanan ke Kiri -->
<section aria-label="Mitra Pembayaran dan Kerjasama" class="py-10 bg-white border-y border-slate-200/90">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
    <div>
      <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#026AA2]">
        Kerjasama &amp; Mitra Pembayaran Resmi
      </p>
      <h2 class="font-display text-lg sm:text-xl font-bold text-[#0B2545] mt-0.5">
        Terhubung dengan <strong>Perbankan Nasional</strong> &amp; Ekosistem Layanan Daerah
      </h2>
    </div>
    <span class="text-xs text-slate-500 font-medium">Arahkan kursor untuk menjeda</span>
  </div>

  <div class="marquee-viewport py-2">
    <div class="marquee-track marquee-track--slow flex items-center gap-5 px-4">
      <?php for ($copy = 0; $copy < 2; $copy++): ?>
        <?php foreach ($partnersMarquee as $partner): ?>
          <div class="shrink-0 flex items-center gap-4 px-6 py-3.5 rounded-xl bg-[#F8FAFC] border border-slate-200/90 hover:border-[#026AA2]/40 hover:bg-white transition-colors">
            <?php if (!empty($partner['logo'])): ?>
              <img
                src="<?= e($partner['logo']) ?>"
                alt="<?= e($partner['name']) ?>"
                loading="lazy"
                class="h-8 w-auto max-w-[96px] object-contain"
                onerror="this.style.display='none'"
              />
            <?php else: ?>
              <div class="w-9 h-9 rounded-lg bg-[#0B2545] text-white font-display font-extrabold text-xs flex items-center justify-center">
                <?= e(substr($partner['name'], 0, 2)) ?>
              </div>
            <?php endif; ?>
            <div class="leading-tight pr-1">
              <div class="font-display font-bold text-sm text-[#0B2545] whitespace-nowrap">
                <?= e($partner['name']) ?>
              </div>
              <div class="text-[11px] text-slate-500 whitespace-nowrap">
                <?= e($partner['role']) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>
