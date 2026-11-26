<?php
declare(strict_types=1);

/**
 * Konten Resmi Lengkap Perumda Air Minum Tirta Sukapura
 * Diekstrak langsung dari situs resmi perumdaairminumtirtasukapura.com
 */

$navMenus = [
    ['id' => 'beranda', 'label' => 'Beranda', 'href' => 'index.php', 'children' => []],
    [
        'id'       => 'profil',
        'label'    => 'Profil',
        'href'     => 'profil.php',
        'children' => [
            ['label' => 'Sejarah Singkat',     'href' => 'profil.php#sejarah'],
            ['label' => 'Visi dan Misi',       'href' => 'profil.php#visi-misi'],
            ['label' => 'Direktur & Dewas',    'href' => 'profil.php#pimpinan'],
            ['label' => 'Struktur Organisasi', 'href' => 'profil.php#struktur'],
            ['label' => 'Kepegawaian',         'href' => 'profil.php#kepegawaian'],
            ['label' => 'Program Kerja',       'href' => 'profil.php#program-kerja'],
            ['label' => 'Filosofi Logo',       'href' => 'profil.php#filosofi-logo'],
        ],
    ],
    [
        'id'       => 'air-minum',
        'label'    => 'Air Minum',
        'href'     => 'air-minum.php',
        'children' => [
            ['label' => 'Sumber Air Baku',     'href' => 'air-minum.php#sumber-air'],
            ['label' => 'Kapasitas Produksi',  'href' => 'air-minum.php#kapasitas'],
            ['label' => 'Sistem Distribusi',   'href' => 'air-minum.php#distribusi'],
            ['label' => 'Cakupan Pelayanan',   'href' => 'air-minum.php#cakupan'],
        ],
    ],
    [
        'id'       => 'layanan',
        'label'    => 'Pelanggan',
        'href'     => 'layanan.php',
        'children' => [
            ['label' => 'Layanan Digital Online',      'href' => 'layanan.php#portal'],
            ['label' => 'Prosedur Sambungan Baru',     'href' => 'layanan.php#prosedur-sambar'],
            ['label' => 'Prosedur Bukaan Kembali',     'href' => 'layanan.php#prosedur-bukaan'],
            ['label' => 'Prosedur Penutupan Sambungan','href' => 'layanan.php#prosedur-penutupan'],
            ['label' => 'Prosedur Pembayaran Rekening','href' => 'layanan.php#prosedur-pembayaran'],
            ['label' => 'Prosedur Balik Nama',         'href' => 'layanan.php#prosedur-balik-nama'],
        ],
    ],
    [
        'id'       => 'tarif',
        'label'    => 'Tarif',
        'href'     => 'tarif.php',
        'children' => [
            ['label' => 'Klasifikasi Pelanggan', 'href' => 'tarif.php#klasifikasi'],
            ['label' => 'Tarif Air 2025',        'href' => 'tarif.php#tarif-air'],
            ['label' => 'Tarif Pemasangan Baru', 'href' => 'tarif.php#biaya-sambar'],
            ['label' => 'Simulasi Tagihan',      'href' => 'tarif.php#simulasi'],
            ['label' => 'Mitra Pembayaran',      'href' => 'tarif.php#mitra'],
        ],
    ],
    ['id' => 'berita', 'label' => 'Berita', 'href' => 'berita.php', 'children' => []],
    ['id' => 'galeri', 'label' => 'Galeri', 'href' => 'galeri.php', 'children' => []],
    ['id' => 'kontak', 'label' => 'Kontak', 'href' => 'kontak.php', 'children' => []],
];

$leadership = [
    ['role' => 'Bupati Kabupaten Tasikmalaya',       'name' => 'H. Cecep Nurul Yakin, S.Pd., M.AP',     'group' => 'KPM / Kepala Daerah'],
    ['role' => 'Wakil Bupati Kabupaten Tasikmalaya', 'name' => 'H. Asep Sopari Al Ayubi, S.P., M.I.P.', 'group' => 'Kepala Daerah'],
    ['role' => 'Dewan Pengawas',                     'name' => 'Dr. H. Rubi Azhara, S.STP., M.Si',      'group' => 'Pengawas'],
    ['role' => 'Direktur',                           'name' => 'H. Bekti Alamsyah, ST',                 'group' => 'Direksi'],
];

