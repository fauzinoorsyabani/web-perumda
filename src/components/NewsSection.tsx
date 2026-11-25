import { useState } from 'react';
import {
  Newspaper,
  AlertTriangle,
  Clock,
  ArrowRight,
  X,
  ExternalLink,
} from 'lucide-react';
import { NEWS_ITEMS, OFFICE_INFO, type NewsItem } from '../data/perumdaData';

const CATEGORIES = ['Semua', 'Gangguan & Perbaikan', 'Kinerja', 'Pengumuman'] as const;

export function NewsSection() {
  const [filter, setFilter] = useState<(typeof CATEGORIES)[number]>('Semua');
  const [selectedNews, setSelectedNews] = useState<NewsItem | null>(null);

  const filtered =
    filter === 'Semua'
      ? NEWS_ITEMS
      : NEWS_ITEMS.filter((item) => item.category === filter);

  return (
    <section id="berita" className="py-20 lg:py-24 bg-slate-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header + Filter */}
        <div className="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
          <div className="max-w-2xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold uppercase tracking-wider">
              <Newspaper className="w-3.5 h-3.5" />
              <span>Berita & Info Pelanggan</span>
            </span>
            <h2 className="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
              Kabar Terbaru & Informasi Gangguan Aliran
            </h2>
          </div>

          <div className="flex flex-wrap gap-2">
            {CATEGORIES.map((cat) => (
              <button
                key={cat}
                type="button"
                onClick={() => setFilter(cat)}
                className={`px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all ${
                  filter === cat
                    ? 'bg-sky-600 text-white shadow-sm'
                    : 'bg-white text-slate-600 border border-slate-200 hover:border-sky-300'
                }`}
              >
                {cat}
              </button>
            ))}
          </div>
        </div>

        {/* Cards Grid */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          {filtered.map((item) => (
            <article
              key={item.id}
              onClick={() => setSelectedNews(item)}
              className="group cursor-pointer rounded-3xl bg-white border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl hover:border-sky-300 transition-all duration-300 flex flex-col"
            >
              <div className="relative h-44 bg-gradient-to-br from-sky-900 to-slate-900 overflow-hidden">
                <img
                  src={item.image}
                  alt={item.title}
                  loading="lazy"
                  className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  onError={(e) => {
                    e.currentTarget.style.display = 'none';
                  }}
                />
                <div className="absolute top-3 left-3 flex items-center gap-1.5">
                  <span
                    className={`inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold backdrop-blur-md ${
                      item.urgent
                        ? 'bg-amber-500 text-slate-950'
                        : 'bg-slate-900/75 text-white'
                    }`}
                  >
                    {item.urgent && <AlertTriangle className="w-3 h-3" />}
                    {item.category}
                  </span>
                </div>
              </div>

              <div className="p-5 flex-1 flex flex-col justify-between">
                <div>
                  <div className="flex items-center gap-3 text-xs text-slate-500 mb-2">
                    <span>{item.date}</span>
                    <span>•</span>
                    <span className="inline-flex items-center gap-1">
                      <Clock className="w-3 h-3" />
                      {item.readTime}
                    </span>
                  </div>
                  <h3 className="font-display font-bold text-slate-900 text-base leading-snug group-hover:text-sky-700 transition-colors line-clamp-3">
                    {item.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600 mt-2.5 line-clamp-3 leading-relaxed">
                    {item.excerpt}
                  </p>
                </div>

                <div className="mt-4 pt-3 border-t border-slate-100 inline-flex items-center gap-1.5 text-xs font-bold text-sky-700">
                  <span>Baca Selengkapnya</span>
                  <ArrowRight className="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" />
                </div>
              </div>
            </article>
          ))}
        </div>

        {/* All News External Button */}
        <div className="mt-10 text-center">
          <a
            href={`${OFFICE_INFO.oldSiteBase}/berita`}
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-slate-200 hover:border-sky-300 text-slate-800 hover:text-sky-700 font-semibold text-sm shadow-xs transition-all"
          >
            <span>Lihat Arsip Semua Berita</span>
            <ExternalLink className="w-4 h-4" />
          </a>
        </div>
      </div>

      {/* Article Reader Modal */}
      {selectedNews && (
        <div
          className="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4"
          onClick={() => setSelectedNews(null)}
        >
          <div
            className="bg-white rounded-3xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl border border-slate-200"
            onClick={(e) => e.stopPropagation()}
          >
            <div className="relative h-56 bg-slate-900">
              <img
                src={selectedNews.image}
                alt={selectedNews.title}
                className="w-full h-full object-cover"
                onError={(e) => {
                  e.currentTarget.style.display = 'none';
                }}
              />
              <button
                type="button"
                onClick={() => setSelectedNews(null)}
                className="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-900/75 hover:bg-slate-900 text-white flex items-center justify-center transition-colors"
                aria-label="Tutup berita"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
            <div className="p-6 sm:p-8 space-y-4">
              <span className="inline-block px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold">
                {selectedNews.category}
              </span>
              <h3 className="font-display text-2xl font-extrabold text-slate-900 leading-snug">
                {selectedNews.title}
              </h3>
              <div className="space-y-3 text-sm sm:text-base text-slate-600 leading-relaxed">
                {selectedNews.content.map((p) => (
                  <p key={p}>{p}</p>
                ))}
              </div>
              <div className="pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                <a
                  href={selectedNews.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-800"
                >
                  <span>Buka di Portal Asli</span>
                  <ExternalLink className="w-4 h-4" />
                </a>
                <button
                  type="button"
                  onClick={() => setSelectedNews(null)}
                  className="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-sm font-semibold"
                >
                  Tutup
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
    </section>
  );
}
