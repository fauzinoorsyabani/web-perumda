# Panduan Deploy ke Server Kantor (Apache / cPanel + PHP 8.3)

## 1. Prasyarat Server
- Web server **Apache 2.4+** (`mod_rewrite` dan `mod_headers` aktif)
- **PHP 8.2 atau 8.3** dengan ekstensi: `pdo_mysql`, `mbstring`, `fileinfo`, `json`
- **MySQL 8.0+ / MariaDB 10.6+**

## 2. Persiapan Sebelum Cutover (Wajib!)
1. **Jadwal Aman:** Lakukan pukul **22.00 – 02.00 WIB** atau akhir pekan dini hari. Hindari tanggal 1–5 dan 18–20.
2. **Backup Website Lama:** Kompres folder `public_html` (atau `/var/www/html`) lama dan export database lama.
3. **Backup Database Lokal (Laragon):**
   ```powershell
   powershell -ExecutionPolicy Bypass -File scripts/backup-db.ps1
   ```

## 3. Langkah Upload & Konfigurasi Server
1. Buat database baru di cPanel / MySQL server (misal `perumda_tirtasukapura`) beserta user MySQL khusus yang hanya punya hak akses ke database tersebut (jangan pakai `root` di production).
2. Import `database/schema.sql`, lalu jalankan `php database/seed.php` (atau import hasil backup `.sql` dari Laragon).
3. Upload seluruh file proyek ke `public_html` (kecuali folder `.git`, `.vercel`, dan `backups`).
4. Salin `.env.example` menjadi `.env`, lalu isi kredensial MySQL server kantor:
   ```ini
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_NAME=nama_db_kantor
   DB_USER=user_db_kantor
   DB_PASS=password_kuat_kantor
   ```
5. Pastikan folder `assets/uploads/news/` memiliki izin tulis (`chmod 755` atau `775`) dan file `assets/uploads/.htaccess` ikut terunggah.
6. Set versi PHP domain ini ke **PHP 8.3** melalui **MultiPHP Manager** (cPanel) atau **PHP-FPM per VirtualHost** (VPS Apache) agar aplikasi internal lama (seperti CodeIgniter 2) tidak terpengaruh.

## 4. Checklist Verifikasi Pasca-Deploy (Wajib Dicek!)
- [ ] Login ke `/admin/login.php` dan **segera ganti password bawaan** lewat menu **Akun**.
- [ ] Uji akses `https://domain.com/.env` dan `https://domain.com/config/database.php` → keduanya wajib **403 Forbidden**.
- [ ] Uji akses `https://domain.com/admin/_auth.php` → wajib **403 Forbidden**.
- [ ] Uji kirim 1 pesan dari `/kontak.php` → pastikan tersimpan dan tampil di `/admin/pesan.php`.
- [ ] Uji upload 1 gambar berita di `/admin/berita-form.php` → pastikan gambar tampil di `/berita.php`.
- [ ] Cek `https://domain.com/sitemap.xml.php`, `/robots.txt`, dan `/llms.txt` → semua **200 OK**.