$staffCentral = [
    [
        'unit' => 'Satuan Pengawas Intern (SPI)',
        'head' => 'Dani Syam Iskandar, SE',
        'subs' => [
            'Pengawas Bidang Umum: Herti Sugiharti, SE',
            'Pengawas Bidang Teknik: Irwan Fakhrudin, S.E',
        ],
    ],
    [
        'unit' => 'Bagian Umum & SDM',
        'head' => 'Rekso Sandi Yudho, SE',
        'subs' => [
            'Kasubag. Sumber Daya Manusia: Seanter Mustika Budiman, S.P.',
            'Kasubag. TU & Rumah Tangga: Amin Aprianto, A.Md',
            'Kasubag. Perlengkapan: Nining Rosmiati, S.Pd',
        ],
    ],
    [
        'unit' => 'Bagian Keuangan',
        'head' => 'Ari Gunawan, SE',
        'subs' => [
            'Kasubag. Akuntansi: Nining Rosmiati, S.Pd',
            'Kasubag. Anggaran: Andi Ari Pratama, ST',
            'Kasubag. Kas & Perbendaharaan: Cecep Sukandar, SE',
        ],
    ],
    [
        'unit' => 'Bagian Hubungan Pelanggan',
        'head' => 'H. Risman M. Nugroho, SE',
        'subs' => [
            'Kasubag. Promosi & Info Pelanggan: Iri Sofyan Sauri',
            'Kasubag. Pengolahan Data Pelanggan: Gunawan Satileh, S.IP',
        ],
    ],
    [
        'unit' => 'Bagian Perencanaan, Evaluasi & Pelaporan',
        'head' => 'Okeu Permana, ST',
        'subs' => [
            'Kasubag. Perencanaan: Deny Irawan Koswara, S.Sos',
            'Kasubag. Penelitian, Evaluasi & Pelaporan: Asep Yedi Rahmat, S.Kom',
        ],
    ],
    [
        'unit' => 'Bagian Produksi & Distribusi',
        'head' => 'Hendra Suryawan Kusumah, S.E',
        'subs' => [
            'Kasubag. Produksi: Joni Kuswara, S.Sos',
            'Kasubag. Distribusi: Chepy Rakhman',
        ],
    ],
    [
        'unit' => 'Bagian Pengendalian Kehilangan Air',
        'head' => 'Beni Kusmana, S.E',
        'subs' => [
            'Kasubag. Instalasi, Transmisi & Distribusi: Lukman Nurhakim',
            'Kasubag. Pengendalian Kehilangan Air: Jajang Budiawan, SE',
        ],
    ],
    [
        'unit' => 'Unit Pendukung Khusus',
        'head' => 'Kepala Unit',
        'subs' => [
            'Unit Pengelolaan Teknologi Informasi: Ahmad Yudiana, S.Si',
            'Unit Kolam Renang: Deden Insan Subekti',
        ],
    ],
];

