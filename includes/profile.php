<section id="profil" class="py-16 lg:py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <!-- Header + Underline Tabs (no boxy pill containers) -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-slate-200">
      <div class="pb-4">
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#0077B6]">
          Tentang Kami
        </p>
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0B2545] mt-1">
          Profil &amp; Sistem Air Minum
        </h2>
      </div>

      <div class="flex flex-wrap gap-6 -mb-px">
        <button
          type="button"
          data-tab-target="sejarah"
          class="pb-3.5 text-sm font-semibold border-b-2 border-[#0077B6] text-[#0B2545] transition-colors cursor-pointer"
        >
          Sejarah
        </button>
        <button
          type="button"
          data-tab-target="visimisi"
          class="pb-3.5 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-[#0B2545] transition-colors cursor-pointer"
        >
          Visi &amp; Misi
        </button>
        <button
          type="button"
          data-tab-target="airminum"
          class="pb-3.5 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-[#0B2545] transition-colors cursor-pointer"
        >
          Air Minum
        </button>
        <button
          type="button"
          data-tab-target="prosedur"
          class="pb-3.5 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-[#0B2545] transition-colors cursor-pointer"
        >
          Prosedur
        </button>
      </div>
    </div>

    <!-- Tab: Sejarah (clean timeline rows) -->
    <div data-tab-panel="sejarah" class="mt-8 divide-y divide-slate-200 max-w-4xl">
      <?php foreach ($historyTimeline as $item): ?>
        <div class="py-5 grid sm:grid-cols-12 gap-2 sm:gap-6 items-baseline">
          <div class="sm:col-span-3 font-display font-bold text-sm text-[#0077B6]">
            <?= e($item['year']) ?>
          </div>
          <div class="sm:col-span-9 text-sm sm:text-base text-slate-700 leading-relaxed">
            <?= e($item['text']) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tab: Visi & Misi -->
    <div data-tab-panel="visimisi" class="hidden mt-8 grid lg:grid-cols-12 gap-10">
      <div class="lg:col-span-5">
        <p class="text-xs font-semibold uppercase tracking-wider text-[#0077B6]">Visi</p>
        <p class="font-display text-xl sm:text-2xl font-bold text-[#0B2545] mt-2 leading-snug">
          Menjadi Perusahaan Daerah Air Minum yang Unggul, Mandiri, dan Terpercaya di
          Kabupaten Tasikmalaya.
        </p>
      </div>
      <div class="lg:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-wider text-[#0077B6] mb-3">Misi</p>
        <ul class="divide-y divide-slate-200">
          <?php foreach ($missions as $idx => $misi): ?>
            <li class="py-3.5 flex items-baseline gap-4 text-sm sm:text-base text-slate-700">
              <span class="font-display font-bold text-xs text-[#0077B6]">0<?= $idx + 1 ?></span>
              <span><?= e($misi) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Tab: Air Minum -->
    <div data-tab-panel="airminum" class="hidden mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php foreach ($waterSystemSpecs as $spec): ?>
        <div class="pt-4 border-t-2 border-[#0B2545]">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">
            <?= e($spec['label']) ?>
          </div>
          <div class="font-display text-lg font-bold text-[#0B2545] mt-1">
            <?= e($spec['value']) ?>
          </div>
          <p class="text-sm text-slate-600 mt-2 leading-relaxed">
            <?= e($spec['note']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tab: Prosedur -->
    <div data-tab-panel="prosedur" class="hidden mt-8 grid md:grid-cols-3 gap-10">
      <?php foreach ($customerProcedures as $proc): ?>
        <div class="flex flex-col justify-between">
          <div>
            <h3 class="font-display text-lg font-bold text-[#0B2545] pb-3 border-b border-slate-200">
              <?= e($proc['title']) ?>
            </h3>
            <ol class="mt-4 space-y-2.5 text-sm text-slate-700">
              <?php foreach ($proc['steps'] as $i => $step): ?>
                <li class="flex items-baseline gap-3">
                  <span class="font-bold text-xs text-[#0077B6]"><?= $i + 1 ?>.</span>
                  <span><?= e($step) ?></span>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>
          <a
            href="<?= e($proc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-[#0077B6] hover:underline"
          >
            <span>Buka Layanan</span>
            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
