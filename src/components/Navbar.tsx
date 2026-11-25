import { useState } from 'react';
import {
  Phone,
  Mail,
  Clock,
  Menu,
  X,
  ExternalLink,
  Droplets,
  LayoutGrid,
} from 'lucide-react';
import { OFFICE_INFO } from '../data/perumdaData';

const NAV_LINKS = [
  { label: 'Beranda', href: '#beranda' },
  { label: 'Layanan', href: '#layanan' },
  { label: 'Kalkulator Tarif', href: '#kalkulator' },
  { label: 'Profil & Air Minum', href: '#profil' },
  { label: 'Berita & Info', href: '#berita' },
  { label: 'Mitra & Kontak', href: '#kontak' },
];

export function Navbar() {
  const [mobileOpen, setMobileOpen] = useState(false);

  return (
    <header className="sticky top-0 z-50 w-full">
      {/* Top Utility Bar */}
      <div className="bg-slate-950 text-slate-300 text-xs border-b border-slate-800/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-wrap items-center justify-between gap-2">
          <div className="flex flex-wrap items-center gap-x-5 gap-y-1">
            <a
              href={`tel:${OFFICE_INFO.phoneClean}`}
              className="inline-flex items-center gap-1.5 hover:text-sky-400 transition-colors font-medium"
            >
              <Phone className="w-3.5 h-3.5 text-sky-400" />
              <span>Call Center: {OFFICE_INFO.phone}</span>
            </a>
            <a
              href={`mailto:${OFFICE_INFO.email}`}
              className="hidden sm:inline-flex items-center gap-1.5 hover:text-sky-400 transition-colors"
            >
              <Mail className="w-3.5 h-3.5 text-sky-400" />
              <span>{OFFICE_INFO.email}</span>
            </a>
            <span className="hidden md:inline-flex items-center gap-1.5 text-slate-400">
              <Clock className="w-3.5 h-3.5 text-sky-400" />
              <span>{OFFICE_INFO.hoursWeekday}</span>
            </span>
          </div>

          <a
            href={OFFICE_INFO.simpaduUrl}
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center gap-1.5 text-sky-300 hover:text-white font-medium transition-colors"
          >
            <LayoutGrid className="w-3.5 h-3.5" />
            <span>Launcher SIMPADU</span>
            <ExternalLink className="w-3 h-3" />
          </a>
        </div>
      </div>

      {/* Main Glass Navbar */}
      <nav className="glass-nav border-b border-slate-200/80 shadow-xs">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
          {/* Brand */}
          <a href="#beranda" className="flex items-center gap-3 group shrink-0">
            <img
              src="/images/logo-perumda.png"
              alt="Logo Perumda Air Minum Tirta Sukapura"
              className="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
              onError={(e) => {
                e.currentTarget.style.display = 'none';
              }}
            />
            <div className="hidden sm:block leading-tight">
              <div className="font-display font-extrabold text-slate-900 text-sm tracking-tight">
                PERUMDA TIRTA SUKAPURA
              </div>
              <div className="text-[11px] font-medium text-sky-700">
                Kabupaten Tasikmalaya
              </div>
            </div>
          </a>

          {/* Desktop Links */}
          <div className="hidden lg:flex items-center gap-1">
            {NAV_LINKS.map((item) => (
              <a
                key={item.href}
                href={item.href}
                className="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-sky-700 hover:bg-sky-50/80 transition-colors"
              >
                {item.label}
              </a>
            ))}
          </div>

          {/* Desktop CTA */}
          <div className="hidden md:flex items-center gap-2.5">
            <a
              href="http://asindotama.com/layanantirtasukapura/"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold shadow-sm shadow-sky-600/25 transition-all hover:-translate-y-0.5"
            >
              <Droplets className="w-4 h-4" />
              <span>Cek Tagihan</span>
            </a>
          </div>

          {/* Mobile Hamburger */}
          <button
            type="button"
            onClick={() => setMobileOpen((prev) => !prev)}
            className="lg:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100 transition-colors"
            aria-label="Buka menu navigasi"
          >
            {mobileOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>

        {/* Mobile Menu */}
        {mobileOpen && (
          <div className="lg:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-1 shadow-lg">
            {NAV_LINKS.map((item) => (
              <a
                key={item.href}
                href={item.href}
                onClick={() => setMobileOpen(false)}
                className="block px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors"
              >
                {item.label}
              </a>
            ))}
            <div className="pt-3 mt-2 border-t border-slate-100 flex flex-col gap-2">
              <a
                href="http://asindotama.com/layanantirtasukapura/"
                target="_blank"
                rel="noopener noreferrer"
                className="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-sky-600 text-white text-sm font-semibold"
              >
                <Droplets className="w-4 h-4" />
                <span>Cek Tagihan Air</span>
              </a>
              <a
                href={OFFICE_INFO.simpaduUrl}
                target="_blank"
                rel="noopener noreferrer"
                className="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 text-slate-800 text-sm font-semibold"
              >
                <LayoutGrid className="w-4 h-4" />
                <span>Launcher SIMPADU</span>
              </a>
            </div>
          </div>
        )}
      </nav>
    </header>
  );
}
