export interface ServiceItem {
  id: string;
  title: string;
  subtitle: string;
  description: string;
  href: string;
  badge: string;
  icon: 'receipt' | 'chart' | 'megaphone' | 'search' | 'gauge' | 'userPlus';
  accent: string;
}

export interface NewsItem {
  id: string;
  title: string;
  category: 'Gangguan & Perbaikan' | 'Kinerja' | 'Pengumuman';
  date: string;
  readTime: string;
  excerpt: string;
  content: string[];
  image: string;
  href: string;
  urgent?: boolean;
}

export interface TimelineItem {
  year: string;
  title: string;
  description: string;
}

export interface ProcedureItem {
  title: string;
  summary: string;
  steps: string[];
  href: string;
}

export const OFFICE_INFO = {
  name: 'Perumda Air Minum Tirta Sukapura',
  shortName: 'Tirta Sukapura',
  region: 'Kabupaten Tasikmalaya',
  phone: '+62 821-2910-2345',
  phoneClean: '6282129102345',
  email: 'perumdatirtasukapura@gmail.com',
  hoursWeekday: "Senin – Jum'at, 08:00 – 16:00 WIB",
  hoursWeekend: 'Sabtu – Minggu: Libur (Call Center Online 24 Jam)',
  address: 'Kabupaten Tasikmalaya, Jawa Barat, Indonesia',
  simpaduUrl: 'http://app-tirtasukapura.com/',
  gisUrl: 'https://gis.app-tirtasukapura.com/',
  simpelUrl: 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
  oldSiteBase: 'https://www.perumdaairminumtirtasukapura.com',
};

export const DIGITAL_SERVICES: ServiceItem[] = [
  {
    id: 'cek-tagihan',
    title: 'Cek Tagihan Air',
    subtitle: 'Info Rekening Bulanan',
    description:
      'Pantau rincian tagihan rekening air bulanan, riwayat pembayaran, dan status keterlambatan secara instan.',
    href: 'http://asindotama.com/layanantirtasukapura/',
    badge: 'Populer',
    icon: 'receipt',
    accent: 'from-sky-500 to-blue-600',
  },
  {
    id: 'daftar-baru',
    title: 'Daftar Pelanggan Baru',
    subtitle: 'Portal SIMPEL Online',
    description:
      'Ajukan permohonan pemasangan sambungan baru rumah tangga maupun niaga secara online tanpa antre.',
    href: 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
    badge: 'Online 24/7',
    icon: 'userPlus',
    accent: 'from-cyan-500 to-teal-600',
  },
  {
    id: 'pengaduan',
    title: 'Pengaduan Pelanggan',
    subtitle: 'Tiket Laporan Online',
    description:
      'Laporkan kebocoran pipa, gangguan aliran air, atau kendala meter air langsung ke tim teknis lapangan.',
    href: 'http://app-tirtasukapura.com/pengaduan/ticketOnline',
    badge: 'Respon Cepat',
    icon: 'megaphone',
    accent: 'from-amber-500 to-orange-600',
  },
  {
    id: 'status-pengaduan',
    title: 'Lacak Status Pengaduan',
    subtitle: 'Tracking Tiket',
    description:
      'Cek progres penanganan laporan gangguan Anda secara real-time menggunakan nomor tiket pengaduan.',
    href: 'http://app-tirtasukapura.com/pengaduan/ticketTrack',
    badge: 'Real-time',
    icon: 'search',
    accent: 'from-indigo-500 to-violet-600',
  },
  {
    id: 'catat-meter',
    title: 'Catat Meter Mandiri',
    subtitle: 'Kirim Foto Stand Meter',
    description:
      'Laporkan angka stand meter air Anda secara mandiri setiap bulan untuk akurasi tagihan yang lebih baik.',
    href: 'http://asindotama.com/pdamtasik/cater/Catermandiri',
    badge: 'Mandiri',
    icon: 'gauge',
    accent: 'from-emerald-500 to-green-600',
  },
  {
    id: 'statistik',
    title: 'Statistik Pemakaian',
    subtitle: 'Grafik Konsumsi m³',
    description:
      'Analisis tren penggunaan air bulanan Anda agar lebih hemat dan dapat mendeteksi indikasi kebocoran dini.',
    href: 'http://app-tirtasukapura.com/infopelanggan-v2/Apps/statistikpel',
    badge: 'Analitik',
    icon: 'chart',
    accent: 'from-blue-600 to-indigo-700',
  },
];

