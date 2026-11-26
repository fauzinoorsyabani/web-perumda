<!-- Mitra Pembayaran & Kerjasama — Marquee Halus Kanan ke Kiri -->
<section aria-label="Mitra Pembayaran dan Kerjasama" class="py-10 bg-[#EFEFE9] border-y border-[#DCE1E5]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 flex flex-col sm:flex-row sm:items-baseline justify-between gap-2">
    <h2 class="font-display text-lg font-bold text-[#102A43]">
      Mitra Pembayaran &amp; Kerjasama Resmi
    </h2>
    <p class="text-xs text-[#52606D]">
      Rekening air dapat dibayar lewat bank mitra, Kantor Pos, atau loket cabang.
    </p>
  </div>

  <div class="marquee-viewport">
    <div class="marquee-track marquee-track--partners flex items-center gap-4 px-4">
      <?php for ($copy = 0; $copy < 2; $copy++): ?>
        <?php foreach ($partnersMarquee as $partner): ?>
          <div class="partner-item shrink-0 flex items-center gap-3.5 px-5 py-3 bg-white border border-[#DCE1E5] rounded-md">
            <?php if (!empty($partner['logo'])): ?>
              <img
                src="<?= e($partner['logo']) ?>"
                alt="<?= e($partner['name']) ?>"
                loading="lazy"
                class="partner-logo h-7 w-auto max-w-[92px] object-contain"
                onerror="this.style.display='none'"
              />
            <?php else: ?>
              <span class="px-2 py-1 rounded-sm bg-[#102A43] text-white font-display font-bold text-[11px]">
                <?= e(substr($partner['name'], 0, 3)) ?>
              </span>
            <?php endif; ?>
            <div class="leading-tight pr-1">
              <div class="font-display font-bold text-sm text-[#102A43] whitespace-nowrap">
                <?= e($partner['name']) ?>
              </div>
              <div class="text-[11px] text-[#52606D] whitespace-nowrap">
                <?= e($partner['role']) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>
