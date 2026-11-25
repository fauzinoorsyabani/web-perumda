<section id="layanan" class="py-16 lg:py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-8 border-b border-slate-200">
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#0077B6]">
          Layanan Online
        </p>
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0B2545] mt-1">
          Akses Cepat Pelanggan
        </h2>
      </div>
      <p class="text-sm text-slate-500 max-w-sm">
        Pilih layanan di bawah untuk langsung terhubung ke portal resmi Tirta Sukapura.
      </p>
    </div>

    <!-- Clean Editorial 3x2 Grid (hairline dividers, no heavy card slop) -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 divide-y sm:divide-y-0 sm:gap-x-10 sm:gap-y-2">
      <?php foreach ($digitalServices as $service): ?>
        <a
          href="<?= e($service['href']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="group py-6 border-b border-slate-200 flex items-start justify-between gap-4 hover:bg-[#F4F6F9]/70 -mx-3 px-3 rounded-lg transition-colors"
        >
          <div class="space-y-1.5">
            <div class="flex items-center gap-2.5">
              <i data-lucide="<?= e($service['icon']) ?>" class="w-4 h-4 text-[#0077B6] shrink-0"></i>
              <h3 class="font-display font-bold text-base text-[#0B2545] group-hover:text-[#0077B6] transition-colors">
                <?= e($service['title']) ?>
              </h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed pl-6.5">
              <?= e($service['description']) ?>
            </p>
          </div>
          <i data-lucide="arrow-up-right" class="w-4 h-4 text-slate-400 group-hover:text-[#0077B6] shrink-0 mt-1 transition-colors"></i>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Clean Flat Water Bill Calculator -->
<section id="kalkulator" class="py-16 lg:py-20 bg-[#F4F6F9] border-y border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid lg:grid-cols-12 gap-10 items-start">
      <!-- Controls -->
      <div class="lg:col-span-7 space-y-6">
        <div>
          <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#0077B6]">
            Simulasi Tarif
          </p>
          <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0B2545] mt-1">
            Estimasi Tagihan Air Bulanan
          </h2>
        </div>

        <div>
          <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2.5">
            Golongan Pelanggan
          </span>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($tariffPresets as $preset): ?>
              <?php $isDefault = ($preset['id'] === 'rt1'); ?>
              <button
                type="button"
                data-tariff-btn
                data-rate1="<?= (int) $preset['rate1'] ?>"
                data-rate2="<?= (int) $preset['rate2'] ?>"
                data-rate3="<?= (int) $preset['rate3'] ?>"
                data-admin="<?= (int) $preset['admin'] ?>"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors cursor-pointer <?= $isDefault ? 'bg-[#0B2545] text-white' : 'bg-white text-slate-700 hover:bg-slate-100' ?>"
              >
                <?= e($preset['label']) ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="max-w-lg">
          <div class="flex items-baseline justify-between mb-2">
            <label for="cubic-range" class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
              Pemakaian Air
            </label>
            <span id="cubic-display" class="font-display text-2xl font-bold text-[#0B2545]">
              20 m³
            </span>
          </div>
          <input
            id="cubic-range"
            type="range"
            min="5"
            max="60"
            step="1"
            value="20"
            class="w-full h-2 bg-slate-300 rounded-lg cursor-pointer"
          />
          <div class="flex justify-between text-xs text-slate-500 mt-1.5">
            <span>5 m³</span>
            <span>20 m³</span>
            <span>60 m³</span>
          </div>
        </div>
      </div>

      <!-- Minimal Ledger Summary (no heavy boxed clutter) -->
      <div class="lg:col-span-5 bg-white rounded-xl p-6 sm:p-7">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">
          Perkiraan Total
        </div>
        <div id="calc-total" class="font-display text-3xl font-extrabold text-[#0B2545] mt-1">
          Rp 76.000
        </div>

        <dl class="mt-5 pt-4 border-t border-slate-200 space-y-2.5 text-sm">
          <div class="flex justify-between">
            <dt id="calc-tier1-label" class="text-slate-600">Blok I (0–10 m³)</dt>
            <dd id="calc-tier1-cost" class="font-medium text-slate-900">Rp 28.000</dd>
          </div>
          <div class="flex justify-between">
            <dt id="calc-tier2-label" class="text-slate-600">Blok II (11–20 m³)</dt>
            <dd id="calc-tier2-cost" class="font-medium text-slate-900">Rp 38.000</dd>
          </div>
          <div class="flex justify-between">
            <dt id="calc-tier3-label" class="text-slate-600">Blok III (&gt;20 m³)</dt>
            <dd id="calc-tier3-cost" class="font-medium text-slate-900">Rp 0</dd>
          </div>
          <div class="flex justify-between pt-2 border-t border-slate-100">
            <dt class="text-slate-600">Biaya Administrasi</dt>
            <dd id="calc-admin-cost" class="font-medium text-slate-900">Rp 10.000</dd>
          </div>
        </dl>

        <p class="mt-4 text-xs text-slate-500">
          *Simulasi estimasi. Cek tagihan resmi di
          <a href="http://asindotama.com/layanantirtasukapura/" target="_blank" rel="noopener noreferrer" class="text-[#0077B6] font-medium hover:underline">
            portal tagihan
          </a>.
        </p>
      </div>
    </div>
  </div>
</section>
