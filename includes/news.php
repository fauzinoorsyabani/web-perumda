<?php
$newsCategories = ['Semua', 'Perbaikan', 'Gangguan', 'Kinerja', 'Pengumuman'];
?>
<section id="berita" class="py-16 lg:py-20 bg-[#F4F6F9] border-t border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <!-- Header + Clean Filter Links -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 border-b border-slate-200">
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#0077B6]">
          Informasi Pelanggan
        </p>
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0B2545] mt-1">
          Berita &amp; Info Gangguan
        </h2>
      </div>

      <div class="flex flex-wrap gap-2">
        <?php foreach ($newsCategories as $cat): ?>
          <?php $isAll = ($cat === 'Semua'); ?>
          <button
            type="button"
            data-news-filter="<?= e($cat) ?>"
            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors cursor-pointer <?= $isAll ? 'bg-[#0B2545] text-white' : 'bg-white text-slate-600 hover:text-[#0B2545]' ?>"
          >
            <?= e($cat) ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Clean Editorial Grid (borderless, image-first, minimal text) -->
    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-7">
      <?php foreach ($newsItems as $item): ?>
        <?php
        $jsonPayload = htmlspecialchars(
            json_encode($item, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            ENT_QUOTES,
            'UTF-8'
        );
        ?>
        <article
          data-news-card
          data-category="<?= e($item['category']) ?>"
          data-news-json="<?= $jsonPayload ?>"
          class="group cursor-pointer flex flex-col"
        >
          <div class="aspect-[16/10] rounded-lg overflow-hidden bg-slate-200">
            <img
              src="<?= e($item['image']) ?>"
              alt="<?= e($item['title']) ?>"
              loading="lazy"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              onerror="this.style.display='none'"
            />
          </div>

          <div class="mt-3.5 space-y-1.5">
            <div class="text-xs font-semibold text-[#0077B6]">
              <?= e($item['category']) ?>
            </div>
            <h3 class="font-display font-bold text-[#0B2545] text-sm sm:text-base leading-snug group-hover:text-[#0077B6] transition-colors line-clamp-3">
              <?= e($item['title']) ?>
            </h3>
            <div class="text-xs text-slate-500 pt-0.5">
              <?= e($item['date']) ?>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="mt-10 pt-6 border-t border-slate-200 flex justify-end">
      <a
        href="<?= e($officeInfo['old_site_base']) ?>/berita"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#0077B6] hover:underline"
      >
        <span>Lihat Semua Berita</span>
        <i data-lucide="arrow-right" class="w-4 h-4"></i>
      </a>
    </div>
  </div>

  <!-- Minimal Reader Modal -->
  <div
    id="news-modal"
    class="hidden fixed inset-0 z-50 bg-slate-950/60 flex items-center justify-center p-4"
  >
    <div class="bg-white rounded-xl max-w-xl w-full max-h-[85vh] overflow-y-auto shadow-xl">
      <div class="relative aspect-[16/9] bg-slate-200">
        <img
          id="news-modal-img"
          src=""
          alt=""
          class="w-full h-full object-cover"
          onerror="this.style.display='none'"
        />
        <button
          type="button"
          data-close-modal
          class="absolute top-3 right-3 w-8 h-8 rounded-lg bg-[#0B2545] text-white flex items-center justify-center cursor-pointer"
          aria-label="Tutup"
        >
          <i data-lucide="x" class="w-4 h-4"></i>
        </button>
      </div>
      <div class="p-6 space-y-3">
        <div id="news-modal-category" class="text-xs font-semibold uppercase tracking-wider text-[#0077B6]"></div>
        <h3 id="news-modal-title" class="font-display text-xl font-bold text-[#0B2545] leading-snug"></h3>
        <div id="news-modal-body" class="space-y-3 text-sm text-slate-600 leading-relaxed pt-1"></div>
        <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
          <a
            id="news-modal-link"
            href="#"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#0077B6] hover:underline"
          >
            <span>Buka Portal Asli</span>
            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
          </a>
          <button
            type="button"
            data-close-modal
            class="px-3.5 py-1.5 rounded-lg bg-[#F4F6F9] hover:bg-slate-200 text-slate-700 text-sm font-medium cursor-pointer"
          >
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