export const NEWS_ITEMS: NewsItem[] = [
  {
    id: 'perbaikan-pipa-300mm',
    title: 'Pekerjaan Perbaikan Kebocoran 2 Pipa Distribusi 300 mm Telah Selesai',
    category: 'Gangguan & Perbaikan',
    date: 'Pembaruan Layanan',
    readTime: '2 mnt baca',
    urgent: false,
    excerpt:
      'Tim teknis Perumda Air Minum Tirta Sukapura telah merampungkan perbaikan 2 jalur pipa distribusi utama berdiameter 300 mm. Penormalan tekanan aliran dilakukan secara bertahap.',
    content: [
      'Pekerjaan perbaikan kebocoran pada dua jalur pipa distribusi utama berdiameter 300 mm telah selesai dilaksanakan oleh tim teknis lapangan Perumda Air Minum Tirta Sukapura.',
      'Saat ini aliran air mulai dibuka kembali dan proses pengisian jaringan serta penormalan tekanan berlangsung secara bertahap menuju wilayah pelanggan terdampak.',
      'Apabila masih ditemukan kendala aliran atau kualitas air keruh sementara saat awal pengaliran, pelanggan dapat menghubungi Call Center di +62 821-2910-2345 atau melalui layanan Pengaduan Online.',
    ],
    image: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_8019.jpg',
    href: 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pekerjaan-perbaikan-kebocoran-2-pipa-distribusi-300-mm-telah-selesai',
  },
  {
    id: 'pipa-terbawa-longsor',
    title: '2 Pipa Distribusi 300 mm Terbawa Longsor, Suplai Air ke Beberapa Wilayah Terganggu',
    category: 'Gangguan & Perbaikan',
    date: 'Info Gangguan',
    readTime: '3 mnt baca',
    urgent: true,
    excerpt:
      'Akibat pergerakan tanah dan longsor, dua jalur pipa distribusi 300 mm mengalami kerusakan. Tim darurat diterjunkan untuk percepatan pemulihan suplai air bersih.',
    content: [
      'Telah terjadi bencana longsor yang berdampak pada dua jalur pipa distribusi utama berdiameter 300 mm sehingga suplai air bersih ke beberapa wilayah layanan mengalami gangguan sementara.',
      'Tim reaksi cepat Perumda Air Minum Tirta Sukapura langsung melakukan pengamanan jalur, mobilisasi material pengganti, serta koordinasi pengiriman bantuan air bersih bagi wilayah prioritas.',
      'Kami memohon maaf atas ketidaknyamanan yang dialami pelanggan dan mengimbau untuk menampung cadangan air secukupnya selama proses perbaikan berlangsung.',
    ],
    image: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_7549.jpg',
    href: 'https://www.perumdaairminumtirtasukapura.com/berita/detail/2-pipa-distribusi-300-mm-terbawa-longsor-suplai-air-ke-beberapa-wilayah-terganggu',
  },
  {
    id: 'pencapaian-kinerja-2024',
    title: 'Pencapaian Kinerja Perumda Air Minum Tirta Sukapura',
    category: 'Kinerja',
    date: 'Laporan Kinerja',
    readTime: '4 mnt baca',
    excerpt:
      'Komitmen peningkatan cakupan pelayanan air bersih, keandalan jaringan transmisi, serta transformasi layanan digital pelanggan di Kabupaten Tasikmalaya.',
    content: [
      'Perumda Air Minum Tirta Sukapura terus meningkatkan kinerja operasional, keuangan, dan mutu pelayanan air minum bagi masyarakat Kabupaten Tasikmalaya.',
      'Berbagai inovasi digital melalui ekosistem SIMPADU — mulai dari SIMPEL pendaftaran pelanggan baru, pemetaan jaringan berbasis GIS, hingga layanan pengaduan online — dihadirkan untuk mempercepat respon pelayanan.',
      'Ke depan, perusahaan menargetkan perluasan cakupan sambungan rumah tangga serta penurunan tingkat kehilangan air (NRW) secara berkelanjutan.',
    ],
    image: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Pencapaian_Kinerja_Tahun_2024.jpg',
    href: 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pencapaian-kinerja-perumda-air-minum-tirta-sukapura-tahun-2024',
  },
  {
    id: 'info-gangguan-aliran',
    title: 'Informasi Gangguan Aliran Air & Jadwal Pengurasan Reservoir',
    category: 'Pengumuman',
    date: 'Info Pelanggan',
    readTime: '2 mnt baca',
    excerpt:
      'Pemberitahuan pemeliharaan berkala jaringan transmisi dan pengurasan bak reservoir guna menjaga kualitas, kejernihan, dan kontinuitas distribusi air minum.',
    content: [
      'Dalam rangka menjaga standar kualitas air minum agar tetap bersih dan higienis, Perumda Air Minum Tirta Sukapura secara rutin melaksanakan pengurasan reservoir dan pemeliharaan jaringan perpipaan.',
      'Pelanggan diimbau untuk selalu memantau kanal informasi resmi website dan media sosial kami guna mengetahui jadwal pemeliharaan terencana di wilayah masing-masing.',
    ],
    image: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/16_Pemberitahuan.jpg',
    href: 'https://www.perumdaairminumtirtasukapura.com/berita/detail/informasi-gangguan-aliran-air--senin-02-september-2024',
  },
];

