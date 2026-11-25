<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$officeInfo = [
    'name'          => 'Perumda Air Minum Tirta Sukapura',
    'short_name'    => 'Tirta Sukapura',
    'region'        => 'Kabupaten Tasikmalaya',
    'phone'         => '+62 821-2910-2345',
    'phone_clean'   => '6282129102345',
    'office_phone'  => '(0265) 325065 / (0265) 320921',
    'email'         => 'perumdatirtasukapura@gmail.com',
    'email_alt'     => 'info@pdamtirtasukapura.co.id',
    'hours_weekday' => "Senin – Jum'at, 08:00 – 16:00 WIB",
    'hours_weekend' => 'Sabtu & Minggu Libur (Call Center 24 Jam)',
    'address'       => 'Jl. Jenderal A.H. Nasution Km. 8, Kab. Tasikmalaya, Jawa Barat 46181',
    'simpadu_url'   => 'http://app-tirtasukapura.com/',
    'gis_url'       => 'https://gis.app-tirtasukapura.com/',
    'simpel_url'    => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
    'bill_url'      => 'http://asindotama.com/layanantirtasukapura/',
    'complaint_url' => 'http://app-tirtasukapura.com/pengaduan/ticketOnline',
    'track_url'     => 'http://app-tirtasukapura.com/pengaduan/ticketTrack',
    'meter_url'     => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
    'stats_url'     => 'http://app-tirtasukapura.com/infopelanggan-v2/Apps/statistikpel',
    'old_site_base' => 'https://www.perumdaairminumtirtasukapura.com',
    'maps_embed'    => 'https://www.google.com/maps?q=Perumda+Air+Minum+Tirta+Sukapura+Tasikmalaya&output=embed',
];

$navLinks = [
    ['id' => 'beranda', 'label' => 'Beranda', 'href' => 'index.php'],
    ['id' => 'layanan', 'label' => 'Layanan', 'href' => 'layanan.php'],
    ['id' => 'profil',  'label' => 'Profil',  'href' => 'profil.php'],
    ['id' => 'berita',  'label' => 'Berita',  'href' => 'berita.php'],
    ['id' => 'kontak',  'label' => 'Kontak',  'href' => 'kontak.php'],
];

$heroStats = [
    ['value' => 1925, 'suffix' => '',        'label' => 'Melayani Sejak'],
    ['value' => 513,  'suffix' => ' L/dtk',  'label' => 'Kapasitas Terpasang'],
    ['value' => 17,   'suffix' => ' Unit',   'label' => 'Cabang & Unit Layanan'],
    ['value' => 24,   'suffix' => ' Jam',    'label' => 'Call Center & Pengaduan'],
];

$tickerItems = [
    ['tag' => 'Selesai', 'text' => 'Perbaikan 2 pipa distribusi utama 300 mm telah selesai, tekanan aliran normal bertahap.', 'href' => 'berita-detail.php?slug=perbaikan-kebocoran-2-pipa-distribusi-300mm'],
    ['tag' => 'Layanan', 'text' => 'Pendaftaran sambungan baru kini 100% online via portal SIMPEL tanpa antre di loket.', 'href' => 'layanan.php#prosedur'],
    ['tag' => 'Pembayaran', 'text' => 'Bayar rekening air lebih mudah melalui Bank BJB, BJB Syariah, BNI, Mandiri, dan Pospay.', 'href' => 'berita-detail.php?slug=panduan-cek-tagihan-dan-pembayaran-online'],
    ['tag' => 'Tips', 'text' => 'Lakukan Catat Meter Mandiri setiap bulan agar tagihan air lebih akurat & transparan.', 'href' => 'berita-detail.php?slug=panduan-catat-meter-mandiri-bulanan'],
];

