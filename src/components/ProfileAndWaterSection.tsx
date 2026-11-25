import { useState } from 'react';
import {
  History,
  Target,
  Droplets,
  ClipboardList,
  CheckCircle2,
  ArrowUpRight,
} from 'lucide-react';
import {
  HISTORY_TIMELINE,
  WATER_SYSTEM_SPECS,
  CUSTOMER_PROCEDURES,
} from '../data/perumdaData';

type TabKey = 'sejarah' | 'visimisi' | 'airminum' | 'prosedur';

const TABS: { key: TabKey; label: string; icon: typeof History }[] = [
  { key: 'sejarah', label: 'Sejarah Singkat', icon: History },
  { key: 'visimisi', label: 'Visi & Misi', icon: Target },
  { key: 'airminum', label: 'Sistem Air Minum', icon: Droplets },
  { key: 'prosedur', label: 'Prosedur Pelanggan', icon: ClipboardList },
];

export function ProfileAndWaterSection() {
  const [activeTab, setActiveTab] = useState<TabKey>('sejarah');

  return (
    <section id="profil" className="py-20 lg:py-24 bg-white border-y border-slate-200/70">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10">
          <div className="max-w-2xl">
            <span className="inline-flex items-center px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 text-xs font-bold uppercase tracking-wider">
              Profil & Operasional
            </span>
            <h2 className="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
              Mengenal Perumda Air Minum Tirta Sukapura
            </h2>
            <p className="text-slate-600 mt-2.5 text-base">
              Lebih dari satu abad mengabdi menyediakan air bersih untuk masyarakat
              Tasikmalaya dengan tata kelola yang profesional.
            </p>
          </div>

          {/* Tab Controls */}
          <div className="flex flex-wrap gap-2 bg-slate-100 p-1.5 rounded-2xl">
            {TABS.map((tab) => {
              const Icon = tab.icon;
              const isActive = activeTab === tab.key;
              return (
                <button
                  key={tab.key}
                  type="button"
                  onClick={() => setActiveTab(tab.key)}
                  className={`inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all ${
                    isActive
                      ? 'bg-white text-sky-700 shadow-sm'
                      : 'text-slate-600 hover:text-slate-900'
                  }`}
                >
                  <Icon className="w-4 h-4" />
                  <span>{tab.label}</span>
                </button>
              );
            })}
          </div>
        </div>

        {/* Tab Panel: Sejarah */}
        {activeTab === 'sejarah' && (
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {HISTORY_TIMELINE.map((item, idx) => (
              <div
                key={item.year}
                className={`rounded-3xl p-6 border transition-all ${
                  idx === HISTORY_TIMELINE.length - 1
                    ? 'bg-gradient-to-br from-sky-50 to-cyan-50 border-sky-200 md:col-span-2 lg:col-span-2'
                    : 'bg-slate-50/70 border-slate-200/80 hover:border-sky-200'
                }`}
              >
                <span className="inline-block px-3 py-1 rounded-full bg-sky-600 text-white text-xs font-bold">
                  {item.year}
                </span>
                <h3 className="font-display text-lg font-bold text-slate-900 mt-4">
                  {item.title}
                </h3>
                <p className="text-sm text-slate-600 mt-2 leading-relaxed">
                  {item.description}
                </p>
              </div>
            ))}
          </div>
        )}

        {/* Tab Panel: Visi & Misi */}
        {activeTab === 'visimisi' && (
          <div className="grid lg:grid-cols-12 gap-6">
            <div className="lg:col-span-5 rounded-3xl bg-gradient-to-br from-sky-700 to-cyan-700 text-white p-8 flex flex-col justify-between">
              <div>
                <span className="text-xs font-bold uppercase tracking-widest text-cyan-200">
                  Visi Perusahaan
                </span>
                <h3 className="font-display text-2xl sm:text-3xl font-extrabold mt-3 leading-snug">
                  Menjadi Perusahaan Daerah Air Minum yang Unggul, Mandiri, dan Terpercaya
                  dalam Pelayanan Air Minum di Kabupaten Tasikmalaya.
                </h3>
              </div>
              <p className="text-sm text-sky-100 mt-6 pt-5 border-t border-white/15">
                Didukung penuh oleh Pemerintah Daerah Kabupaten Tasikmalaya untuk
                kesejahteraan dan kesehatan masyarakat.
              </p>
            </div>

            <div className="lg:col-span-7 rounded-3xl bg-slate-50 border border-slate-200/80 p-8">
              <span className="text-xs font-bold uppercase tracking-widest text-sky-700">
                Misi Utama
              </span>
              <h3 className="font-display text-xl font-bold text-slate-900 mt-2 mb-5">
                Langkah Strategis Pelayanan Air Bersih
              </h3>
              <ul className="space-y-4">
                {[
                  'Meningkatkan kualitas, kuantitas, dan kontinuitas distribusi air minum sesuai standar kesehatan.',
                  'Memperluas cakupan pelayanan sambungan air bersih ke seluruh wilayah potensial di Kabupaten Tasikmalaya.',
                  'Mengoptimalkan tata kelola perusahaan berbasis transparansi, efisiensi, dan digitalisasi layanan (SIMPADU & GIS).',
                  'Meningkatkan kepuasan pelanggan melalui respon pengaduan yang cepat dan kemudahan pembayaran modern.',
                  'Menjaga kelestarian sumber mata air baku secara berkelanjutan bersama pemerintah daerah dan masyarakat.',
                ].map((misi) => (
                  <li key={misi} className="flex items-start gap-3 text-sm sm:text-base text-slate-700">
                    <CheckCircle2 className="w-5 h-5 text-sky-600 shrink-0 mt-0.5" />
                    <span>{misi}</span>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        )}

        {/* Tab Panel: Sistem Air Minum */}
        {activeTab === 'airminum' && (
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {WATER_SYSTEM_SPECS.map((spec) => (
              <div
                key={spec.title}
                className="rounded-3xl bg-slate-50 border border-slate-200/80 p-6 hover:border-sky-300 transition-colors"
              >
                <div className="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center mb-4">
                  <Droplets className="w-5 h-5" />
                </div>
                <div className="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  {spec.title}
                </div>
                <div className="font-display text-lg font-extrabold text-slate-900 mt-1">
                  {spec.value}
                </div>
                <p className="text-sm text-slate-600 mt-3 leading-relaxed">{spec.detail}</p>
              </div>
            ))}
          </div>
        )}

        {/* Tab Panel: Prosedur Pelanggan */}
        {activeTab === 'prosedur' && (
          <div className="grid lg:grid-cols-3 gap-6">
            {CUSTOMER_PROCEDURES.map((proc) => (
              <div
                key={proc.title}
                className="rounded-3xl bg-slate-50 border border-slate-200/80 p-6 flex flex-col justify-between"
              >
                <div>
                  <h3 className="font-display text-xl font-bold text-slate-900">
                    {proc.title}
                  </h3>
                  <p className="text-sm text-slate-600 mt-1.5">{proc.summary}</p>
                  <ol className="mt-5 space-y-3">
                    {proc.steps.map((step, i) => (
                      <li key={step} className="flex items-start gap-3 text-sm text-slate-700">
                        <span className="w-6 h-6 rounded-full bg-sky-100 text-sky-700 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">
                          {i + 1}
                        </span>
                        <span>{step}</span>
                      </li>
                    ))}
                  </ol>
                </div>

                <a
                  href={proc.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="mt-6 pt-4 border-t border-slate-200 inline-flex items-center justify-between text-sm font-semibold text-sky-700 hover:text-sky-800"
                >
                  <span>Akses Layanan Terkait</span>
                  <ArrowUpRight className="w-4 h-4" />
                </a>
              </div>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