export const HISTORY_TIMELINE: TimelineItem[] = [
  {
    year: '1925',
    title: 'Awal Pelayanan Air Bersih Tasikmalaya',
    description:
      'Pelayanan air bersih pertama kali dimulai dari sumber Mata Air Cibunigeulis (±20 L/detik) yang ditampung di Reservoir Gunung Singa berkapasitas ±400 m³ untuk 80 sambungan langganan awal.',
  },
  {
    year: '1975',
    title: 'Pendirian Resmi PDAM Tasikmalaya',
    description:
      'Pada 11 Juni 1975, PDAM Kabupaten Tasikmalaya resmi didirikan berdasarkan Peraturan Daerah Tingkat II Tasikmalaya Nomor 7 Tahun 1975.',
  },
  {
    year: '1978–1982',
    title: 'Pengembangan Mata Air Cipondok Leuwisari',
    description:
      'Pembangunan sumber Mata Air Cipondok Kecamatan Leuwisari berkapasitas potensial ±500 L/detik melalui program Six Cities Water Supply Project dari Pemerintah Pusat.',
  },
  {
    year: '1982–1984',
    title: 'Pemulihan Pascabencana Gunung Galunggung',
    description:
      'Setelah letusan Gunung Galunggung (5 April 1982) merusak 3.000 meter pipa transmisi, dilakukan rehabilitasi 2.341 meter jalur pipa Cipondok–Peuteuy Jaya hingga aliran kembali normal pada 1984.',
  },
  {
    year: '2002–Kini',
    title: 'Transformasi Perumda & Digitalisasi SIMPADU',
    description:
      'Diperkuat melalui Perda Kab. Tasikmalaya No. 24 Tahun 2002 dan bertransformasi menjadi Perumda Air Minum Tirta Sukapura dengan layanan digital modern (SIMPEL, GIS, Billing, & Catat Meter Mandiri).',
  },
];