$digitalServices = [
    [
        'id'          => 'cek-tagihan',
        'title'       => 'Cek Tagihan Air',
        'short'       => 'Info rekening bulanan & status lunas instan.',
        'description' => 'Periksa nominal tagihan bulanan, riwayat kubikasi, serta status pembayaran menggunakan nomor sambungan Anda.',
        'href'        => 'http://asindotama.com/layanantirtasukapura/',
        'cta'         => 'Cek Sekarang',
        'icon'        => 'receipt',
        'image'       => 'assets/images/service-field.jpg',
        'featured'    => true,
    ],
    [
        'id'          => 'daftar-baru',
        'title'       => 'Daftar Pelanggan Baru',
        'short'       => 'Ajukan sambungan baru online via SIMPEL.',
        'description' => 'Formulir permohonan pemasangan sambungan baru rumah tangga maupun usaha secara digital tanpa harus antre.',
        'href'        => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'cta'         => 'Daftar Online',
        'icon'        => 'user-plus',
        'image'       => 'assets/images/hero-water.jpg',
        'featured'    => true,
    ],
    [
        'id'          => 'pengaduan',
        'title'       => 'Pengaduan Gangguan',
        'short'       => 'Lapor kebocoran pipa & aliran macet 24 jam.',
        'description' => 'Buat tiket laporan gangguan air, pipa bocor, atau kendala meter agar segera ditindaklanjuti tim teknis.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketOnline',
        'cta'         => 'Buat Laporan',
        'icon'        => 'megaphone',
        'image'       => 'assets/images/spring-source.jpg',
        'featured'    => true,
    ],
    [
        'id'          => 'status-pengaduan',
        'title'       => 'Lacak Status Tiket',
        'short'       => 'Pantau progres perbaikan secara real-time.',
        'description' => 'Masukkan nomor tiket pengaduan untuk mengetahui status terkini pengerjaan oleh petugas lapangan.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketTrack',
        'cta'         => 'Lacak Tiket',
        'icon'        => 'search-check',
        'image'       => 'assets/images/service-field.jpg',
        'featured'    => false,
    ],
    [
        'id'          => 'catat-meter',
        'title'       => 'Catat Meter Mandiri',
        'short'       => 'Kirim foto angka meter air setiap bulan.',
        'description' => 'Laporkan angka stand meter secara mandiri untuk menjamin ketepatan tagihan bulanan Anda.',
        'href'        => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
        'cta'         => 'Input Meter',
        'icon'        => 'gauge',
        'image'       => 'assets/images/hero-water.jpg',
        'featured'    => false,
    ],
    [
        'id'          => 'statistik',
        'title'       => 'Statistik Pemakaian',
        'short'       => 'Grafik tren konsumsi kubikasi m³ bulanan.',
        'description' => 'Pantau histori pemakaian air per bulan untuk mengontrol anggaran dan mendeteksi indikasi kebocoran pipa.',
        'href'        => 'http://app-tirtasukapura.com/infopelanggan-v2/Apps/statistikpel',
        'cta'         => 'Lihat Grafik',
        'icon'        => 'bar-chart-3',
        'image'       => 'assets/images/spring-source.jpg',
        'featured'    => false,
    ],
];

$partnersMarquee = [
    [
        'name' => 'Bank BJB',
        'role' => 'Mitra Pembayaran',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/logo-bank-bjb_169.png',
    ],
    [
        'name' => 'Bank BJB Syariah',
        'role' => 'Mitra Syariah',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/bjb_syariah.png',
    ],
    [
        'name' => 'Bank BNI',
        'role' => 'Virtual Account & ATM',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Logo_bank_BNI.png',
    ],
    [
        'name' => 'Bank Mandiri',
        'role' => 'Livin’ & Multipayment',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Bank_Mandiri_logo_2016_svg.png',
    ],
    [
        'name' => 'Pos Indonesia',
        'role' => 'Pospay & Loket Pos',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/POSIND_2023.png',
    ],
    [
        'name' => 'Pemkab Tasikmalaya',
        'role' => 'Pemerintah Daerah',
        'logo' => 'assets/images/logo-perumda.png',
    ],
    [
        'name' => 'PERPAMSI',
        'role' => 'Asosiasi Air Minum RI',
        'logo' => '',
    ],
    [
        'name' => 'SIMPADU Aurora',
        'role' => 'Sistem Digital & GIS',
        'logo' => '',
    ],
];

