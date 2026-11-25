# Portal Website Perumda Air Minum Tirta Sukapura (Redesign 2026 — PHP)

Redesign modern website resmi **Perumda Air Minum Tirta Sukapura Kabupaten Tasikmalaya** menggunakan **PHP Native Modular (PHP 7.4 / 8.x)** + **Tailwind CSS v4** + **Vanilla JS**, siap langsung dipasang di server **Apache / cPanel / Laragon / Herd / XAMPP** tanpa proses build Node.js.

## Struktur Folder
```
├── index.php                     # Entry point utama
├── .htaccess                     # Konfigurasi Apache & proteksi folder internal
├── favicon.ico                   # Favicon resmi Perumda
├── config/
│   ├── data.php                  # Data konten website (layanan, berita, sejarah, tarif, mitra)
│   └── database.example.php      # Template koneksi PDO MySQL/MariaDB
├── includes/
│   ├── header.php                # Head, top utility bar, glassmorphic navbar
│   ├── hero.php                  # Hero section & akses cepat pelanggan
│   ├── services.php              # 6 layanan digital + kalkulator estimasi tagihan air
│   ├── profile.php               # Tab Sejarah, Visi Misi, Sistem Air Minum, Prosedur
│   ├── news.php                  # Berita, filter kategori, & modal reader
│   └── footer.php                # Mitra pembayaran, SIMPADU/GIS, kontak, & footer
└── assets/
    ├── css/custom.css            # Custom styling & animasi
    ├── js/app.js                 # Interaksi menu mobile, kalkulator, tab, filter & modal
    └── images/logo-perumda.png   # Logo resmi Perumda Tirta Sukapura
```

## Cara Menjalankan di Lokal
1. **Laragon / XAMPP**: simpan/clone folder ini di `C:\laragon\www\web-perumda` atau `C:\xampp\htdocs\web-perumda`, lalu buka `http://localhost/web-perumda`.
2. **PHP Built-in Server**:
   ```bash
   php -S localhost:8000
   ```
3. **Upload ke Server Kantor (Apache / cPanel)**: upload seluruh isi folder ke `public_html` atau `/var/www/html`.