$staffBranches = [
    ['unit' => 'Cabang Tasikmalaya Barat', 'head' => 'Dede Darja, ST',               'subs' => ['Adm & Keu: Andi Mulyadi, S.E', 'Info & Pel: Siti Rukiyah, A.Md.', 'Teknik: Cucu Rusla']],
    ['unit' => 'Cabang Tasikmalaya Timur', 'head' => 'Cecep Wendi Setiadi, S.IP',    'subs' => ['Adm & Keu: Ida Nurfarida, S.Kom', "Info & Pel: Ipan Ahmad Ripa'i", 'Teknik: Adih Herdiana, S.Ip']],
    ['unit' => 'Cabang Kawalu',            'head' => 'Zainal Atorid Mahmud, S.Si., M.M', 'subs' => ['Adm & Keu: Susilawati, S.E', 'Info & Pel: Ian Suryana, S.Sos', 'Teknik: Herdis Herdianto, S.Sos']],
    ['unit' => 'Cabang Cibeureum',         'head' => 'Darwin Baas, ST',              'subs' => ['Adm & Keu: Popon Widaningsih, S.Sos', 'Info & Pel: Rian Sobariah, SE', 'Teknik: Ferywan Triyono, SE']],
    ['unit' => 'Cabang Indihiang',         'head' => 'Tresnawaty, S.E',              'subs' => ['Umum: Nina Yumalia Indrawati, S.E', 'Teknik: Dani Ramdani, S.IP']],
    ['unit' => 'Cabang Tamansari',         'head' => 'Wawan Rizwan, S.Sos',          'subs' => ['Umum: Leni Yuliani', 'Teknik: Sandi Susandi']],
    ['unit' => 'Cabang Singaparna',        'head' => 'Didih Mulyana, S.Sos',         'subs' => ['Adm & Keu: Santika Wijana, S.Sos', 'Info & Pel: Jajang Barnas, S.Sos', 'Teknik: Dani Abdul Mannan, S.H']],
    ['unit' => 'Cabang Ciawi',             'head' => 'Iis Risnawati, ST',            'subs' => ['Umum: Dahlia Hasanah, SE', 'Teknik: Rahmat Azis, S.Sos.']],
    ['unit' => 'Cabang Manonjaya',         'head' => 'Nono Supriyono, S.Sos',        'subs' => ['Umum: Iin Mulyani, S.Pd', 'Teknik: Ferywan Triyono, SE']],
    ['unit' => 'Cabang Bantarkalong',      'head' => 'Kemal Masani, S.Sos',          'subs' => ['Umum: Yedi Herdiana, S.Sos', 'Teknik: Indra Permana']],
    ['unit' => 'Cabang Mangunreja',        'head' => 'Edin Rohaedin, S.Sos',         'subs' => ['Umum: Ade Widiawati, S.Sos', 'Teknik: Saeful Anwar, S.P']],
    ['unit' => 'Cabang Cisayong',          'head' => 'R. Gumilar Wirawan, S.Sos',    'subs' => ['Adm & Keu: Irfan Jamaludin, SH', 'Info & Pel: Ria Indriani, M.Si', 'Teknik: Didin Syahidin, ST']],
    ['unit' => 'Cabang Sariwangi',         'head' => 'Irvan Fauzi, S.Sos',           'subs' => ['Umum: Tato Rustianto', 'Teknik: Nurizal, S.Sos']],
    ['unit' => 'Unit Sukaraja',            'head' => 'Bolin Rayawan, S.Kom',         'subs' => ['Wilayah Kec. Sukaraja']],
    ['unit' => 'Unit Salawu',              'head' => 'Andri Susandi, S.Sos',         'subs' => ['Wilayah Kec. Salawu']],
    ['unit' => 'Unit Rajapolah',           'head' => 'Dindin Supriatna, S.IP',       'subs' => ['Wilayah Kec. Rajapolah']],
    ['unit' => 'Unit Pagerageung',         'head' => 'Agi Supriadi',                 'subs' => ['Wilayah Kec. Pagerageung']],
];

$workPrograms = [
    'Meningkatkan kesejahteraan pegawai.',
    'Meningkatkan kemampuan SDM melalui berbagai pelatihan kerja.',
    'Mengendalikan kehilangan air lewat evaluasi dan monitoring unit produksi, distribusi, serta pemakaian air.',
    'Meningkatkan kualitas, kuantitas, dan kontinuitas layanan dengan pemeliharaan IPA dan CO2 removal, penyempurnaan jaringan pipa transmisi/distribusi/dinas, pengamanan air baku, serta pemerataan aliran.',
    'Mengembangkan daerah pelayanan pada sistem berdebit memadai dengan pencarian sumber air baku, optimalisasi jaringan, penyusunan DED, dan pra-desain usulan bantuan.',
    'Perintisan usaha Air Minum Dalam Kemasan (AMDK).',
    'Pembenahan dan pengelolaan fasilitas kolam renang.',
    'Meningkatkan efisiensi biaya operasional perusahaan.',
    'Mengoptimalkan efektivitas penagihan rekening air bulanan.',
    'Mendayagunakan sistem informasi untuk peningkatan pelayanan pelanggan.',
];

