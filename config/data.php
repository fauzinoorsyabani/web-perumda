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
    'hours_weekday' => "Senin - Jum'at, 08.00 - 16.00 WIB",
    'hours_weekend' => 'Sabtu & Minggu tutup (pengaduan telepon tetap aktif 24 jam)',
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

$tickerItems = [
    [
        'tag'  => 'Perbaikan Selesai',
        'text' => 'Dua jalur pipa distribusi 300 mm sudah selesai diperbaiki dan aliran kembali dibuka bertahap.',
        'href' => 'berita-detail.php?slug=perbaikan-kebocoran-2-pipa-distribusi-300mm',
    ],
    [
        'tag'  => 'Sambungan Baru',
        'text' => 'Pendaftaran pelanggan baru dibuka setiap hari lewat portal SIMPEL.',
        'href' => 'layanan.php#prosedur',
    ],
    [
        'tag'  => 'Pembayaran',
        'text' => 'Rekening bulanan dapat dibayar melalui Bank BJB, BJB Syariah, BNI, Mandiri, dan Kantor Pos.',
        'href' => 'berita-detail.php?slug=panduan-cek-tagihan-dan-pembayaran-online',
    ],
    [
        'tag'  => 'Catat Meter',
        'text' => 'Kirim foto angka meter air Anda secara mandiri agar pencatatan tagihan sesuai pemakaian.',
        'href' => 'berita-detail.php?slug=panduan-catat-meter-mandiri-bulanan',
    ],
];

$digitalServices = [
    [
        'id'          => 'cek-tagihan',
        'title'       => 'Cek Tagihan Air',
        'short'       => 'Lihat tagihan bulanan pakai nomor sambungan.',
        'description' => 'Masukkan nomor sambungan pelanggan untuk melihat jumlah pemakaian kubikasi, rincian biaya bulan berjalan, dan status pelunasan.',
        'href'        => 'http://asindotama.com/layanantirtasukapura/',
        'cta'         => 'Buka Cek Tagihan',
        'icon'        => 'receipt',
    ],
    [
        'id'          => 'daftar-baru',
        'title'       => 'Daftar Sambungan Baru',
        'short'       => 'Ajukan pemasangan meter air lewat SIMPEL.',
        'description' => 'Isi formulir pendaftaran online untuk rumah tangga maupun tempat usaha tanpa perlu datang dulu ke loket cabang.',
        'href'        => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'cta'         => 'Daftar di SIMPEL',
        'icon'        => 'user-plus',
    ],
    [
        'id'          => 'pengaduan',
        'title'       => 'Lapor Gangguan & Bocor',
        'short'       => 'Laporkan pipa bocor atau air tidak mengalir.',
        'description' => 'Buat tiket laporan gangguan air, kebocoran pipa dinas, atau meter air rusak agar segera ditangani petugas lapangan.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketOnline',
        'cta'         => 'Buat Tiket Laporan',
        'icon'        => 'megaphone',
    ],
    [
        'id'          => 'status-pengaduan',
        'title'       => 'Lacak Status Tiket',
        'short'       => 'Cek perkembangan laporan yang sudah dikirim.',
        'description' => 'Pantau status pengerjaan tiket pengaduan menggunakan nomor registrasi laporan Anda.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketTrack',
        'cta'         => 'Cek Status Tiket',
        'icon'        => 'search-check',
    ],
    [
        'id'          => 'catat-meter',
        'title'       => 'Catat Meter Mandiri',
        'short'       => 'Kirim foto stand meter air setiap bulan.',
        'description' => 'Berguna jika rumah sering terkunci saat petugas datang. Foto angka meter Anda supaya perhitungan tagihan sesuai pemakaian riil.',
        'href'        => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
        'cta'         => 'Kirim Angka Meter',
        'icon'        => 'gauge',
    ],
    [
        'id'          => 'statistik',
        'title'       => 'Statistik Pemakaian',
        'short'       => 'Bandingkan grafik konsumsi air per bulan.',
        'description' => 'Lihat riwayat pemakaian air bulanan dalam meter kubik untuk memantau anggaran atau mendeteksi lonjakan karena kebocoran.',
        'href'        => 'http://app-tirtasukapura.com/infopelanggan-v2/Apps/statistikpel',
        'cta'         => 'Lihat Statistik',
        'icon'        => 'bar-chart-3',
    ],
];

