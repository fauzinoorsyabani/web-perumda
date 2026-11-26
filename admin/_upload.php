<?php
declare(strict_types=1);

/**
 * Upload Gambar Berita Aman (Anti Web-Shell)
 * - Validasi error & ukuran (maksimal 2 MB)
 * - Validasi MIME biner asli via finfo (bukan percaya ekstensi nama file!)
 * - Validasi dimensi gambar nyata via getimagesize()
 * - Rename nama file secara acak (random_bytes)
 */

function handleNewsImageUpload(array $file): array
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return ['ok' => true, 'path' => null];
    }

    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        return ['ok' => false, 'error' => 'Upload gambar gagal (kode error: ' . (int) $file['error'] . ').'];
    }

    $maxBytes = 2 * 1024 * 1024; // 2 MB
    if (($file['size'] ?? 0) <= 0 || ($file['size'] ?? 0) > $maxBytes) {
        return ['ok' => false, 'error' => 'Ukuran gambar maksimal 2 MB.'];
    }

    $tmpPath = (string) ($file['tmp_name'] ?? '');
    if ($tmpPath === '' || !is_uploaded_file($tmpPath)) {
        return ['ok' => false, 'error' => 'File upload tidak valid.'];
    }

    // 1. Cek MIME biner asli dengan finfo
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = (string) $finfo->file($tmpPath);

    $allowedMap = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    ];
    if (!isset($allowedMap[$mime])) {
        return ['ok' => false, 'error' => 'Format ditolak. Hanya gambar JPG, PNG, atau WEBP asli yang diizinkan.'];
    }

    // 2. Pastikan benar-benar gambar (menolak script PHP yang disamarkan sebagai gambar)
    $imgInfo = @getimagesize($tmpPath);
    if ($imgInfo === false || empty($imgInfo[0]) || empty($imgInfo[1])) {
        return ['ok' => false, 'error' => 'File tidak terdeteksi sebagai gambar valid.'];
    }

    // 3. Simpan dengan nama acak aman di folder uploads non-eksekusi
    $uploadDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'news';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
        return ['ok' => false, 'error' => 'Folder upload tidak dapat dibuat.'];
    }

    $ext = $allowedMap[$mime];
    $safeName = 'news_' . date('Ymd') . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
    $destPath = $uploadDir . DIRECTORY_SEPARATOR . $safeName;

    if (!move_uploaded_file($tmpPath, $destPath)) {
        return ['ok' => false, 'error' => 'Gagal menyimpan file gambar ke server.'];
    }

    return ['ok' => true, 'path' => 'assets/uploads/news/' . $safeName];
}
