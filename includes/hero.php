<section id="beranda" class="bg-[#0B2545] text-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-16 pb-14 lg:pt-20 lg:pb-18">
    <div class="grid lg:grid-cols-12 gap-10 items-center">
      <!-- Copy -->
      <div class="lg:col-span-7 space-y-6">
        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-sky-300">
          Perumda Air Minum Kabupaten Tasikmalaya
        </p>

        <h1 class="font-display text-3xl sm:text-5xl font-extrabold tracking-tight leading-[1.12]">
          Air Bersih Andal, Layanan Pelanggan Lebih Cepat.
        </h1>

        <p class="text-base text-slate-300 max-w-xl leading-relaxed">
          Cek tagihan, lapor gangguan, catat meter mandiri, hingga daftar sambungan baru
          secara online.
        </p>

        <div class="flex flex-wrap items-center gap-3 pt-1">
          <a
            href="http://asindotama.com/layanantirtasukapura/"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-[#0077B6] hover:bg-[#005F92] text-white text-sm font-semibold transition-colors"
          >
            <span>Cek Tagihan Air</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>

          <a
            href="<?= e($officeInfo['simpel_url']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-white/10 hover:bg-white/15 text-white text-sm font-semibold transition-colors"
          >
            <span>Daftar Sambungan Baru</span>
          </a>
        </div>
      </div>

      <!-- Clean Photo Frame -->
      <div class="lg:col-span-5">
        <div class="overflow-hidden rounded-xl bg-slate-800 aspect-[16/10]">
          <img
            src="<?= e($officeInfo['hero_banner']) ?>"
            alt="Perumda Air Minum Tirta Sukapura"
            class="w-full h-full object-cover"
            onerror="this.style.display='none'"
          />
        </div>
        <div class="mt-3 flex items-center justify-between text-xs text-slate-300">
          <span>Call Center 24 Jam</span>
          <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="font-semibold text-white hover:text-sky-300">
            <?= e($officeInfo['phone']) ?>
          </a>
        </div>
      </div>
    </div>

    <!-- Minimal Hairline Stats -->
    <div class="mt-14 pt-8 border-t border-white/15 grid grid-cols-2 sm:grid-cols-4 gap-6">
      <?php foreach ($heroStats as $stat): ?>
        <div>
          <div class="font-display text-2xl font-bold text-white"><?= e($stat['value']) ?></div>
          <div class="text-xs text-slate-400 mt-0.5"><?= e($stat['label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