$partnersMarquee = [
    [
        'name' => 'Bank BJB',
        'role' => 'ATM, DIGI & Teller',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/logo-bank-bjb_169.png',
    ],
    [
        'name' => 'Bank BJB Syariah',
        'role' => 'Loket & Mobile Syariah',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/bjb_syariah.png',
    ],
    [
        'name' => 'Bank BNI',
        'role' => 'BNI Mobile & ATM',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Logo_bank_BNI.png',
    ],
    [
        'name' => 'Bank Mandiri',
        'role' => 'Livin’ & Multipayment',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Bank_Mandiri_logo_2016_svg.png',
    ],
    [
        'name' => 'Pos Indonesia',
        'role' => 'Kantor Pos & Pospay',
        'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/POSIND_2023.png',
    ],
    [
        'name' => 'Pemkab Tasikmalaya',
        'role' => 'Pemerintah Daerah',
        'logo' => 'assets/images/logo-perumda.png',
    ],
    [
        'name' => 'PERPAMSI',
        'role' => 'Persatuan Perusahaan Air Minum',
        'logo' => '',
    ],
    [
        'name' => 'SIMPADU Aurora',
        'role' => 'Billing & GIS Jaringan',
        'logo' => '',
    ],
];

$historyTimeline = [
    [
        'year'  => '1925',
        'title' => 'Awal distribusi dari Mata Air Cibunigeulis',
        'text'  => 'Layanan air bersih pertama di Tasikmalaya mengambil air dari Mata Air Cibunigeulis dengan debit sekitar 20 L/detik, ditampung di Reservoir Gunung Singa (400 m³), dan melayani 80 pelanggan pertama.',
    ],
    [
        'year'  => '1975',
        'title' => 'Pendirian PDAM Kabupaten Tasikmalaya',
        'text'  => 'Pada 11 Juni 1975, PDAM Kabupaten Tasikmalaya resmi berdiri berdasarkan Peraturan Daerah Tingkat II Tasikmalaya Nomor 7 Tahun 1975.',
    ],
    [
        'year'  => '1978 - 1982',
        'title' => 'Pembangunan sumber Mata Air Cipondok',
        'text'  => 'Pemerintah membangun fasilitas pengambilan air di Mata Air Cipondok, Kecamatan Leuwisari, dengan debit potensial 500 L/detik lewat program Six Cities Water Supply Project.',
    ],
    [
        'year'  => '1982 - 1984',
        'title' => 'Perbaikan pipa pasca letusan Gunung Galunggung',
        'text'  => 'Letusan Gunung Galunggung pada 5 April 1982 menghanyutkan 2 jembatan pipa dan merusak 3.000 meter jalur transmisi. Pada 1984, 2.341 meter jalur Cipondok sampai Kampung Peuteuy Jaya selesai direhabilitasi.',
    ],
    [
        'year'  => '2002 - Kini',
        'title' => 'Perumda Air Minum Tirta Sukapura',
        'text'  => 'Diperbarui melalui Perda Kabupaten Tasikmalaya Nomor 24 Tahun 2002. Saat ini layanan tersebar di 17 cabang dan unit, didukung pendaftaran online SIMPEL, tiket pengaduan, dan peta jaringan GIS.',
    ],
];

$missions = [
    'Menjaga mutu air minum agar sesuai baku mutu kesehatan dan mengalir rutin ke pelanggan.',
    'Menambah jaringan sambungan baru di wilayah Kabupaten dan Kota Tasikmalaya yang belum terlayani.',
    'Mempercepat penanganan kebocoran pipa, pembacaan meter, dan layanan administrasi melalui sistem SIMPADU dan GIS.',
    'Merawat daerah tangkapan mata air bersama pemerintah daerah dan warga setempat.',
];

