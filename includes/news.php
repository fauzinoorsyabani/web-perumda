<?php
$newsCategories = ['Semua', 'Gangguan & Perbaikan', 'Kinerja', 'Pengumuman'];
?>
<section id="berita" class="py-20 lg:py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header + Filter -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div class="max-w-2xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold uppercase tracking-wider">
          <i data-lucide="newspaper" class="w-3.5 h-3.5"></i>
          <span>Berita &amp; Info Pelanggan</span>
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
          Kabar Terbaru &amp; Informasi Gangguan Aliran
        </h2>
      </div>

      <div class="flex flex-wrap gap-2">
        <?php foreach ($newsCategories as $cat): ?>
          <?php $isAll = ($cat === 'Semua'); ?>
          <button
            type="button"
            data-news-filter="<?= e($cat) ?>"
            class="px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all cursor-pointer <?= $isAll ? 'bg-sky-600 text-white shadow-sm' : 'bg-white text-slate-600 border border-slate-200 hover:border-sky-300' ?>"
          >
            <?= e($cat) ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Cards Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
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
          class="group cursor-pointer rounded-3xl bg-white border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl hover:border-sky-300 transition-all duration-300 flex flex-col"
        >
          <div class="relative h-44 bg-gradient-to-br from-sky-900 to-slate-900 overflow-hidden">
            <img
              src="<?= e($item['image']) ?>"
              alt="<?= e($item['title']) ?>"
              loading="lazy"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              onerror="this.style.display='none'"
            />
            <div class="absolute top-3 left-3 flex items-center gap-1.5">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold backdrop-blur-md <?= !empty($item['urgent']) ? 'bg-amber-500 text-slate-950' : 'bg-slate-900/75 text-white' ?>">
                <?php if (!empty($item['urgent'])): ?>
                  <i data-lucide="alert-triangle" class="w-3 h-3"></i>
                <?php endif; ?>
                <?= e($item['category']) ?>
              </span>
            </div>
          </div>

          <div class="p-5 flex-1 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 text-xs text-slate-500 mb-2">
                <span><?= e($item['date']) ?></span>
                <span>•</span>
                <span class="inline-flex items-center gap-1">
                  <i data-lucide="clock" class="w-3 h-3"></i>
                  <?= e($item['readTime']) ?>
                </span>
              </div>
              <h3 class="font-display font-bold text-slate-900 text-base leading-snug group-hover:text-sky-700 transition-colors line-clamp-3">
                <?= e($item['title']) ?>
              </h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2.5 line-clamp-3 leading-relaxed">
                <?= e($item['excerpt']) ?>
              </p>
            </div>

            <div class="mt-4 pt-3 border-t border-slate-100 inline-flex items-center gap-1.5 text-xs font-bold text-sky-700">
              <span>Baca Selengkapnya</span>
              <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- All News External Button -->
    <div class="mt-10 text-center">
      <a
        href="<?= e($officeInfo['old_site_base']) ?>/berita"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-slate-200 hover:border-sky-300 text-slate-800 hover:text-sky-700 font-semibold text-sm shadow-xs transition-all"
      >
        <span>Lihat Arsip Semua Berita</span>
        <i data-lucide="external-link" class="w-4 h-4"></i>
      </a>
    </div>
  </div>

  <!-- Article Reader Modal -->
  <div
    id="news-modal"
    class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4"
  >
    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl border border-slate-200">
      <div class="relative h-56 bg-slate-900">
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
          class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-900/75 hover:bg-slate-900 text-white flex items-center justify-center transition-colors cursor-pointer"
          aria-label="Tutup berita"
        >
          <i data-lucide="x" class="w-5 h-5"></i>
        </button>
      </div>
      <div class="p-6 sm:p-8 space-y-4">
        <span id="news-modal-category" class="inline-block px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold"></span>
        <h3 id="news-modal-title" class="font-display text-2xl font-extrabold text-slate-900 leading-snug"></h3>
        <div id="news-modal-body" class="space-y-3 text-sm sm:text-base text-slate-600 leading-relaxed"></div>
        <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
          <a
            id="news-modal-link"
            href="#"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-800"
          >
            <span>Buka di Portal Asli</span>
            <i data-lucide="external-link" class="w-4 h-4"></i>
          </a>
          <button
            type="button"
            data-close-modal
            class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-sm font-semibold cursor-pointer"
          >
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
