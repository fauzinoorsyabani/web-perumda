import { useState } from 'react';
import {
  Receipt,
  BarChart3,
  Megaphone,
  SearchCheck,
  Gauge,
  UserPlus,
  ArrowUpRight,
  Calculator,
  Info,
} from 'lucide-react';
import { DIGITAL_SERVICES, TARIFF_PRESETS, type ServiceItem } from '../data/perumdaData';

const ICON_MAP: Record<ServiceItem['icon'], typeof Receipt> = {
  receipt: Receipt,
  chart: BarChart3,
  megaphone: Megaphone,
  search: SearchCheck,
  gauge: Gauge,
  userPlus: UserPlus,
};

function formatRupiah(amount: number) {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    maximumFractionDigits: 0,
  }).format(amount);
}

export function ServicesSection() {
  const [selectedTariff, setSelectedTariff] = useState(TARIFF_PRESETS[1].id);
  const [cubicMeters, setCubicMeters] = useState(20);

  const tariff = TARIFF_PRESETS.find((t) => t.id === selectedTariff) ?? TARIFF_PRESETS[1];

  // Progressive tiered water bill simulation (0-10 m³, 11-20 m³, >20 m³)
  const tier1 = Math.min(cubicMeters, 10);
  const tier2 = Math.min(Math.max(cubicMeters - 10, 0), 10);
  const tier3 = Math.max(cubicMeters - 20, 0);
  const usageCost = tier1 * tariff.rate1 + tier2 * tariff.rate2 + tier3 * tariff.rate3;
  const totalEstimate = usageCost + tariff.admin;

  return (
    <section id="layanan" className="py-20 lg:py-24 bg-slate-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <div className="max-w-2xl mb-12">
          <span className="inline-flex items-center px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold uppercase tracking-wider">
            Layanan Digital Pelanggan
          </span>
          <h2 className="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
            Semua Kebutuhan Pelanggan, Lebih Cepat & Transparan
          </h2>
          <p className="text-slate-600 mt-3 text-base leading-relaxed">
            Akses langsung 6 layanan online resmi Perumda Air Minum Tirta Sukapura tanpa
            harus datang ke loket kantor.
          </p>
        </div>

        {/* 6 Bento Service Cards */}
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {DIGITAL_SERVICES.map((service) => {
            const Icon = ICON_MAP[service.icon];
            return (
              <a
                key={service.id}
                href={service.href}
                target="_blank"
                rel="noopener noreferrer"
                className="group relative flex flex-col justify-between rounded-3xl bg-white p-6 sm:p-7 border border-slate-200/80 shadow-xs hover:shadow-xl hover:shadow-sky-900/5 hover:border-sky-300 transition-all duration-300 hover:-translate-y-1"
              >
                <div>
                  <div className="flex items-start justify-between gap-4 mb-5">
                    <div
                      className={`w-12 h-12 rounded-2xl bg-gradient-to-br ${service.accent} text-white flex items-center justify-center shadow-md`}
                    >
                      <Icon className="w-6 h-6" />
                    </div>
                    <span className="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">
                      {service.badge}
                    </span>
                  </div>

                  <div className="text-xs font-semibold text-sky-700 uppercase tracking-wide">
                    {service.subtitle}
                  </div>
                  <h3 className="font-display text-xl font-bold text-slate-900 mt-1 group-hover:text-sky-700 transition-colors">
                    {service.title}
                  </h3>
                  <p className="text-sm text-slate-600 mt-2.5 leading-relaxed">
                    {service.description}
                  </p>
                </div>

                <div className="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-sm font-semibold text-sky-700">
                  <span>Buka Layanan</span>
                  <ArrowUpRight className="w-4 h-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" />
                </div>
              </a>
            );
          })}
        </div>

        {/* Interactive Water Bill Simulator */}
        <div
          id="kalkulator"
          className="mt-16 rounded-3xl bg-gradient-to-br from-slate-900 via-sky-950 to-slate-900 text-white p-6 sm:p-10 shadow-2xl border border-slate-800"
        >
          <div className="grid lg:grid-cols-12 gap-8 lg:gap-10 items-center">
            <div className="lg:col-span-7 space-y-6">
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-semibold">
                <Calculator className="w-3.5 h-3.5" />
                <span>Fitur Baru 2026 • Simulasi Tagihan</span>
              </div>

              <div>
                <h3 className="font-display text-2xl sm:text-3xl font-extrabold">
                  Kalkulator Estimasi Rekening Air
                </h3>
                <p className="text-slate-300 text-sm sm:text-base mt-2">
                  Perkirakan biaya pemakaian air bulanan Anda berdasarkan golongan pelanggan
                  dan volume kubikasi (m³).
                </p>
              </div>

              {/* Golongan selector */}
              <div>
                <label className="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2.5">
                  Pilih Golongan Pelanggan
                </label>
                <div className="grid sm:grid-cols-2 gap-2.5">
                  {TARIFF_PRESETS.map((preset) => (
                    <button
                      key={preset.id}
                      type="button"
                      onClick={() => setSelectedTariff(preset.id)}
                      className={`text-left px-4 py-3 rounded-xl text-sm font-medium border transition-all ${
                        selectedTariff === preset.id
                          ? 'bg-sky-500/20 border-sky-400 text-white shadow-sm'
                          : 'bg-white/5 border-white/10 text-slate-300 hover:bg-white/10'
                      }`}
                    >
                      {preset.label}
                    </button>
                  ))}
                </div>
              </div>

              {/* Slider */}
              <div>
                <div className="flex items-center justify-between mb-2">
                  <label
                    htmlFor="cubic-range"
                    className="text-xs font-semibold uppercase tracking-wider text-slate-400"
                  >
                    Perkiraan Pemakaian Air
                  </label>
                  <span className="font-display text-xl font-extrabold text-cyan-300">
                    {cubicMeters} m³
                  </span>
                </div>
                <input
                  id="cubic-range"
                  type="range"
                  min={5}
                  max={60}
                  step={1}
                  value={cubicMeters}
                  onChange={(e) => setCubicMeters(Number(e.target.value))}
                  className="w-full h-2.5 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-sky-400"
                />
                <div className="flex justify-between text-[11px] text-slate-400 mt-1.5">
                  <span>5 m³ (Hemat)</span>
                  <span>20 m³ (Rata-rata Keluarga)</span>
                  <span>60 m³ (Tinggi)</span>
                </div>
              </div>
            </div>

            {/* Result Card */}
            <div className="lg:col-span-5">
              <div className="rounded-2xl bg-white/10 border border-white/15 p-6 backdrop-blur-md space-y-4">
                <div className="text-xs font-semibold uppercase tracking-wider text-cyan-300">
                  Estimasi Tagihan Bulanan
                </div>
                <div className="font-display text-3xl sm:text-4xl font-extrabold text-white">
                  {formatRupiah(totalEstimate)}
                </div>

                <div className="space-y-2 pt-3 border-t border-white/10 text-xs sm:text-sm text-slate-300">
                  <div className="flex justify-between">
                    <span>Blok I (0–10 m³: {tier1} m³)</span>
                    <span className="font-medium text-white">
                      {formatRupiah(tier1 * tariff.rate1)}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>Blok II (11–20 m³: {tier2} m³)</span>
                    <span className="font-medium text-white">
                      {formatRupiah(tier2 * tariff.rate2)}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>Blok III (&gt;20 m³: {tier3} m³)</span>
                    <span className="font-medium text-white">
                      {formatRupiah(tier3 * tariff.rate3)}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>Biaya Beban / Administrasi</span>
                    <span className="font-medium text-white">
                      {formatRupiah(tariff.admin)}
                    </span>
                  </div>
                </div>

                <div className="flex items-start gap-2 pt-3 border-t border-white/10 text-[11px] text-slate-400 leading-relaxed">
                  <Info className="w-4 h-4 text-sky-400 shrink-0 mt-0.5" />
                  <span>
                    Angka di atas adalah simulasi estimasi. Untuk tagihan resmi sesuai
                    SK Tarif Perda terbaru, silakan gunakan menu{' '}
                    <a
                      href="http://asindotama.com/layanantirtasukapura/"
                      target="_blank"
                      rel="noopener noreferrer"
                      className="text-sky-300 underline hover:text-white"
                    >
                      Cek Tagihan Resmi
                    </a>
                    .
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