$logoPhilosophy = [
    ['num' => '01', 'element' => 'Lingkaran abu-abu muda',          'meaning' => 'Simbol kepercayaan masyarakat terhadap perusahaan.'],
    ['num' => '02', 'element' => 'Lingkaran putus-putus abu-abu tua','meaning' => 'Menggambarkan jalur pipa yang dinamis dan semangat melayani seluruh lapisan masyarakat hingga pelosok daerah.'],
    ['num' => '03', 'element' => 'Putih bergaris sisi biru tua',    'meaning' => 'Melambangkan air bersih yang layak dikonsumsi masyarakat.'],
    ['num' => '04', 'element' => 'Warna biru muda',                 'meaning' => 'Melambangkan air resapan tanah dan air hasil pengolahan.'],
    ['num' => '05', 'element' => 'Warna biru tua',                  'meaning' => 'Melambangkan sumber mata air baku yang diolah menjadi air bersih.'],
    ['num' => '06', 'element' => 'Garis tengah bertuliskan Tirta Sukapura', 'meaning' => 'Pipa penghubung dengan semboyan: "Selama air mengalir, Perumda Air Minum Tirta Sukapura Tasikmalaya dengan landasi kejujuran, disiplin, dan profesionalisme terus berupaya melayani masyarakat."'],
];

$distributionSystems = [
    [
        'title'   => 'Sistem Pelayanan Sumber Mata Air Cipondok (Wilayah Regional)',
        'summary' => 'Melayani 9 cabang dan unit utama di wilayah Kota dan Kabupaten Tasikmalaya dari debit utama 367 L/detik.',
        'areas'   => [
            'Cabang Tasikmalaya Barat',
            'Cabang Tasikmalaya Timur',
            'Cabang Singaparna',
            'Cabang Cibeureum',
            'Cabang Kawalu',
            'Cabang Manonjaya',
            'Unit Sariwangi',
            'Cabang Mangunreja',
            'Cabang Tamansari',
        ],
    ],
    [
        'title'   => 'Sistem Pelayanan Sumber Mata Air & IPA Lainnya',
        'summary' => 'Melayani 8 cabang dan unit sesuai sumber mata air setempat serta IPA Sungai Ciwulan & Cilangla.',
        'areas'   => [
            'Unit Salawu',
            'Unit Sukaraja',
            'Cabang Bantarkalong',
            'Cabang Indihiang',
            'Unit Rajapolah',
            'Unit Pagerageung',
            'Cabang Ciawi',
            'Unit Cisayong',
        ],
    ],
];

$officialProcedures = [
    [
        'id'      => 'prosedur-sambar',
        'title'   => 'Prosedur Sambungan Baru',
        'image'   => 'assets/images/official/prosedur-sambar.jpg',
        'summary' => 'Tahapan pendaftaran pemasangan pipa dan meter air bagi calon pelanggan baru melalui portal SIMPEL atau loket cabang.',
        'cta_url' => 'https://simpel.app-tirtasukapura.com/panel/public-page/pendaftaran',
        'cta'     => 'Daftar Online via SIMPEL',
    ],
    [
        'id'      => 'prosedur-bukaan',
        'title'   => 'Prosedur Bukaan Kembali',
        'image'   => 'assets/images/official/prosedur-bukaan.jpg',
        'summary' => 'Ketentuan pengaktifan ulang sambungan air yang sebelumnya ditutup sementara atau diputus karena tunggakan.',
        'cta_url' => 'kontak.php#cabang',
        'cta'     => 'Cari Kantor Cabang',
    ],
    [
        'id'      => 'prosedur-penutupan',
        'title'   => 'Prosedur Penutupan Sambungan',
        'image'   => 'assets/images/official/prosedur-penutupan.jpg',
        'summary' => 'Alur permohonan penutupan sementara atau permanen sambungan air minum atas permintaan pelanggan.',
        'cta_url' => 'kontak.php#cabang',
        'cta'     => 'Hubungi Cabang Terkait',
    ],
    [
        'id'      => 'prosedur-pembayaran',
        'title'   => 'Prosedur Pembayaran Rekening Air',
        'image'   => 'assets/images/official/prosedur-pembayaran.jpg',
        'summary' => 'Tata cara pengecekan dan pelunasan rekening air bulanan melalui bank mitra, Kantor Pos, atau loket resmi.',
        'cta_url' => 'http://asindotama.com/layanantirtasukapura/',
        'cta'     => 'Cek Tagihan Sekarang',
    ],
    [
        'id'      => 'prosedur-balik-nama',
        'title'   => 'Prosedur Balik Nama Pelanggan',
        'image'   => 'assets/images/official/prosedur-balik-nama.jpg',
        'summary' => 'Persyaratan perubahan nama pemilik sambungan air minum karena jual beli, hibah, atau waris.',
        'cta_url' => 'kontak.php#cabang',
        'cta'     => 'Ajukan di Loket Cabang',
    ],
];

