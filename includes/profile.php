<section id="profil" class="py-20 lg:py-24 bg-white border-y border-slate-200/70">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10">
      <div class="max-w-2xl">
        <span class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 text-xs font-bold uppercase tracking-wider">
          Profil &amp; Operasional
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
          Mengenal Perumda Air Minum Tirta Sukapura
        </h2>
        <p class="text-slate-600 mt-2.5 text-base">
          Lebih dari satu abad mengabdi menyediakan air bersih untuk masyarakat Tasikmalaya
          dengan tata kelola yang profesional.
        </p>
      </div>

      <!-- Tab Controls -->
      <div class="flex flex-wrap gap-2 bg-slate-100 p-1.5 rounded-2xl">
        <button
          type="button"
          data-tab-target="sejarah"
          class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all cursor-pointer bg-white text-sky-700 shadow-sm"
        >
          <i data-lucide="history" class="w-4 h-4"></i>
          <span>Sejarah Singkat</span>
        </button>
        <button
          type="button"
          data-tab-target="visimisi"
          class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all cursor-pointer text-slate-600 hover:text-slate-900"
        >
          <i data-lucide="target" class="w-4 h-4"></i>
          <span>Visi &amp; Misi</span>
        </button>
        <button
          type="button"
          data-tab-target="airminum"
          class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all cursor-pointer text-slate-600 hover:text-slate-900"
        >
          <i data-lucide="droplets" class="w-4 h-4"></i>
          <span>Sistem Air Minum</span>
        </button>
        <button
          type="button"
          data-tab-target="prosedur"
          class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all cursor-pointer text-slate-600 hover:text-slate-900"
        >
          <i data-lucide="clipboard-list" class="w-4 h-4"></i>
          <span>Prosedur Pelanggan</span>
        </button>
      </div>
    </div>

    <!-- Tab Panel: Sejarah -->
    <div data-tab-panel="sejarah" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php $totalTimeline = count($historyTimeline); ?>
      <?php foreach ($historyTimeline as $idx => $item): ?>
        <?php $isLast = ($idx === $totalTimeline - 1); ?>
        <div class="rounded-3xl p-6 border transition-all <?= $isLast ? 'bg-gradient-to-br from-sky-50 to-cyan-50 border-sky-200 md:col-span-2 lg:col-span-2' : 'bg-slate-50/70 border-slate-200/80 hover:border-sky-200' ?>">
          <span class="inline-block px-3 py-1 rounded-full bg-sky-600 text-white text-xs font-bold">
            <?= e($item['year']) ?>
          </span>
          <h3 class="font-display text-lg font-bold text-slate-900 mt-4">
            <?= e($item['title']) ?>
          </h3>
          <p class="text-sm text-slate-600 mt-2 leading-relaxed">
            <?= e($item['description']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tab Panel: Visi & Misi -->
    <div data-tab-panel="visimisi" class="hidden grid lg:grid-cols-12 gap-6">
      <div class="lg:col-span-5 rounded-3xl bg-gradient-to-br from-sky-700 to-cyan-700 text-white p-8 flex flex-col justify-between">
        <div>
          <span class="text-xs font-bold uppercase tracking-widest text-cyan-200">
            Visi Perusahaan
          </span>
          <h3 class="font-display text-2xl sm:text-3xl font-extrabold mt-3 leading-snug">
            Menjadi Perusahaan Daerah Air Minum yang Unggul, Mandiri, dan Terpercaya dalam
            Pelayanan Air Minum di Kabupaten Tasikmalaya.
          </h3>
        </div>
        <p class="text-sm text-sky-100 mt-6 pt-5 border-t border-white/15">
          Didukung penuh oleh Pemerintah Daerah Kabupaten Tasikmalaya untuk kesejahteraan dan
          kesehatan masyarakat.
        </p>
      </div>

      <div class="lg:col-span-7 rounded-3xl bg-slate-50 border border-slate-200/80 p-8">
        <span class="text-xs font-bold uppercase tracking-widest text-sky-700">
          Misi Utama
        </span>
        <h3 class="font-display text-xl font-bold text-slate-900 mt-2 mb-5">
          Langkah Strategis Pelayanan Air Bersih
        </h3>
        <ul class="space-y-4">
          <?php foreach ($missions as $misi): ?>
            <li class="flex items-start gap-3 text-sm sm:text-base text-slate-700">
              <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-600 shrink-0 mt-0.5"></i>
              <span><?= e($misi) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Tab Panel: Sistem Air Minum -->
    <div data-tab-panel="airminum" class="hidden grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($waterSystemSpecs as $spec): ?>
        <div class="rounded-3xl bg-slate-50 border border-slate-200/80 p-6 hover:border-sky-300 transition-colors">
          <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center mb-4">
            <i data-lucide="droplets" class="w-5 h-5"></i>
          </div>
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">
            <?= e($spec['title']) ?>
          </div>
          <div class="font-display text-lg font-extrabold text-slate-900 mt-1">
            <?= e($spec['value']) ?>
          </div>
          <p class="text-sm text-slate-600 mt-3 leading-relaxed">
            <?= e($spec['detail']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tab Panel: Prosedur Pelanggan -->
    <div data-tab-panel="prosedur" class="hidden grid lg:grid-cols-3 gap-6">
      <?php foreach ($customerProcedures as $proc): ?>
        <div class="rounded-3xl bg-slate-50 border border-slate-200/80 p-6 flex flex-col justify-between">
          <div>
            <h3 class="font-display text-xl font-bold text-slate-900">
              <?= e($proc['title']) ?>
            </h3>
            <p class="text-sm text-slate-600 mt-1.5"><?= e($proc['summary']) ?></p>
            <ol class="mt-5 space-y-3">
              <?php foreach ($proc['steps'] as $i => $step): ?>
                <li class="flex items-start gap-3 text-sm text-slate-700">
                  <span class="w-6 h-6 rounded-full bg-sky-100 text-sky-700 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">
                    <?= $i + 1 ?>
                  </span>
                  <span><?= e($step) ?></span>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>

          <a
            href="<?= e($proc['href']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-6 pt-4 border-t border-slate-200 inline-flex items-center justify-between text-sm font-semibold text-sky-700 hover:text-sky-800"
          >
            <span>Akses Layanan Terkait</span>
            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
