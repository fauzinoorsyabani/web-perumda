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
    'email'         => 'perumdatirtasukapura@gmail.com',
    'hours_weekday' => "Senin – Jum'at, 08:00 – 16:00 WIB",
    'address'       => 'Kabupaten Tasikmalaya, Jawa Barat',
    'simpadu_url'   => 'http://app-tirtasukapura.com/',
    'gis_url'       => 'https://gis.app-tirtasukapura.com/',
    'simpel_url'    => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
    'old_site_base' => 'https://www.perumdaairminumtirtasukapura.com',
    'hero_banner'   => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_slide/Banner_Slide_Website.jpg',
];

$navLinks = [
    ['label' => 'Layanan', 'href' => '#layanan'],
    ['label' => 'Tarif', 'href' => '#kalkulator'],
    ['label' => 'Profil', 'href' => '#profil'],
    ['label' => 'Berita', 'href' => '#berita'],
    ['label' => 'Kontak', 'href' => '#kontak'],
];

$heroStats = [
    ['value' => '1925', 'label' => 'Melayani Sejak'],
    ['value' => '500+ L/dtk', 'label' => 'Potensi Debit'],
    ['value' => '6 Layanan', 'label' => 'Akses Online'],
    ['value' => '5 Bank', 'label' => 'Mitra Bayar'],
];

$digitalServices = [
    [
        'title'       => 'Cek Tagihan Air',
        'description' => 'Lihat rincian rekening bulanan dan status pembayaran.',
        'href'        => 'http://asindotama.com/layanantirtasukapura/',
        'icon'        => 'receipt',
    ],
    [
        'title'       => 'Daftar Pelanggan Baru',
        'description' => 'Ajukan pemasangan sambungan baru via portal SIMPEL.',
        'href'        => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'icon'        => 'user-plus',
    ],
    [
        'title'       => 'Pengaduan Online',
        'description' => 'Laporkan kebocoran pipa atau gangguan aliran air.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketOnline',
        'icon'        => 'megaphone',
    ],
    [
        'title'       => 'Status Pengaduan',
        'description' => 'Pantau progres tiket laporan teknis secara langsung.',
        'href'        => 'http://app-tirtasukapura.com/pengaduan/ticketTrack',
        'icon'        => 'search-check',
    ],
    [
        'title'       => 'Catat Meter Mandiri',
        'description' => 'Kirim angka dan foto stand meter air bulanan Anda.',
        'href'        => 'http://asindotama.com/pdamtasik/cater/Catermandiri',
        'icon'        => 'gauge',
    ],
    [
        'title'       => 'Statistik Pemakaian',
        'description' => 'Pantau grafik penggunaan kubikasi air (m³) per bulan.',
        'href'        => 'http://app-tirtasukapura.com/infopelanggan-v2/Apps/statistikpel',
        'icon'        => 'bar-chart-3',
    ],
];

$tariffPresets = [
    ['id' => 'sosial', 'label' => 'Sosial',          'rate1' => 1800, 'rate2' => 2400, 'rate3' => 3200, 'admin' => 7500],
    ['id' => 'rt1',    'label' => 'Rumah Tangga I',  'rate1' => 2800, 'rate2' => 3800, 'rate3' => 5200, 'admin' => 10000],
    ['id' => 'rt2',    'label' => 'Rumah Tangga II', 'rate1' => 3600, 'rate2' => 4900, 'rate3' => 6800, 'admin' => 12500],
    ['id' => 'niaga',  'label' => 'Niaga / Usaha',   'rate1' => 5800, 'rate2' => 7500, 'rate3' => 9800, 'admin' => 17500],
];

$historyTimeline = [
    ['year' => '1925', 'text' => 'Pelayanan air bersih dimulai dari Mata Air Cibunigeulis (±20 L/dtk) untuk 80 pelanggan awal.'],
    ['year' => '1975', 'text' => 'PDAM Kab. Tasikmalaya resmi berdiri melalui Perda No. 7 Tahun 1975 (11 Juni 1975).'],
    ['year' => '1978–1982', 'text' => 'Pengembangan Mata Air Cipondok Leuwisari (±500 L/dtk) melalui Six Cities Water Supply Project.'],
    ['year' => '1982–1984', 'text' => 'Rehabilitasi 2.341 m pipa transmisi pasca letusan Gunung Galunggung hingga aliran normal kembali.'],
    ['year' => '2002–Kini', 'text' => 'Transformasi menjadi Perumda Air Minum Tirta Sukapura dengan layanan digital SIMPADU & GIS.'],
];

$missions = [
    'Menjaga kualitas, kuantitas, dan kontinuitas air minum sesuai standar kesehatan.',
    'Memperluas cakupan sambungan air bersih di Kabupaten Tasikmalaya.',
    'Mengoptimalkan pelayanan transparan berbasis digital (SIMPADU & GIS).',
    'Melestarikan sumber mata air baku secara berkelanjutan.',
];