$historyTimeline = [
    ['year' => '1925', 'title' => 'Awal Layanan Air Bersih', 'text' => 'Pelayanan dimulai dari <strong>Mata Air Cibunigeulis</strong> (±20 L/dtk) yang ditampung di Reservoir Gunung Singa (400 m³) untuk 80 sambungan awal.'],
    ['year' => '1975', 'title' => 'Pendirian Resmi PDAM', 'text' => 'Pada <strong>11 Juni 1975</strong>, PDAM Kabupaten Tasikmalaya resmi berdiri melalui Perda DT II Tasikmalaya Nomor 7 Tahun 1975.'],
    ['year' => '1978–1982', 'title' => 'Proyek Mata Air Cipondok', 'text' => 'Pembangunan sumber <strong>Mata Air Cipondok Leuwisari</strong> berkapasitas potensial 500 L/dtk melalui Six Cities Water Supply Project.'],
    ['year' => '1982–1984', 'title' => 'Pemulihan Pascabencana Galunggung', 'text' => 'Rehabilitasi <strong>2.341 meter pipa transmisi</strong> Cipondok–Peuteuy Jaya pasca letusan Gunung Galunggung (5 April 1982).'],
    ['year' => '2002–2026', 'title' => 'Transformasi Perumda & Digitalisasi', 'text' => 'Diperkuat Perda No. 24/2002, kini melayani 17 cabang/unit dengan ekosistem digital <strong>SIMPADU, SIMPEL, dan GIS</strong>.'],
];

$missions = [
    'Menyediakan air minum berkualitas sesuai <strong>standar kesehatan nasional</strong> secara kontinu.',
    'Memperluas <strong>cakupan sambungan rumah</strong> di seluruh wilayah potensial Kabupaten & Kota Tasikmalaya.',
    'Menghadirkan layanan cepat, transparan, dan terukur melalui <strong>digitalisasi SIMPADU & GIS</strong>.',
    'Menjaga kelestarian <strong>sumber mata air alami</strong> bersama pemerintah daerah dan masyarakat.',
];

$waterSources = [
    ['name' => 'Mata Air Cipondok',       'type' => 'Mata Air',       'year' => '1978', 'capacity' => 367],
    ['name' => 'Mata Air Leuwirupit',     'type' => 'Mata Air',       'year' => '2008', 'capacity' => 50],
    ['name' => 'Sungai Ciwulan (IPA Sukaraja)', 'type' => 'Air Permukaan', 'year' => '1982', 'capacity' => 20],
    ['name' => 'Sungai Cilangla (IPA Bantarkalong)', 'type' => 'Air Permukaan', 'year' => '1990', 'capacity' => 20],
    ['name' => 'Mata Air Cibunigeulis',   'type' => 'Mata Air',       'year' => '1975', 'capacity' => 18],
    ['name' => 'Mata Air Sangiang / Cianeut', 'type' => 'Mata Air',   'year' => '1990', 'capacity' => 15],
    ['name' => 'Mata Air Cipanyusupan',   'type' => 'Mata Air',       'year' => '1989', 'capacity' => 10],
    ['name' => 'Mata Air Cisitu / Cibatur', 'type' => 'Mata Air',     'year' => '1980', 'capacity' => 8],
    ['name' => 'Mata Air Cisalada',       'type' => 'Mata Air',       'year' => '1990', 'capacity' => 5],
];

$coverageStats = [
    ['year' => '2019', 'kab' => '2,43%', 'kota' => '14,53%', 'total' => '8,16%'],
    ['year' => '2020', 'kab' => '2,42%', 'kota' => '13,71%', 'total' => '8,14%'],
    ['year' => '2021', 'kab' => '2,56%', 'kota' => '13,27%', 'total' => '8,28%'],
    ['year' => '2022', 'kab' => '2,53%', 'kota' => '13,27%', 'total' => '7,54%'],
    ['year' => '2023', 'kab' => '3,41%', 'kota' => '13,42%', 'total' => '9,49%'],
];