$galleryPhotos = [
    [
        'album'   => 'Pemasangan Pipa HDD',
        'title'   => 'Pemasangan Pipa HDD Jl. SL Tobing - Jl. Paseh (Tahap Awal)',
        'image'   => 'assets/images/official/galeri-pipa-hdd.jpg',
        'caption' => 'Pekerjaan pemasangan jaringan pipa metode Horizontal Directional Drilling (HDD) di koridor Jl. SL Tobing - Jl. Paseh.',
    ],
    [
        'album'   => 'Pemasangan Pipa HDD',
        'title'   => 'Pengerjaan Jaringan Malam Hari Jl. SL Tobing - Jl. Paseh',
        'image'   => 'assets/images/official/galeri-pipa-hdd-2.jpg',
        'caption' => 'Pelaksanaan penyambungan jaringan malam hari untuk meminimalkan gangguan lalu lintas dan suplai pelanggan.',
    ],
    [
        'album'   => 'Pemasangan Pipa HDD',
        'title'   => 'Pengawasan Teknis Lapangan Pipa HDD',
        'image'   => 'assets/images/official/galeri-pipa-hdd-3.jpg',
        'caption' => 'Pengecekan galian dan kelurusan pipa distribusi utama oleh tim teknik Perumda Air Minum Tirta Sukapura.',
    ],
    [
        'album'   => 'Kegiatan Pegawai',
        'title'   => 'Kegiatan Peringatan Kemerdekaan RI PDAM Tirta Sukapura',
        'image'   => 'assets/images/official/galeri-agustusan.jpg',
        'caption' => 'Kebersamaan pegawai Perumda Air Minum Tirta Sukapura dalam kegiatan peringatan HUT Kemerdekaan RI.',
    ],
    [
        'album'   => 'Kegiatan Pegawai',
        'title'   => 'Dokumentasi Kegiatan Agustusan Pegawai',
        'image'   => 'assets/images/official/galeri-agustusan-2.jpg',
        'caption' => 'Rangkaian perlombaan dan silaturahmi antar cabang dan unit kerja Perumda Tirta Sukapura.',
    ],
    [
        'album'   => 'Infrastruktur & Air Baku',
        'title'   => 'Instalasi Pengolahan Air Bersih Tasikmalaya',
        'image'   => 'assets/images/hero-water.jpg',
        'caption' => 'Pengolahan air minum dari sumber air pegunungan untuk kebutuhan warga Kabupaten dan Kota Tasikmalaya.',
    ],
    [
        'album'   => 'Infrastruktur & Air Baku',
        'title'   => 'Sumber Mata Air Pegunungan Tasikmalaya',
        'image'   => 'assets/images/spring-source.jpg',
        'caption' => 'Potensi 473 L/detik dari tujuh gugus mata air alami di wilayah Kabupaten Tasikmalaya.',
    ],
];
