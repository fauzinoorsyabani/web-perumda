import {
  Phone,
  Mail,
  Clock,
  MapPin,
  LayoutGrid,
  Map,
  ExternalLink,
  Building2,
} from 'lucide-react';
import { OFFICE_INFO, PAYMENT_PARTNERS } from '../data/perumdaData';

export function PartnersAndContact() {
  return (
    <>
      {/* Payment Partners & Ecosystem Banner */}
      <section className="py-16 lg:py-20 bg-white border-t border-slate-200/70">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-2xl mx-auto mb-10">
            <span className="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider">
              Mitra Pembayaran Resmi
            </span>
            <h2 className="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3">
              Bayar Tagihan Air Lebih Praktis di Berbagai Kanal
            </h2>
          </div>

          <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            {PAYMENT_PARTNERS.map((partner) => (
              <div
                key={partner.name}
                className="rounded-2xl bg-slate-50 border border-slate-200/80 p-5 flex flex-col items-center justify-center text-center hover:bg-white hover:border-sky-300 hover:shadow-md transition-all"
              >
                <div className="h-12 flex items-center justify-center mb-3">
                  <img
                    src={partner.logo}
                    alt={partner.name}
                    loading="lazy"
                    className="max-h-10 max-w-[120px] object-contain"
                    onError={(e) => {
                      e.currentTarget.style.display = 'none';
                    }}
                  />
                </div>
                <div className="font-semibold text-sm text-slate-900">{partner.name}</div>
                <div className="text-[11px] text-slate-500 mt-0.5">{partner.type}</div>
              </div>
            ))}
          </div>

          {/* Internal & GIS Ecosystem Strip */}
          <div className="mt-12 rounded-3xl bg-gradient-to-r from-sky-600 to-cyan-600 text-white p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-lg shadow-sky-600/20">
            <div className="space-y-1.5">
              <div className="text-xs font-bold uppercase tracking-wider text-sky-100">
                Ekosistem Digital Internal & Geospasial
              </div>
              <h3 className="font-display text-xl sm:text-2xl font-extrabold">
                Akses Portal SIMPADU & Peta Jaringan GIS
              </h3>
              <p className="text-sm text-sky-100 max-w-xl">
                Terintegrasi dengan Launcher SIMPADU (Billing, Monitoring, Baca Meter,
                Kepegawaian, Manajemen Aset) dan GIS Perumda Tirta Sukapura.
              </p>
            </div>
            <div className="flex flex-wrap gap-3 shrink-0">
              <a
                href={OFFICE_INFO.simpaduUrl}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-sky-800 hover:bg-sky-50 font-bold text-sm transition-colors"
              >
                <LayoutGrid className="w-4 h-4" />
                <span>Launcher SIMPADU</span>
                <ExternalLink className="w-3.5 h-3.5" />
              </a>
              <a
                href={OFFICE_INFO.gisUrl}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-sky-900/40 hover:bg-sky-900/60 border border-white/25 text-white font-semibold text-sm transition-colors"
              >
                <Map className="w-4 h-4" />
                <span>Portal GIS</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      {/* Contact & Footer */}
      <footer id="kontak" className="bg-slate-950 text-slate-300 pt-16 pb-10">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-slate-800">
            {/* Brand */}
            <div className="lg:col-span-4 space-y-4">
              <div className="flex items-center gap-3">
                <img
                  src="/images/logo-perumda.png"
                  alt="Perumda Tirta Sukapura"
                  className="h-11 w-auto object-contain bg-white/95 rounded-xl p-1.5"
                  onError={(e) => {
                    e.currentTarget.style.display = 'none';
                  }}
                />
                <div>
                  <div className="font-display font-extrabold text-white text-base">
                    Perumda Tirta Sukapura
                  </div>
                  <div className="text-xs text-sky-400">Kabupaten Tasikmalaya</div>
                </div>
              </div>
              <p className="text-sm text-slate-400 leading-relaxed">
                Perusahaan Umum Daerah Air Minum Tirta Sukapura Kabupaten Tasikmalaya.
                Berkomitmen menghadirkan air bersih berkualitas dan pelayanan pelanggan
                modern berbasis teknologi.
              </p>
              <div className="inline-flex items-center gap-2 text-xs text-slate-400 bg-slate-900 border border-slate-800 px-3 py-2 rounded-xl">
                <Building2 className="w-4 h-4 text-sky-400" />
                <span>Didukung oleh Pemerintah Daerah Kabupaten Tasikmalaya</span>
              </div>
            </div>

            {/* Contact Info */}
            <div className="lg:col-span-4 space-y-4">
              <h4 className="font-display font-bold text-white text-sm uppercase tracking-wider">
                Kontak Kami
              </h4>
              <ul className="space-y-3 text-sm">
                <li className="flex items-start gap-3">
                  <Phone className="w-4 h-4 text-sky-400 shrink-0 mt-1" />
                  <div>
                    <div className="text-slate-400 text-xs">Call Center / WhatsApp</div>
                    <a
                      href={`tel:${OFFICE_INFO.phoneClean}`}
                      className="text-white font-semibold hover:text-sky-400 transition-colors"
                    >
                      {OFFICE_INFO.phone}
                    </a>
                  </div>
                </li>
                <li className="flex items-start gap-3">
                  <Mail className="w-4 h-4 text-sky-400 shrink-0 mt-1" />
                  <div>
                    <div className="text-slate-400 text-xs">Email Resmi</div>
                    <a
                      href={`mailto:${OFFICE_INFO.email}`}
                      className="text-white font-semibold hover:text-sky-400 transition-colors"
                    >
                      {OFFICE_INFO.email}
                    </a>
                  </div>
                </li>
                <li className="flex items-start gap-3">
                  <MapPin className="w-4 h-4 text-sky-400 shrink-0 mt-1" />
                  <div>
                    <div className="text-slate-400 text-xs">Wilayah Layanan</div>
                    <div className="text-slate-200">{OFFICE_INFO.address}</div>
                  </div>
                </li>
              </ul>
            </div>

            {/* Working Hours & Quick Links */}
            <div className="lg:col-span-4 space-y-4">
              <h4 className="font-display font-bold text-white text-sm uppercase tracking-wider">
                Jam Kerja Pelayanan
              </h4>
              <div className="rounded-2xl bg-slate-900 border border-slate-800 p-4 space-y-2.5 text-sm">
                <div className="flex items-center gap-2 text-sky-400 font-semibold">
                  <Clock className="w-4 h-4" />
                  <span>Loket Kantor</span>
                </div>
                <div className="flex justify-between text-slate-300">
                  <span>Senin – Jum'at</span>
                  <span className="font-semibold text-white">08:00 – 16:00 WIB</span>
                </div>
                <div className="flex justify-between text-slate-400">
                  <span>Sabtu – Minggu</span>
                  <span>Libur</span>
                </div>
              </div>
              <div className="flex flex-wrap gap-x-4 gap-y-2 text-xs text-slate-400 pt-1">
                <a href="#layanan" className="hover:text-sky-400 transition-colors">
                  Layanan Digital
                </a>
                <a href="#kalkulator" className="hover:text-sky-400 transition-colors">
                  Kalkulator Tarif
                </a>
                <a href="#profil" className="hover:text-sky-400 transition-colors">
                  Profil Perusahaan
                </a>
                <a href="#berita" className="hover:text-sky-400 transition-colors">
                  Berita & Info
                </a>
              </div>
            </div>
          </div>

          <div className="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
            <p>
              © {new Date().getFullYear()} PERUMDA AIR MINUM TIRTA SUKAPURA KABUPATEN
              TASIKMALAYA. All rights reserved.
            </p>
            <p>Modern Redesign • React + TypeScript + Tailwind CSS</p>
          </div>
        </div>
      </footer>
    </>
  );
}