$waterSystemSpecs = [
    ['label' => 'Sumber Air Baku', 'value' => 'Mata Air Alami', 'note' => 'Cipondok Leuwisari, Cibunigeulis, dan sumber potensial daerah.'],
    ['label' => 'Kapasitas Produksi', 'value' => '500+ L / detik', 'note' => 'Pengolahan terukur dengan uji laboratorium berkala.'],
    ['label' => 'Distribusi', 'value' => 'Gravitasi & Pipa 300 mm', 'note' => 'Jaringan transmisi terpantau melalui sistem GIS.'],
    ['label' => 'Wilayah Layanan', 'value' => 'Kab. Tasikmalaya', 'note' => 'Melayani rumah tangga, fasilitas sosial, hingga niaga.'],
];

$customerProcedures = [
    [
        'title' => 'Sambungan Baru',
        'steps' => ['Daftar online via SIMPEL atau loket cabang.', 'Siapkan KTP, KK, dan titik lokasi.', 'Survei teknis, bayar RAB, lalu pemasangan.'],
        'href'  => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
    ],
    [
        'title' => 'Pembayaran Rekening',
        'steps' => ['Cek nominal di menu Cek Tagihan.', 'Bayar via Bank BJB, BNI, Mandiri, atau Pos.', 'Simpan bukti transaksi resmi.'],
        'href'  => 'http://asindotama.com/layanantirtasukapura/',
    ],
    [
        'title' => 'Bukaan Kembali & Balik Nama',
        'steps' => ['Ajukan permohonan di loket pelayanan.', 'Bawa KTP & nomor sambungan pelanggan.', 'Selesaikan administrasi sesuai ketentuan.'],
        'href'  => 'https://www.perumdaairminumtirtasukapura.com/page/detail/prosedur-balik-nama',
    ],
];

$newsItems = [
    [
        'id'       => 'perbaikan-pipa-300mm',
        'title'    => 'Perbaikan Kebocoran 2 Pipa Distribusi 300 mm Selesai',
        'category' => 'Perbaikan',
        'date'     => 'Pembaruan Layanan',
        'content'  => [
            'Perbaikan kebocoran pada dua jalur pipa distribusi utama berdiameter 300 mm telah selesai dilaksanakan.',
            'Aliran air mulai dibuka kembali dan penormalan tekanan berlangsung secara bertahap menuju wilayah pelanggan terdampak.',
            'Jika masih terjadi kendala aliran, hubungi Call Center +62 821-2910-2345 atau menu Pengaduan Online.',
        ],
        'image'    => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_8019.jpg',
        'href'     => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pekerjaan-perbaikan-kebocoran-2-pipa-distribusi-300-mm-telah-selesai',
    ],
    [
        'id'       => 'pipa-terbawa-longsor',
        'title'    => '2 Pipa Distribusi 300 mm Terbawa Longsor, Suplai Terganggu',
        'category' => 'Gangguan',
        'date'     => 'Info Gangguan',
        'content'  => [
            'Bencana longsor berdampak pada dua jalur pipa distribusi 300 mm sehingga suplai air ke beberapa wilayah terganggu sementara.',
            'Tim reaksi cepat telah diterjunkan untuk penggantian material dan pemulihan aliran secepatnya.',
        ],
        'image'    => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/IMG_7549.jpg',
        'href'     => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/2-pipa-distribusi-300-mm-terbawa-longsor-suplai-air-ke-beberapa-wilayah-terganggu',
    ],
    [
        'id'       => 'pencapaian-kinerja-2024',
        'title'    => 'Pencapaian Kinerja Perumda Air Minum Tirta Sukapura',
        'category' => 'Kinerja',
        'date'     => 'Laporan',
        'content'  => [
            'Perumda Air Minum Tirta Sukapura terus meningkatkan cakupan layanan air bersih dan transformasi digital melalui SIMPADU, SIMPEL, dan GIS.',
        ],
        'image'    => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Pencapaian_Kinerja_Tahun_2024.jpg',
        'href'     => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/pencapaian-kinerja-perumda-air-minum-tirta-sukapura-tahun-2024',
    ],
    [
        'id'       => 'info-gangguan-aliran',
        'title'    => 'Informasi Pemeliharaan & Pengurasan Reservoir Berkala',
        'category' => 'Pengumuman',
        'date'     => 'Info Pelanggan',
        'content'  => [
            'Pemeliharaan berkala jaringan dan pengurasan reservoir dilaksanakan guna menjaga kejernihan dan kualitas distribusi air minum.',
        ],
        'image'    => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/16_Pemberitahuan.jpg',
        'href'     => 'https://www.perumdaairminumtirtasukapura.com/berita/detail/informasi-gangguan-aliran-air--senin-02-september-2024',
    ],
];

$paymentPartners = [
    ['name' => 'Bank BJB', 'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/logo-bank-bjb_169.png'],
    ['name' => 'Bank BJB Syariah', 'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/bjb_syariah.png'],
    ['name' => 'Bank BNI', 'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Logo_bank_BNI.png'],
    ['name' => 'Bank Mandiri', 'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/Bank_Mandiri_logo_2016_svg.png'],
    ['name' => 'Pos Indonesia', 'logo' => 'https://www.perumdaairminumtirtasukapura.com/asset/foto_berita/POSIND_2023.png'],
];
