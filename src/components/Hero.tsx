import {
  ArrowRight,
  Droplets,
  ShieldCheck,
  Sparkles,
  PhoneCall,
  FileCheck2,
  Megaphone,
  Gauge,
} from 'lucide-react';
import { OFFICE_INFO } from '../data/perumdaData';

const STATS = [
  { value: '1925', label: 'Melayani Sejak' },
  { value: '500+ L/dtk', label: 'Potensi Debit Air' },
  { value: '6 Layanan', label: 'Portal Digital 24/7' },
  { value: '5+ Bank', label: 'Mitra Pembayaran' },
];

export function Hero() {
  return (
    <section
      id="beranda"
      className="relative overflow-hidden hero-mesh text-white pt-14 pb-20 lg:pt-20 lg:pb-28"
    >
      {/* Subtle geometric water grid overlay */}
      <div
        className="pointer-events-none absolute inset-0 opacity-[0.07]"
        style={{
          backgroundImage:
            'radial-gradient(circle at 1px 1px, rgba(255,255,255,0.8) 1px, transparent 0)',
          backgroundSize: '32px 32px',
        }}
      />

      <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid lg:grid-cols-12 gap-12 lg:gap-10 items-center">
          {/* Left Copy */}
          <div className="lg:col-span-7 space-y-7">
            <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/15 border border-sky-400/30 text-sky-200 text-xs sm:text-sm font-medium">
              <Sparkles className="w-4 h-4 text-cyan-300" />
              <span>Portal Resmi Air Minum Kabupaten Tasikmalaya • 2026</span>
            </div>

            <h1 className="font-display text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.08]">
              Air Bersih Berkualitas,{' '}
              <span className="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 via-cyan-200 to-teal-300">
                Layanan Digital
              </span>{' '}
              dalam Satu Genggaman.
            </h1>

            <p className="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed">
              Perumda Air Minum Tirta Sukapura menghadirkan pelayanan air minum yang
              andal, transparan, dan modern bagi masyarakat Kabupaten Tasikmalaya. Cek
              tagihan, lapor gangguan, catat meter mandiri, hingga daftar sambungan baru
              kini lebih cepat secara online.
            </p>

            {/* Primary CTAs */}
            <div className="flex flex-wrap items-center gap-3.5 pt-1">
              <a
                href="http://asindotama.com/layanantirtasukapura/"
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-sm sm:text-base shadow-lg shadow-sky-500/30 transition-all hover:-translate-y-0.5"
              >
                <span>Cek Tagihan Sekarang</span>
                <ArrowRight className="w-4 h-4" />
              </a>

              <a
                href={OFFICE_INFO.simpelUrl}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/20 text-white font-semibold text-sm sm:text-base backdrop-blur-sm transition-all"
              >
                <span>Daftar Pelanggan Baru</span>
              </a>
            </div>

            {/* Trust badges */}
            <div className="flex flex-wrap items-center gap-x-6 gap-y-2 pt-2 text-xs sm:text-sm text-slate-300">
              <span className="inline-flex items-center gap-2">
                <ShieldCheck className="w-4 h-4 text-emerald-400" />
                BUMD Resmi Pemkab Tasikmalaya
              </span>
              <span className="inline-flex items-center gap-2">
                <Droplets className="w-4 h-4 text-cyan-300" />
                Sumber Mata Air Alami Terjaga
              </span>
            </div>
          </div>

          {/* Right Interactive Quick-Access Panel */}
          <div className="lg:col-span-5">
            <div className="relative rounded-3xl bg-white/[0.07] border border-white/15 p-6 sm:p-7 backdrop-blur-xl shadow-2xl">
              <div className="flex items-center justify-between mb-5">
                <div>
                  <span className="text-xs font-semibold uppercase tracking-wider text-cyan-300">
                    Akses Cepat Pelanggan
                  </span>
                  <h2 className="font-display text-xl font-bold text-white mt-0.5">
                    Layanan Prioritas Hari Ini
                  </h2>
                </div>
                <div className="w-10 h-10 rounded-2xl bg-sky-500/20 border border-sky-400/30 flex items-center justify-center animate-float-slow">
                  <Droplets className="w-5 h-5 text-cyan-300" />
                </div>
              </div>

              <div className="space-y-3">
                <a
                  href="http://asindotama.com/layanantirtasukapura/"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
                >
                  <div className="w-10 h-10 rounded-xl bg-sky-500/25 flex items-center justify-center text-sky-300 shrink-0">
                    <FileCheck2 className="w-5 h-5" />
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="font-semibold text-sm text-white">Cek Rekening & Tagihan</div>
                    <div className="text-xs text-slate-300 truncate">
                      Masukkan No. Sambungan untuk lihat tagihan
                    </div>
                  </div>
                  <ArrowRight className="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all" />
                </a>

                <a
                  href="http://app-tirtasukapura.com/pengaduan/ticketOnline"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
                >
                  <div className="w-10 h-10 rounded-xl bg-amber-500/25 flex items-center justify-center text-amber-300 shrink-0">
                    <Megaphone className="w-5 h-5" />
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="font-semibold text-sm text-white">Lapor Kebocoran / Gangguan</div>
                    <div className="text-xs text-slate-300 truncate">
                      Tiket pengaduan langsung ke tim teknis
                    </div>
                  </div>
                  <ArrowRight className="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all" />
                </a>

                <a
                  href="http://asindotama.com/pdamtasik/cater/Catermandiri"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/10 transition-all group"
                >
                  <div className="w-10 h-10 rounded-xl bg-emerald-500/25 flex items-center justify-center text-emerald-300 shrink-0">
                    <Gauge className="w-5 h-5" />
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="font-semibold text-sm text-white">Catat Meter Mandiri</div>
                    <div className="text-xs text-slate-300 truncate">
                      Kirim angka & foto meter air bulanan
                    </div>
                  </div>
                  <ArrowRight className="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-1 transition-all" />
                </a>
              </div>

              {/* Emergency Hotline Footer */}
              <div className="mt-5 pt-4 border-t border-white/10 flex items-center justify-between gap-3">
                <div className="flex items-center gap-2.5">
                  <span className="relative flex h-2.5 w-2.5">
                    <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75" />
                    <span className="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400" />
                  </span>
                  <span className="text-xs text-slate-300">Hotline Pengaduan</span>
                </div>
                <a
                  href={`tel:${OFFICE_INFO.phoneClean}`}
                  className="inline-flex items-center gap-1.5 text-sm font-bold text-cyan-300 hover:text-white transition-colors"
                >
                  <PhoneCall className="w-4 h-4" />
                  <span>{OFFICE_INFO.phone}</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        {/* Bottom Stats Bar */}
        <div className="mt-14 pt-8 border-t border-white/10 grid grid-cols-2 md:grid-cols-4 gap-6">
          {STATS.map((stat) => (
            <div key={stat.label}>
              <div className="font-display text-2xl sm:text-3xl font-extrabold text-white">
                {stat.value}
              </div>
              <div className="text-xs sm:text-sm text-slate-400 mt-1">{stat.label}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
