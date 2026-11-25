<section
  id="beranda"
  class="relative overflow-hidden hero-mesh text-white pt-14 pb-20 lg:pt-20 lg:pb-28"
>
  <div
    class="pointer-events-none absolute inset-0 opacity-[0.07]"
    style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.8) 1px, transparent 0); background-size: 32px 32px;"
  ></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-12 gap-12 lg:gap-10 items-center">
      <!-- Left Copy -->
      <div class="lg:col-span-7 space-y-7">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/15 border border-sky-400/30 text-sky-200 text-xs sm:text-sm font-medium">
          <i data-lucide="sparkles" class="w-4 h-4 text-cyan-300"></i>
          <span>Portal Resmi Air Minum Kabupaten Tasikmalaya • <?= date('Y') ?></span>
        </div>

        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.08]">
          Air Bersih Berkualitas,
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-teal-300">
            Layanan Digital
          </span>
          dalam Satu Genggaman.
        </h1>

        <p class="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed">
          Perumda Air Minum Tirta Sukapura menghadirkan pelayanan air minum yang andal,
          transparan, dan modern bagi masyarakat Kabupaten Tasikmalaya. Cek tagihan, lapor
          gangguan, catat meter mandiri, hingga daftar sambungan baru kini lebih cepat secara
          online.
        </p>

        <div class="flex flex-wrap items-center gap-3.5 pt-1">
          <a
            href="http://asindotama.com/layanantirtasukapura/"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-sm sm:text-base shadow-lg shadow-sky-500/30 transition-all hover:-translate-y-0.5"
          >
            <span>Cek Tagihan Sekarang</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>

          <a
            href="<?= e($officeInfo['simpel_url']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/20 text-white font-semibold text-sm sm:text-base backdrop-blur-sm transition-all"
          >
            <span>Daftar Pelanggan Baru</span>
          </a>
        </div>

        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 pt-2 text-xs sm:text-sm text-slate-300">
          <span class="inline-flex items-center gap-2">
            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400"></i>
            BUMD Resmi Pemkab Tasikmalaya
          </span>
          <span class="inline-flex items-center gap-2">
            <i data-lucide="droplets" class="w-4 h-4 text-cyan-300"></i>
            Sumber Mata Air Alami Terjaga
          </span>
        </div>
      </div>

      <!-- Right Interactive Quick-Access Panel -->
      <div class="lg:col-span-5">
        <div class="relative rounded-3xl bg-white/[0.07] border border-white/15 p-6 sm:p-7 backdrop-blur-xl shadow-2xl">
          <div class="flex items-center justify-between mb-5">
            <div>
              <span class="text-xs font-semibold uppercase tracking-wider text-cyan-300">
                Akses Cepat Pelanggan
              </span>
              <h2 class="font-display text-xl font-bold text-white mt-0.5">
                Layanan Prioritas Hari Ini
              </h2>
            </div>
            <div class="w-10 h-10 rounded-2xl bg-sky-500/20 border border-sky-400/30 flex items-center justify-center animate-float-slow">
              <i data-lucide="droplets" class="w-5 h-5 text-cyan-300"></i>
            </div>
          </div>

          <div class="space-y-3">
            <a
              href="http://asindotama.com/layanantirtasukapura/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
            >
              <div class="w-10 h-10 rounded-xl bg-sky-500/25 flex items-center justify-center text-sky-300 shrink-0">
                <i data-lucide="file-check-2" class="w-5 h-5"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-sm text-white">Cek Rekening &amp; Tagihan</div>
                <div class="text-xs text-slate-300 truncate">Masukkan No. Sambungan untuk lihat tagihan</div>
              </div>
              <i data-lucide="arrow-right" class="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all"></i>
            </a>

            <a
              href="http://app-tirtasukapura.com/pengaduan/ticketOnline"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
            >
              <div class="w-10 h-10 rounded-xl bg-amber-500/25 flex items-center justify-center text-amber-300 shrink-0">
                <i data-lucide="megaphone" class="w-5 h-5"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-sm text-white">Lapor Kebocoran / Gangguan</div>
                <div class="text-xs text-slate-300 truncate">Tiket pengaduan langsung ke tim teknis</div>
              </div>
              <i data-lucide="arrow-right" class="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all"></i>
            </a>

            <a
              href="http://asindotama.com/pdamtasik/cater/Catermandiri"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
            >
              <div class="w-10 h-10 rounded-xl bg-emerald-500/25 flex items-center justify-center text-emerald-300 shrink-0">
                <i data-lucide="gauge" class="w-5 h-5"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-sm text-white">Catat Meter Mandiri</div>
                <div class="text-xs text-slate-300 truncate">Kirim angka &amp; foto meter air bulanan</div>
              </div>
              <i data-lucide="arrow-right" class="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all"></i>
            </a>
          </div>

          <div class="mt-5 pt-4 border-t border-white/10 flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5">
              <span class="relative flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
              </span>
              <span class="text-xs text-slate-300">Hotline Pengaduan</span>
            </div>
            <a
              href="tel:<?= e($officeInfo['phone_clean']) ?>"
              class="inline-flex items-center gap-1.5 text-sm font-bold text-cyan-300 hover:text-white transition-colors"
            >
              <i data-lucide="phone-call" class="w-4 h-4"></i>
              <span><?= e($officeInfo['phone']) ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Stats Bar -->
    <div class="mt-14 pt-8 border-t border-white/10 grid grid-cols-2 md:grid-cols-4 gap-6">
      <?php foreach ($heroStats as $stat): ?>
        <div>
          <div class="font-display text-2xl sm:text-3xl font-extrabold text-white">
            <?= e($stat['value']) ?>
          </div>
          <div class="text-xs sm:text-sm text-slate-400 mt-1">
            <?= e($stat['label']) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