$waterSources = [
    ['name' => 'Mata Air Cipondok',                  'type' => 'Mata Air',      'year' => '1978', 'capacity' => 367],
    ['name' => 'Mata Air Leuwirupit',                'type' => 'Mata Air',      'year' => '2008', 'capacity' => 50],
    ['name' => 'Sungai Ciwulan (IPA Sukaraja)',      'type' => 'Air Permukaan', 'year' => '1982', 'capacity' => 20],
    ['name' => 'Sungai Cilangla (IPA Bantarkalong)', 'type' => 'Air Permukaan', 'year' => '1990', 'capacity' => 20],
    ['name' => 'Mata Air Cibunigeulis',              'type' => 'Mata Air',      'year' => '1975', 'capacity' => 18],
    ['name' => 'Mata Air Sangiang / Cianeut',        'type' => 'Mata Air',      'year' => '1990', 'capacity' => 15],
    ['name' => 'Mata Air Cipanyusupan',              'type' => 'Mata Air',      'year' => '1989', 'capacity' => 10],
    ['name' => 'Mata Air Cisitu / Cibatur',          'type' => 'Mata Air',      'year' => '1980', 'capacity' => 8],
    ['name' => 'Mata Air Cisalada',                  'type' => 'Mata Air',      'year' => '1990', 'capacity' => 5],
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
        'steps' => [
            'Daftar online melalui portal SIMPEL atau datang langsung ke kantor cabang wilayah Anda.',
            'Siapkan fotokopi KTP, Kartu Keluarga, dan alamat lengkap titik rumah.',
            'Petugas mensurvei jarak pipa distribusi dan menerbitkan rincian biaya pemasangan (RAB).',
            'Setelah biaya sambungan dibayar di kanal resmi, petugas menjadwalkan pemasangan meter air.',
        ],
        'href'  => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'cta'   => 'Buka Pendaftaran SIMPEL',
    ],
    [
        'title' => 'Pembayaran Rekening Bulanan',
        'steps' => [
            'Periksa tagihan di menu Cek Tagihan Air menggunakan nomor sambungan.',
            'Bayar sebelum jatuh tempo melalui Bank BJB, BJB Syariah, BNI, Mandiri, atau PT Pos Indonesia.',
            'Simpan resi cetak atau bukti transaksi mobile banking sebagai tanda lunas.',
        ],
        'href'  => 'http://asindotama.com/layanantirtasukapura/',
        'cta'   => 'Cek Tagihan Sekarang',
    ],
    [
        'title' => 'Bukaan Kembali & Balik Nama',
        'steps' => [
            'Datang ke loket cabang sesuai wilayah sambungan dengan membawa nomor pelanggan.',
            'Sertakan fotokopi KTP pemohon dan bukti kepemilikan bangunan jika mengajukan balik nama.',
            'Selesaikan administrasi dan tunggakan (bila ada) agar sambungan aktif kembali.',
        ],
        'href'  => 'kontak.php#cabang',
        'cta'   => 'Cari Kantor Cabang',
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
        'title'         => 'Perbaikan 2 Pipa Distribusi 300 mm Selesai, Aliran Mulai Normal Bertahap',
        'category'      => 'Perbaikan',
        'date_display'  => '18 Oktober 2026',
        'published_iso' => '2026-10-18',
        'read_time'     => '2 menit baca',
        'author'        => 'Bagian Distribusi',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_8019.jpg',
        'fallback_img'  => 'assets/images/service-field.jpg',
        'excerpt'       => 'Petugas lapangan selesai memperbaiki dua pipa distribusi 300 mm. Katup utama sudah dibuka kembali dan tekanan air pulih secara bertahap.',
        'key_points'    => [
            'Penggantian sambungan pada dua pipa 300 mm rampung dan lolos uji tekanan.',
            'Wilayah yang jauh dari reservoir membutuhkan beberapa jam hingga tekanan kembali penuh.',
            'Hubungi +62 821-2910-2345 jika aliran di rumah belum keluar setelah masa penormalan.',
        ],
        'sections'      => [
            [
                'heading' => 'Kondisi pengaliran setelah perbaikan',
                'body'    => 'Petugas distribusi Perumda Air Minum Tirta Sukapura telah menyelesaikan perbaikan kebocoran pada dua jalur pipa utama diameter 300 mm. Katup distribusi kembali dibuka sehingga pengisian jalur menuju pelanggan sudah berjalan.',
            ],
            [
                'heading' => 'Yang perlu diperhatikan pelanggan',
                'body'    => 'Pada awal pengaliran, udara di dalam pipa kadang membuat air terlihat keruh beberapa saat. Alirkan keran selama satu sampai dua menit hingga air kembali jernih sebelum digunakan. Jika aliran belum juga normal, kirim laporan lewat Pengaduan Online atau WhatsApp Call Center.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pekerjaan-perbaikan-kebocoran-2-pipa-distribusi-300-mm-telah-selesai',
    ],
    [
        'slug'          => 'pipa-distribusi-300mm-terbawa-longsor',
        'title'         => '2 Pipa Distribusi 300 mm Terbawa Longsor, Suplai ke Beberapa Wilayah Terganggu',
        'category'      => 'Info Gangguan',
        'date_display'  => '15 Oktober 2026',
        'published_iso' => '2026-10-15',
        'read_time'     => '2 menit baca',
        'author'        => 'Humas Tirta Sukapura',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_7549.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Longsor akibat hujan deras merusak dua pipa distribusi 300 mm. Petugas menutup katup hulu dan mengerjakan pemasangan pipa pengganti di lokasi.',
        'key_points'    => [
            'Katup jalur hulu ditutup sementara selama pengerjaan pemindahan dan penyambungan pipa.',
            'Pengiriman mobil tangki air bersih diprioritaskan bagi fasilitas umum dan wilayah kritis.',
            'Pelanggan diimbau menampung cadangan air secukupnya selama perbaikan berjalan.',
        ],
        'sections'      => [
            [
                'heading' => 'Penanganan darurat di titik longsor',
                'body'    => 'Pergerakan tanah setelah hujan lebat menyeret dua jalur pipa distribusi 300 mm. Tim teknis segera menurunkan material pipa pengganti, membersihkan area longsoran, dan memperkuat pondasi penyangga jalur.',
            ],
            [
                'heading' => 'Koordinasi suplai sementara',
                'body'    => 'Kami memohon maaf atas gangguan suplai yang dirasakan pelanggan. Untuk kebutuhan darurat atau pengecekan status perbaikan wilayah Anda, silakan hubungi Call Center di +62 821-2910-2345.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/2-pipa-distribusi-300-mm-terbawa-longsor-suplai-air-ke-beberapa-wilayah-terganggu',
    ],
    [
        'slug'          => 'tips-deteksi-dini-kebocoran-pipa-rumah',
        'title'         => 'Cara Mengecek Kebocoran Pipa di Rumah Lewat Meter Air',
        'category'      => 'Panduan',
        'date_display'  => '12 November 2026',
        'published_iso' => '2026-11-12',
        'read_time'     => '3 menit baca',
        'author'        => 'Hubungan Pelanggan',
        'image'         => 'assets/images/service-field.jpg',
        'fallback_img'  => 'assets/images/service-field.jpg',
        'excerpt'       => 'Tagihan melonjak padahal pemakaian terasa biasa? Uji meter air selama 15 menit untuk memastikan ada tidaknya kebocoran pipa dalam rumah.',
        'key_points'    => [
            'Tutup seluruh keran di rumah selama 15 menit, lalu cek apakah roda kecil di kaca meter masih berputar.',
            'Cek karet katup kloset duduk dan pelampung tandon air karena dua titik ini paling sering merembes.',
            'Bandingkan pemakaian bulan ini dengan bulan lalu di menu Statistik Pemakaian.',
        ],
        'sections'      => [
            [
                'heading' => '1. Uji putaran meter saat semua keran mati',
                'body'    => 'Tutup rapat seluruh keran, mesin cuci, dan saluran pengisian toren. Catat angka pada meter air dan tunggu 15 menit tanpa menggunakan air sama sekali. Jika roda indikator kecil di tengah kaca meter tetap berputar, ada air yang keluar di instalasi setelah meter.',
            ],
            [
                'heading' => '2. Periksa kloset, pelampung tandon, dan dinding lembap',
                'body'    => 'Kebocoran halus di tangki kloset duduk bisa membuang ratusan liter air per hari tanpa terdengar. Periksa juga pelampung tandon atas apakah masih menutup sempurna, serta cek dinding atau lantai yang mendadak lembap dan berlumut.',
            ],
            [
                'heading' => '3. Bedakan pipa dinas dan pipa rumah',
                'body'    => 'Jika kebocoran terjadi sebelum meter air (pipa dinas), laporkan segera ke Perumda Tirta Sukapura lewat Pengaduan Online agar diperbaiki petugas. Jika kebocoran berada sesudah meter air, perbaikan menjadi tanggung jawab pemilik rumah.',
            ],
        ],
        'source_url'    => 'layanan.php',
    ],
    [
        'slug'          => 'panduan-cek-tagihan-dan-pembayaran-online',
        'title'         => 'Cara Cek Tagihan dan Bayar Rekening Air Lewat Mobile Banking',
        'category'      => 'Panduan',
        'date_display'  => '5 November 2026',
        'published_iso' => '2026-11-05',
        'read_time'     => '2 menit baca',
        'author'        => 'Bagian Pelayanan',
        'image'         => 'assets/images/hero-water.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Panduan singkat mengecek nominal rekening bulanan dan melunasinya lewat DIGI BJB, BNI Mobile, Livin’ Mandiri, atau Pospay.',
        'key_points'    => [
            'Siapkan Nomor Sambungan pelanggan Anda sebelum membuka menu Cek Tagihan.',
            'Pilih penyedia PDAM Kabupaten Tasikmalaya / Tirta Sukapura di aplikasi bank mitra.',
            'Bayar sebelum tanggal jatuh tempo setiap bulan untuk menghindari denda.',
        ],
        'sections'      => [
            [
                'heading' => 'Mengecek nominal tagihan',
                'body'    => 'Buka halaman Layanan lalu klik Cek Tagihan Air. Masukkan nomor sambungan Anda untuk melihat rincian pemakaian kubikasi, bulan tagihan, dan total yang harus dibayar.',
            ],
            [
                'heading' => 'Membayar lewat bank mitra atau Kantor Pos',
                'body'    => 'Di aplikasi DIGI Bank BJB, BJB Syariah, BNI Mobile, Livin’ by Mandiri, atau Pospay, buka menu Pembayaran lalu pilih PDAM dan cari Kabupaten Tasikmalaya / Tirta Sukapura. Masukkan nomor sambungan, pastikan nama pelanggan cocok, lalu selesaikan pembayaran dan simpan struknya.',
            ],
        ],
        'source_url'    => 'layanan.php',
    ],
    [
        'slug'          => 'pencapaian-kinerja-dan-digitalisasi-simpadu',
        'title'         => 'Ringkasan Kinerja Produksi 513 L/detik dan Cakupan Layanan Tirta Sukapura',
        'category'      => 'Kinerja',
        'date_display'  => '28 September 2026',
        'published_iso' => '2026-09-28',
        'read_time'     => '3 menit baca',
        'author'        => 'Manajemen & Humas',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Pencapaian_Kinerja_Tahun_2024.jpg',
        'fallback_img'  => 'assets/images/spring-source.jpg',
        'excerpt'       => 'Cakupan layanan gabungan Kabupaten dan Kota Tasikmalaya naik dari 8,16% menjadi 9,49%, ditopang 9 sumber air baku dan sistem SIMPADU.',
        'key_points'    => [
            'Total kapasitas terpasang 513 L/detik (473 L/detik dari mata air dan 40 L/detik dari dua IPA sungai).',
            'Cakupan layanan Kabupaten Tasikmalaya meningkat dari 2,43% (2019) menjadi 3,41% (2023).',
            'Layanan pelanggan kini terhubung dengan pendaftaran SIMPEL, tiket pengaduan, dan pemetaan GIS.',
        ],
        'sections'      => [
            [
                'heading' => 'Kapasitas sumber dan jangkauan cabang',
                'body'    => 'Pasokan utama Perumda Air Minum Tirta Sukapura berasal dari Mata Air Cipondok sebesar 367 L/detik dan Mata Air Leuwirupit 50 L/detik, ditambah lima mata air lain serta IPA Sungai Ciwulan dan Cilangla. Seluruh jaringan dikelola melalui 17 cabang dan unit pelayanan.',
            ],
            [
                'heading' => 'Perbaikan administrasi dan pencatatan',
                'body'    => 'Selain perawatan fisik pipa distribusi, tim internal terus membenahi proses pendaftaran lewat SIMPEL, pencatatan meter berbasis foto, serta pemetaan aset pipa menggunakan GIS untuk mempercepat pelacakan titik gangguan.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pencapaian-kinerja-perumda-air-minum-tirta-sukapura-tahun-2024',
    ],
    [
        'slug'          => 'panduan-catat-meter-mandiri-bulanan',
        'title'         => 'Cara Kirim Foto Catat Meter Mandiri Setiap Bulan',
        'category'      => 'Panduan',
        'date_display'  => '29 Oktober 2026',
        'published_iso' => '2026-10-29',
        'read_time'     => '2 menit baca',
        'author'        => 'Hubungan Pelanggan',
        'image'         => 'assets/images/spring-source.jpg',
        'fallback_img'  => 'assets/images/spring-source.jpg',
        'excerpt'       => 'Jika rumah sering kosong saat petugas baca meter datang, kirimkan foto stand meter Anda lewat layanan Catat Meter Mandiri.',
        'key_points'    => [
            'Bersihkan kaca meter air dan ambil foto tegak lurus dengan cahaya cukup.',
            'Masukkan hanya deret angka hitam (kubikasi utama), abaikan angka merah.',
            'Kirimkan sesuai jadwal pencatatan bulanan agar tagihan tidak dihitung rata-rata.',
        ],
        'sections'      => [
            [
                'heading' => 'Kapan sebaiknya pakai Catat Meter Mandiri',
                'body'    => 'Layanan ini membantu pelanggan yang pagar rumahnya sering terkunci pada jam kerja. Dengan mengirim foto angka meter sendiri, tagihan bulanan dihitung tepat sesuai kubikasi yang terpakai.',
            ],
            [
                'heading' => 'Cara mengambil foto yang jelas',
                'body'    => 'Lap kaca meter jika berembun atau berdebu, nyalakan lampu flash ponsel bila boks meter berada di tempat teduh, lalu arahkan kamera tegak lurus agar seluruh angka kubikasi terbaca jelas saat diverifikasi petugas.',
            ],
        ],
        'source_url'    => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
    ],
    [
        'slug'          => 'jadwal-pengurasan-reservoir-dan-pemeliharaan',
        'title'         => 'Pengurasan Reservoir dan Perawatan Jaringan Pipa Berkala',
        'category'      => 'Pengumuman',
        'date_display'  => '2 September 2026',
        'published_iso' => '2026-09-02',
        'read_time'     => '2 menit baca',
        'author'        => 'Divisi Produksi',
        'image'         => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/16_Pemberitahuan.jpg',
        'fallback_img'  => 'assets/images/hero-water.jpg',
        'excerpt'       => 'Bak penampungan air (reservoir) dikuras secara rutin untuk membuang endapan mineral alami dan menjaga kejernihan air distribusi.',
        'key_points'    => [
            'Pembersihan bak reservoir dilakukan terjadwal di luar jam puncak pemakaian.',
            'Selama pengerjaan, tekanan air di sebagian jalur distribusi dapat mengecil sementara.',
            'Jadwal pengurasan per wilayah diumumkan melalui halaman Berita dan WhatsApp layanan.',
        ],
        'sections'      => [
            [
                'heading' => 'Tujuan pengurasan reservoir',
                'body'    => 'Pengurasan bak penampungan dan pengecekan katup distribusi dilakukan berkala untuk membersihkan endapan lumpur halus atau mineral yang terbawa dari sumber air baku, sehingga air yang sampai ke rumah warga tetap jernih.',
            ],
        ],
        'source_url'    => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/informasi-gangguan-aliran-air--senin-02-september-2024',
    ],
];

$faqs = [
    [
        'q' => 'Bagaimana cara cek tagihan air Perumda Tirta Sukapura secara online?',
        'a' => 'Buka menu Cek Tagihan Air di website ini (asindotama.com/layanantirtasukapura), masukkan nomor sambungan pelanggan Anda, lalu rincian pemakaian kubikasi dan nominal tagihan akan langsung tampil.',
    ],
    [
        'q' => 'Bagaimana syarat dan cara pasang sambungan baru PDAM Tasikmalaya?',
        'a' => 'Daftar lewat portal SIMPEL (simpel.app-tirtasukapura.com) atau loket cabang terdekat dengan menyiapkan fotokopi KTP, Kartu Keluarga, dan alamat titik pemasangan. Setelah petugas melakukan survei jaringan, Anda akan menerima rincian biaya resmi (RAB).',
    ],
    [
        'q' => 'Di mana saja rekening air Perumda Tirta Sukapura bisa dibayar?',
        'a' => 'Pembayaran dapat dilakukan di Bank BJB (ATM, teller, DIGI), Bank BJB Syariah, Bank BNI, Bank Mandiri (Livin’ dan ATM), serta Kantor Pos / aplikasi Pospay.',
    ],
    [
        'q' => 'Ke mana harus melapor jika air mati atau pipa di jalan bocor?',
        'a' => 'Kirim tiket lewat layanan Pengaduan Online (app-tirtasukapura.com/pengaduan/ticketOnline) atau hubungi Call Center 24 Jam di +62 821-2910-2345 dan telepon kantor (0265) 325065.',
    ],
    [
        'q' => 'Di mana alamat Kantor Pusat Perumda Air Minum Tirta Sukapura?',
        'a' => 'Jl. Jenderal A.H. Nasution Km. 8, Kabupaten Tasikmalaya, Jawa Barat 46181. Loket buka Senin sampai Jum’at pukul 08.00 hingga 16.00 WIB.',
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