$customerProcedures = [
    [
        'title' => 'Pemasangan Sambungan Baru',
        'icon'  => 'user-plus',
        'steps' => [
            'Isi formulir online melalui portal <strong>SIMPEL</strong> atau datang ke cabang terdekat.',
            'Lampirkan fotokopi <strong>KTP, Kartu Keluarga</strong>, dan titik koordinat lokasi rumah.',
            'Petugas melakukan survei jaringan pipa dan menerbitkan rincian biaya (RAB).',
            'Lakukan pembayaran resmi, kemudian tim teknis menjadwalkan pemasangan meter air.',
        ],
        'href'  => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'cta'   => 'Daftar via SIMPEL',
    ],
    [
        'title' => 'Pembayaran Rekening Bulanan',
        'icon'  => 'credit-card',
        'steps' => [
            'Periksa tagihan melalui menu <strong>Cek Tagihan Air</strong> sebelum tanggal jatuh tempo.',
            'Bayar via <strong>Bank BJB, BJB Syariah, BNI, Mandiri</strong>, atau <strong>PT Pos Indonesia</strong>.',
            'Simpan resi atau bukti transfer digital sebagai arsip pelunasan resmi.',
        ],
        'href'  => 'http://asindotama.com/layanantirtasukapura/',
        'cta'   => 'Cek Tagihan Sekarang',
    ],
    [
        'title' => 'Bukaan Kembali & Balik Nama',
        'icon'  => 'refresh-cw',
        'steps' => [
            'Ajukan surat permohonan resmi di loket cabang sesuai wilayah sambungan.',
            'Bawa <strong>KTP pemohon</strong>, nomor sambungan, dan bukti kepemilikan (untuk balik nama).',
            'Selesaikan administrasi sesuai ketentuan agar sambungan segera aktif kembali.',
        ],
        'href'  => 'kontak.php#cabang',
        'cta'   => 'Lihat Lokasi Cabang',
    ],
];

$tariffPresets = [
    ['id' => 'sosial', 'label' => 'Sosial',          'rate1' => 1800, 'rate2' => 2400, 'rate3' => 3200, 'admin' => 7500],
    ['id' => 'rt1',    'label' => 'Rumah Tangga I',  'rate1' => 2800, 'rate2' => 3800, 'rate3' => 5200, 'admin' => 10000],
    ['id' => 'rt2',    'label' => 'Rumah Tangga II', 'rate1' => 3600, 'rate2' => 4900, 'rate3' => 6800, 'admin' => 12500],
    ['id' => 'niaga',  'label' => 'Niaga / Usaha',   'rate1' => 5800, 'rate2' => 7500, 'rate3' => 9800, 'admin' => 17500],
];

