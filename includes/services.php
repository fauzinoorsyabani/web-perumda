<section id="layanan" class="py-20 lg:py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="max-w-2xl mb-12">
      <span class="inline-flex items-center px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold uppercase tracking-wider">
        Layanan Digital Pelanggan
      </span>
      <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
        Semua Kebutuhan Pelanggan, Lebih Cepat &amp; Transparan
      </h2>
      <p class="text-slate-600 mt-3 text-base leading-relaxed">
        Akses langsung 6 layanan online resmi Perumda Air Minum Tirta Sukapura tanpa harus
        datang ke loket kantor.
      </p>
    </div>

    <!-- 6 Bento Service Cards -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($digitalServices as $service): ?>
        <a
          href="<?= e($service['href']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="group relative flex flex-col justify-between rounded-3xl bg-white p-6 sm:p-7 border border-slate-200/80 shadow-xs hover:shadow-xl hover:shadow-sky-900/5 hover:border-sky-300 transition-all duration-300 hover:-translate-y-1"
        >
          <div>
            <div class="flex items-start justify-between gap-4 mb-5">
              <div class="w-12 h-12 rounded-2xl bg-gradient-to-br <?= e($service['accent']) ?> text-white flex items-center justify-center shadow-md">
                <i data-lucide="<?= e($service['icon']) ?>" class="w-6 h-6"></i>
              </div>
              <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">
                <?= e($service['badge']) ?>
              </span>
            </div>

            <div class="text-xs font-semibold text-sky-700 uppercase tracking-wide">
              <?= e($service['subtitle']) ?>
            </div>
            <h3 class="font-display text-xl font-bold text-slate-900 mt-1 group-hover:text-sky-700 transition-colors">
              <?= e($service['title']) ?>
            </h3>
            <p class="text-sm text-slate-600 mt-2.5 leading-relaxed">
              <?= e($service['description']) ?>
            </p>
          </div>

          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-sm font-semibold text-sky-700">
            <span>Buka Layanan</span>
            <i data-lucide="arrow-up-right" class="w-4 h-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Interactive Water Bill Calculator -->
    <div
      id="kalkulator"
      class="mt-16 rounded-3xl bg-gradient-to-br from-slate-900 via-sky-950 to-slate-900 text-white p-6 sm:p-10 shadow-2xl border border-slate-800"
    >
      <div class="grid lg:grid-cols-12 gap-8 lg:gap-10 items-center">
        <div class="lg:col-span-7 space-y-6">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-semibold">
            <i data-lucide="calculator" class="w-3.5 h-3.5"></i>
            <span>Fitur Baru <?= date('Y') ?> • Simulasi Tagihan</span>
          </div>

          <div>
            <h3 class="font-display text-2xl sm:text-3xl font-extrabold">
              Kalkulator Estimasi Rekening Air
            </h3>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
              Perkirakan biaya pemakaian air bulanan Anda berdasarkan golongan pelanggan dan
              volume kubikasi (m³).
            </p>
          </div>

          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2.5">
              Pilih Golongan Pelanggan
            </label>
            <div class="grid sm:grid-cols-2 gap-2.5">
              <?php foreach ($tariffPresets as $preset): ?>
                <?php $isDefault = ($preset['id'] === 'rt1'); ?>
                <button
                  type="button"
                  data-tariff-btn
                  data-rate1="<?= (int) $preset['rate1'] ?>"
                  data-rate2="<?= (int) $preset['rate2'] ?>"
                  data-rate3="<?= (int) $preset['rate3'] ?>"
                  data-admin="<?= (int) $preset['admin'] ?>"
                  class="text-left px-4 py-3 rounded-xl text-sm font-medium border transition-all cursor-pointer <?= $isDefault ? 'bg-sky-500/20 border-sky-400 text-white shadow-sm' : 'bg-white/5 border-white/10 text-slate-300 hover:bg-white/10' ?>"
                >
                  <?= e($preset['label']) ?>
                </button>
              <?php endforeach; ?>
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="cubic-range" class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                Perkiraan Pemakaian Air
              </label>
              <span id="cubic-display" class="font-display text-xl font-extrabold text-cyan-300">
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
              class="w-full h-2.5 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-sky-400"
            />
            <div class="flex justify-between text-[11px] text-slate-400 mt-1.5">
              <span>5 m³ (Hemat)</span>
              <span>20 m³ (Rata-rata Keluarga)</span>
              <span>60 m³ (Tinggi)</span>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5">
          <div class="rounded-2xl bg-white/10 border border-white/15 p-6 backdrop-blur-md space-y-4">
            <div class="text-xs font-semibold uppercase tracking-wider text-cyan-300">
              Estimasi Tagihan Bulanan
            </div>
            <div id="calc-total" class="font-display text-3xl sm:text-4xl font-extrabold text-white">
              Rp 76.000
            </div>

            <div class="space-y-2 pt-3 border-t border-white/10 text-xs sm:text-sm text-slate-300">
              <div class="flex justify-between">
                <span id="calc-tier1-label">Blok I (0–10 m³: 10 m³)</span>
                <span id="calc-tier1-cost" class="font-medium text-white">Rp 28.000</span>
              </div>
              <div class="flex justify-between">
                <span id="calc-tier2-label">Blok II (11–20 m³: 10 m³)</span>
                <span id="calc-tier2-cost" class="font-medium text-white">Rp 38.000</span>
              </div>
              <div class="flex justify-between">
                <span id="calc-tier3-label">Blok III (&gt;20 m³: 0 m³)</span>
                <span id="calc-tier3-cost" class="font-medium text-white">Rp 0</span>
              </div>
              <div class="flex justify-between">
                <span>Biaya Beban / Administrasi</span>
                <span id="calc-admin-cost" class="font-medium text-white">Rp 10.000</span>
              </div>
            </div>

            <div class="flex items-start gap-2 pt-3 border-t border-white/10 text-[11px] text-slate-400 leading-relaxed">
              <i data-lucide="info" class="w-4 h-4 text-sky-400 shrink-0 mt-0.5"></i>
              <span>
                Angka di atas adalah simulasi estimasi. Untuk tagihan resmi sesuai SK Tarif
                Perda terbaru, silakan gunakan menu
                <a
                  href="http://asindotama.com/layanantirtasukapura/"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="text-sky-300 underline hover:text-white"
                >
                  Cek Tagihan Resmi
                </a>.
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