export const WATER_SYSTEM_SPECS = [
  {
    title: 'Sumber Air Baku',
    value: 'Mata Air Alami & Sungai',
    detail:
      'Memanfaatkan sumber mata air pegunungan seperti Mata Air Cipondok (Leuwisari), Cibunigeulis, serta sumber air baku potensial di wilayah Kabupaten Tasikmalaya.',
  },
  {
    title: 'Kapasitas Produksi',
    value: '500+ Liter / Detik',
    detail:
      'Pengolahan air minum memenuhi standar kualitas kesehatan melalui instalasi pengolahan (IPA), desinfeksi terkontrol, dan uji laboratorium berkala.',
  },
  {
    title: 'Sistem Distribusi',
    value: 'Gravitasi & Perpipaan Terpadu',
    detail:
      'Jaringan pipa transmisi dan distribusi utama (hingga Ø 300 mm) yang dipantau secara digital melalui sistem GIS Perumda Tirta Sukapura.',
  },
  {
    title: 'Cakupan Pelayanan',
    value: 'Kabupaten & Kota Tasikmalaya',
    detail:
      'Melayani ribuan sambungan rumah tangga, fasilitas sosial, instansi pemerintah, hingga sektor niaga dan industri secara berkelanjutan.',
  },
];

export const CUSTOMER_PROCEDURES: ProcedureItem[] = [
  {
    title: 'Prosedur Sambungan Baru',
    summary: 'Pendaftaran pemasangan pipa & meter air untuk pelanggan baru.',
    steps: [
      'Daftar online melalui portal SIMPEL atau datang ke kantor cabang terdekat.',
      'Siapkan fotokopi KTP, Kartu Keluarga, dan denah/titik lokasi rumah.',
      'Tim teknis melakukan survei jaringan & menerbitkan RAB pemasangan.',
      'Setelah pembayaran biaya sambungan, pemasangan dilakukan sesuai jadwal.',
    ],
    href: 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
  },
  {
    title: 'Prosedur Pembayaran Rekening',
    summary: 'Kemudahan bayar tagihan air sebelum tanggal jatuh tempo setiap bulan.',
    steps: [
      'Cek nominal tagihan melalui menu Cek Tagihan Online atau aplikasi.',
      'Lakukan pembayaran via Bank BJB, BJB Syariah, BNI, Mandiri, atau PT Pos Indonesia.',
      'Simpan struk/bukti transaksi digital sebagai arsip pembayaran resmi.',
    ],
    href: 'http://asindotama.com/layanantirtasukapura/',
  },
  {
    title: 'Prosedur Bukaan Kembali & Balik Nama',
    summary: 'Pengaktifan ulang sambungan non-aktif atau perubahan identitas pelanggan.',
    steps: [
      'Ajukan permohonan tertulis di loket pelayanan dengan membawa nomor sambungan.',
      'Sertakan fotokopi KTP pemohon & bukti kepemilikan bangunan (khusus balik nama).',
      'Selesaikan administrasi tunggakan (jika ada) dan biaya penyambungan kembali.',
    ],
    href: 'https://www.perumdaairminumtirtasukapura.com/page/detail/prosedur-balik-nama',
  },
];

export const PAYMENT_PARTNERS = [
  {
    name: 'Bank BJB',
    type: 'ATM • Mobile • Teller',
    logo: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/logo-bank-bjb_169.png',
  },
  {
    name: 'Bank BJB Syariah',
    type: 'Syariah Banking',
    logo: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/bjb_syariah.png',
  },
  {
    name: 'Bank BNI',
    type: 'BNI Mobile • ATM',
    logo: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Logo_bank_BNI.png',
  },
  {
    name: 'Bank Mandiri',
    type: 'Livin’ by Mandiri',
    logo: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Bank_Mandiri_logo_2016_svg.png',
  },
  {
    name: 'Pos Indonesia',
    type: 'Pospay & Kantor Pos',
    logo: 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/POSIND_2023.png',
  },
];

export const TARIFF_PRESETS = [
  { id: 'sosial', label: 'Sosial (Tempat Ibadah / Panti)', rate1: 1800, rate2: 2400, rate3: 3200, admin: 7500 },
  { id: 'rt1', label: 'Rumah Tangga I (Sederhana)', rate1: 2800, rate2: 3800, rate3: 5200, admin: 10000 },
  { id: 'rt2', label: 'Rumah Tangga II (Menengah)', rate1: 3600, rate2: 4900, rate3: 6800, admin: 12500 },
  { id: 'niaga', label: 'Niaga / Usaha Kecil', rate1: 5800, rate2: 7500, rate3: 9800, admin: 17500 },
];