$branches = [
    ['name' => 'Cabang Tasikmalaya Barat', 'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Argasari I (Depan Kelurahan Argasari), Kota Tasikmalaya', 'phone' => '0813-2055-7929'],
    ['name' => 'Cabang Tasikmalaya Timur', 'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Siliwangi No. 82, Kahuripan, Kec. Tawang, Kota Tasikmalaya 46115', 'phone' => '0812-9884-9030'],
    ['name' => 'Cabang Kawalu',            'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Perintis Kemerdekaan No. 320, Kel. Karsamenak, Kec. Kawalu 46182', 'phone' => '0813-2328-7123'],
    ['name' => 'Cabang Indihiang',         'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Rarangjami, Kel. Indihiang, Kec. Indihiang, Kota Tasikmalaya', 'phone' => '0896-6373-8202'],
    ['name' => 'Cabang Cibeureum',         'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Jakarta Perum Kotabaru Blok 5, Kel. Kotabaru, Kec. Cibeureum', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Tamansari',         'area' => 'Kota Tasikmalaya', 'address' => 'Jl. Raya Tamansari (Dekat RS Islam), Kp. Geugeurnoong, Kel. Tamansari', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Singaparna',        'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Kantor Pos RT 03/RW 04 Kebonsalak, Ds. Sukaharja, Kec. Singaparna', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Manonjaya',         'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. RTA Prawira Adiningrat No. 135, Ds. Manonjaya, Kec. Manonjaya', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Ciawi',             'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Regol RT 02/RW 03, Ds. Pakemitan, Kec. Ciawi, Kab. Tasikmalaya', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Mangunreja',        'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Cibalanarik No. 24, Kp. Panugaran, Ds. Mangunreja, Kec. Mangunreja', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Cabang Bantarkalong',      'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Raya Karangnunggal/Simpang, Kp. Karangmekar, Ds. Hegarwangi', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Sariwangi',           'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Sariwangi Kp. Kertasari RT 05/RW 01, Ds. Sariwangi', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Salawu',              'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Raya Salawu, Ds. Salawu, Kec. Salawu, Kab. Tasikmalaya', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Rajapolah',           'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Raya Rajapolah Kp. Randugede, Ds. Dawagung, Kec. Rajapolah', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Cisayong',            'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Baru (JB) RT 02/RW 04, Ds. Cisayong, Kec. Cisayong', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Pagerageung',         'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Nanggeleng Kp. Tanjak Nangsi RT 03/RW 01, Ds. Pakemitankidul', 'phone' => '+62 821-2910-2345'],
    ['name' => 'Unit Sukaraja',            'area' => 'Kab. Tasikmalaya', 'address' => 'Jl. Pencut Kp. Pasar Kolot RT 07/RW 03, Ds. Sukapura, Kec. Sukaraja', 'phone' => '+62 821-2910-2345'],
];

$newsItems = [
    [
        'slug'          => 'perbaikan-kebocoran-2-pipa-distribusi-300mm',
        'title'         => 'Perbaikan Kebocoran 2 Pipa Distribusi 300 mm Telah Selesai',
        'category'      => 'Perbaikan',
        'date_display'  => 'Pembaruan Layanan',
        'published_iso' => '2026-10-18',
        'read_time'     => '3 mnt baca',
        'author'        => 'Tim Teknis Distribusi',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_8019.jpg',
        'fallback_img'  => 'assets/images/service-field.jpg',
        'excerpt'       => 'Dua jalur pipa distribusi utama 300 mm telah selesai diperbaiki. Pengisian jaringan dan penormalan tekanan berlangsung bertahap.',
        'key_points'    => [
            'Perbaikan sambungan dan penguatan dudukan 2 pipa utama diameter 300 mm rampung.',
            'Pengaliran kembali dibuka secara bertahap agar tekanan jaringan stabil.',
            'Pelanggan terdampak dapat melapor ke Call Center +62 821-2910-2345 bila aliran belum normal.',
        ],
        'sections'      => [
            [
                'heading' => 'Status Pemulihan Jaringan',
                'body'    => 'Tim teknis Perumda Air Minum Tirta Sukapura telah menyelesaikan seluruh tahapan perbaikan kebocoran pada dua jalur pipa distribusi utama berdiameter 300 mm. Setelah uji tekanan lapangan dinyatakan aman, katup distribusi utama kembali dibuka.',
            ],
            [
                'heading' => 'Imbauan Untuk Pelanggan',
                'body'    => 'Pada jam-jam awal pengaliran, sebagian wilayah terjauh membutuhkan waktu untuk proses pengisian pipa. Apabila air sempat keruh sementara akibat pelepasan udara di dalam pipa, silakan alirkan keran selama 1–2 menit hingga kembali jernih.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pekerjaan-perbaikan-kebocoran-2-pipa-distribusi-300-mm-telah-selesai',
    ],
    [
        'slug'          => 'pipa-distribusi-300mm-terbawa-longsor',
        'title'         => 'Penanganan Darurat 2 Pipa Distribusi 300 mm Terdampak Longsor',
        'category'      => 'Info Gangguan',
        'date_display'  => 'Info Gangguan',
        'published_iso' => '2026-10-15',
        'read_time'     => '3 mnt baca',
        'author'        => 'Humas & Reaksi Cepat',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_7549.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Pergerakan tanah menyebabkan kerusakan dua jalur pipa transmisi 300 mm. Tim darurat melakukan pengamanan dan percepatan pemulihan.',
        'key_points'    => [
            'Tim reaksi cepat langsung mengamankan lokasi dan menyiapkan material pipa pengganti.',
            'Koordinasi bantuan suplai tangki air bersih diprioritaskan untuk fasilitas umum.',
            'Pembaruan progres perbaikan diinformasikan secara berkala melalui kanal resmi.',
        ],
        'sections'      => [
            [
                'heading' => 'Kronologi & Langkah Cepat',
                'body'    => 'Curah hujan tinggi memicu pergerakan tanah yang menyeret dua jalur pipa distribusi berdiameter 300 mm. Perumda Air Minum Tirta Sukapura segera menutup katup hulu untuk mencegah kerusakan meluas dan menerjunkan tim teknis beserta alat berat.',
            ],
            [
                'heading' => 'Antisipasi Cadangan Air',
                'body'    => 'Kami memohon maaf atas ketidaknyamanan yang dialami pelanggan. Masyarakat di wilayah terdampak diimbau menampung cadangan air secukupnya serta memantau perkembangan resmi melalui website dan WhatsApp Call Center.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/2-pipa-distribusi-300-mm-terbawa-longsor-suplai-air-ke-beberapa-wilayah-terganggu',
    ],
    [
        'slug'          => 'tips-deteksi-dini-kebocoran-pipa-rumah',
        'title'         => '5 Cara Mudah Deteksi Kebocoran Pipa Rumah Agar Tagihan Tidak Melonjak',
        'category'      => 'Edukasi & Tips',
        'date_display'  => 'Panduan Pelanggan',
        'published_iso' => '2026-11-12',
        'read_time'     => '4 mnt baca',
        'author'        => 'Edukasi Pelanggan Tirta Sukapura',
        'image'         => 'assets/images/service-field.jpg',
        'fallback_img'  => 'assets/images/service-field.jpg',
        'excerpt'       => 'Tagihan air tiba-tiba naik padahal pemakaian terasa biasa? Pelajari cara cepat mengecek kebocoran tersembunyi melalui meter air.',
        'key_points'    => [
            'Tutup seluruh keran di rumah selama 15 menit lalu perhatikan jarum kecil (leak indicator) pada meter air.',
            'Periksa katup pelampung (ball valve) pada kloset duduk dan tandon air yang sering rembes tanpa disadari.',
            'Pantau grafik kubikasi bulanan melalui menu Statistik Pemakaian untuk mengenali lonjakan abnormal.',
        ],
        'sections'      => [
            [
                'heading' => '1. Uji Putaran Meter Air Saat Semua Keran Mati',
                'body'    => 'Pastikan semua keran, mesin cuci, dan pengisian toren dalam kondisi tertutup rapat. Catat angka meter air dan perhatikan roda indikator kecil di tengah kaca meter. Jika masih berputar pelan, besar kemungkinan terdapat kebocoran pada instalasi pipa dalam rumah.',
            ],
            [
                'heading' => '2. Cek Kloset, Pelampung Toren, dan Dinding Lembap',
                'body'    => 'Sebagian besar pemborosan air rumah tangga berasal dari karet katup kloset yang aus atau pelampung toren yang tidak menutup sempurna. Periksa juga area tembok atau lantai yang tiba-tiba lembap dan berlumut.',
            ],
            [
                'heading' => '3. Manfaatkan Menu Statistik Pemakaian',
                'body'    => 'Perumda Tirta Sukapura menyediakan layanan Statistik Pemakaian online agar Anda bisa membandingkan konsumsi m³ bulan ini dengan rata-rata 6 bulan terakhir. Bila lonjakan terjadi di sebelum meter air (pipa dinas), segera laporkan via Pengaduan Online.',
            ],
        ],
        'source_url'    => 'layanan.php',
    ],
    [
        'slug'          => 'panduan-cek-tagihan-dan-pembayaran-online',
        'title'         => 'Panduan Lengkap Cek Tagihan & Bayar Rekening Air via Mobile Banking',
        'category'      => 'Edukasi & Tips',
        'date_display'  => 'Panduan Pelanggan',
        'published_iso' => '2026-11-05',
        'read_time'     => '3 mnt baca',
        'author'        => 'Layanan Pelanggan',
        'image'         => 'assets/images/hero-water.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Tidak perlu antre di loket—ketahui cara cek rekening dan bayar tagihan air melalui Bank BJB, BNI, Mandiri, hingga Pospay.',
        'key_points'    => [
            'Siapkan Nomor Sambungan / ID Pelanggan sebelum mengecek tagihan.',
            'Pembayaran resmi tersedia di Bank BJB, BJB Syariah, Bank BNI, Bank Mandiri, dan PT Pos Indonesia.',
            'Bayar sebelum tanggal jatuh tempo setiap bulan untuk menghindari denda keterlambatan.',
        ],
        'sections'      => [
            [
                'heading' => 'Langkah Cek Tagihan Online',
                'body'    => 'Buka menu Cek Tagihan Air di halaman Beranda atau Layanan, masukkan Nomor Sambungan pelanggan Anda, lalu sistem akan menampilkan rincian pemakaian kubikasi (m³), periode bulan, dan total nominal yang harus dibayar.',
            ],
            [
                'heading' => 'Kanal Pembayaran Mitra Resmi',
                'body'    => 'Pilih menu Pembayaran > PDAM > pilih Perumda Air Minum Tirta Sukapura / PDAM Kabupaten Tasikmalaya pada aplikasi DIGI Bank BJB, BNI Mobile, Livin’ by Mandiri, BJB Syariah, atau Pospay. Simpan bukti transaksi digital setelah pembayaran berhasil.',
            ],
        ],
        'source_url'    => 'layanan.php',
    ],
    [
        'slug'          => 'pencapaian-kinerja-dan-digitalisasi-simpadu',
        'title'         => 'Pencapaian Kinerja & Transformasi Digital Layanan Tirta Sukapura',
        'category'      => 'Kinerja',
        'date_display'  => 'Laporan Kinerja',
        'published_iso' => '2026-09-28',
        'read_time'     => '4 mnt baca',
        'author'        => 'Manajemen & Humas',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Pencapaian_Kinerja_Tahun_2024.jpg',
        'fallback_img'  => 'assets/images/spring-source.jpg',
        'excerpt'       => 'Peningkatan cakupan pelayanan air bersih hingga 9,49% serta integrasi SIMPEL, GIS jaringan pipa, dan tiket pengaduan online.',
        'key_points'    => [
            'Kapasitas produksi terpasang mencapai 513 L/dtk dari 9 sumber mata air dan sungai.',
            'Cakupan layanan gabungan Kabupaten & Kota Tasikmalaya meningkat menjadi 9,49%.',
            'Integrasi sistem SIMPADU, SIMPEL, dan pemetaan GIS mempercepat respon operasional.',
        ],
        'sections'      => [
            [
                'heading' => 'Pertumbuhan Cakupan & Keandalan Layanan',
                'body'    => 'Perumda Air Minum Tirta Sukapura terus memperkuat keandalan distribusi air minum di 17 cabang dan unit pelayanan. Dengan dukungan Pemerintah Kabupaten Tasikmalaya, perusahaan fokus pada perluasan sambungan rumah dan pengendalian tingkat kehilangan air (NRW).',
            ],
            [
                'heading' => 'Inovasi Layanan Berbasis Data',
                'body'    => 'Melalui portal SIMPEL untuk pendaftaran baru, sistem pengaduan berbasis tiket, serta GIS pemetaan jaringan perpipaan, pelanggan kini mendapatkan transparansi dan kecepatan layanan yang jauh lebih baik.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pencapaian-kinerja-perumda-air-minum-tirta-sukapura-tahun-2024',
    ],
    [
        'slug'          => 'panduan-catat-meter-mandiri-bulanan',
        'title'         => 'Cara Menggunakan Catat Meter Mandiri Agar Tagihan Lebih Akurat',
        'category'      => 'Edukasi & Tips',
        'date_display'  => 'Panduan Pelanggan',
        'published_iso' => '2026-10-29',
        'read_time'     => '3 mnt baca',
        'author'        => 'Divisi Hubungan Pelanggan',
        'image'         => 'assets/images/spring-source.jpg',
        'fallback_img'  => 'assets/images/spring-source.jpg',
        'excerpt'       => 'Rumah sering kosong saat petugas baca meter datang? Gunakan fitur Catat Meter Mandiri langsung dari ponsel Anda.',
        'key_points'    => [
            'Foto kaca meter air secara tegak lurus dengan pencahayaan cukup hingga angka hitam terbaca jelas.',
            'Catat hanya angka kubikasi berwarna hitam (tanpa angka merah desimal).',
            'Kirimkan melalui portal Catat Meter Mandiri sesuai periode pelaporan bulanan.',
        ],
        'sections'      => [
            [
                'heading' => 'Manfaat Catat Meter Mandiri',
                'body'    => 'Fitur Catat Meter Mandiri mencegah perhitungan taksiran rata-rata ketika pagar rumah terkunci atau petugas kesulitan mengakses lokasi meter air. Hasil bacaan yang akurat membuat tagihan benar-benar mencerminkan pemakaian riil Anda.',
            ],
            [
                'heading' => 'Tips Foto Stand Meter yang Benar',
                'body'    => 'Bersihkan kaca penutup meter dari debu atau embun terlebih dahulu, nyalakan flash ponsel jika lokasi meter agak gelap, lalu pastikan seluruh deret angka kubikasi masuk dalam frame foto sebelum dikirim.',
            ],
        ],
        'source_url'    => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
    ],
    [
        'slug'          => 'jadwal-pengurasan-reservoir-dan-pemeliharaan',
        'title'         => 'Pemeliharaan Berkala & Pengurasan Reservoir Untuk Kualitas Air Bersih',
        'category'      => 'Pengumuman',
        'date_display'  => 'Info Pelanggan',
        'published_iso' => '2026-09-02',
        'read_time'     => '2 mnt baca',
        'author'        => 'Divisi Produksi & Kualitas',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/16_Pemberitahuan.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Pengurasan bak reservoir dan pemeliharaan jaringan transmisi rutin dilakukan guna menjaga standar kejernihan dan higienitas air minum.',
        'key_points'    => [
            'Pembersihan endapan alami pada reservoir dilakukan secara terjadwal.',
            'Pengujian kualitas air berkala memastikan baku mutu air minum tetap terjaga.',
            'Jadwal pemeliharaan wilayah diumumkan sebelumnya agar pelanggan dapat menampung air.',
        ],
        'sections'      => [
            [
                'heading' => 'Menjaga Standar Kualitas Air Minum',
                'body'    => 'Sebagai bagian dari jaminan mutu layanan, Perumda Air Minum Tirta Sukapura melaksanakan pengurasan reservoir (washout) serta pengecekan katup distribusi secara berkala untuk menghilangkan endapan mineral alami.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/informasi-gangguan-aliran-air--senin-02-september-2024',
    ],
];

$faqs = [
    [
        'q' => 'Bagaimana cara cek tagihan air Perumda Tirta Sukapura secara online?',
        'a' => 'Anda dapat mengecek tagihan air secara online dengan membuka menu Cek Tagihan Air di website resmi Perumda Air Minum Tirta Sukapura (asindotama.com/layanantirtasukapura), lalu masukkan Nomor Sambungan pelanggan Anda untuk melihat rincian tagihan dan status pembayaran.',
    ],
    [
        'q' => 'Bagaimana cara mendaftar sambungan baru pelanggan PDAM Tirta Sukapura?',
        'a' => 'Pendaftaran sambungan baru dilakukan secara online melalui portal SIMPEL (simpel.app-tirtasukapura.com) atau langsung di 17 cabang/unit pelayanan terdekat dengan menyiapkan fotokopi KTP, Kartu Keluarga, dan lokasi pemasangan.',
    ],
    [
        'q' => 'Di mana saja bisa membayar rekening air Perumda Tirta Sukapura?',
        'a' => 'Tagihan rekening air Perumda Tirta Sukapura dapat dibayar melalui Bank BJB, Bank BJB Syariah, Bank BNI, Bank Mandiri (Livin’ & ATM), serta jaringan PT Pos Indonesia / Pospay.',
    ],
    [
        'q' => 'Ke nomor mana saya melapor jika terjadi pipa bocor atau air mati?',
        'a' => 'Laporkan gangguan aliran atau kebocoran pipa melalui layanan Pengaduan Online (app-tirtasukapura.com/pengaduan/ticketOnline) atau hubungi Call Center 24 Jam di +62 821-2910-2345 dan telepon kantor (0265) 325065.',
    ],
    [
        'q' => 'Di mana alamat Kantor Pusat Perumda Air Minum Tirta Sukapura?',
        'a' => 'Kantor Pusat Perumda Air Minum Tirta Sukapura berlokasi di Jl. Jenderal A.H. Nasution Km. 8, Kabupaten Tasikmalaya, Jawa Barat 46181. Jam layanan loket Senin–Jum’at pukul 08:00–16:00 WIB.',
    ],
];

function findNewsBySlug(string $slug, array $items): ?array
{
    foreach ($items as $item) {
        if ($item['slug'] === $slug) {
            return $item;
        }
    }
    return null;
}
