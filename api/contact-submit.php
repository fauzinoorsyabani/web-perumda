<?php
declare(strict_types=1);

session_start();
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method tidak diizinkan.']);
    exit;
}

require_once __DIR__ . '/../config/repository.php';

$raw = file_get_contents('php://input');
$input = json_decode((string) $raw, true);
if (!is_array($input)) {
    $input = $_POST;
}

// 1. Verifikasi CSRF Token
$sessionToken = (string) ($_SESSION['csrf_token'] ?? '');
$requestToken = (string) ($input['csrf_token'] ?? '');
if ($sessionToken === '' || !hash_equals($sessionToken, $requestToken)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'Sesi formulir kedaluwarsa. Muat ulang halaman lalu coba lagi.']);
    exit;
}

// 2. Rate-limit sederhana per sesi (minimal jeda 5 detik antar kiriman)
$now = time();
$lastSubmit = (int) ($_SESSION['last_contact_submit'] ?? 0);
if (($now - $lastSubmit) < 5) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'error' => 'Tunggu beberapa detik sebelum mengirim pesan lagi.']);
    exit;
}

// 3. Validasi input
$name = trim((string) ($input['name'] ?? ''));
$nosam = trim((string) ($input['nosam'] ?? ''));
$topic = trim((string) ($input['topic'] ?? ''));
$area = trim((string) ($input['area'] ?? ''));
$message = trim((string) ($input['message'] ?? ''));
$branchId = isset($input['branch_id']) ? (int) $input['branch_id'] : null;

if ($name === '' || mb_strlen($name) > 120) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => 'Nama wajib diisi (maksimal 120 karakter).']);
    exit;
}
if ($area === '' || mb_strlen($area) > 120) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => 'Kecamatan / wilayah wajib diisi.']);
    exit;
}
if ($message === '' || mb_strlen($message) < 8 || mb_strlen($message) > 2000) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => 'Pesan minimal 8 karakter dan maksimal 2000 karakter.']);
    exit;
}

$allowedTopics = [
    'Informasi Tagihan',
    'Gangguan Aliran / Pipa Bocor',
    'Pendaftaran Sambungan Baru',
    'Balik Nama / Bukaan Kembali',
    'Saran dan Masukan',
];
if (!in_array($topic, $allowedTopics, true)) {
    $topic = 'Saran dan Masukan';
}

try {
    $result = repoInsertContactMessage([
        'branch_id'     => $branchId,
        'customer_name' => $name,
        'customer_no'   => mb_substr($nosam, 0, 40),
        'topic'         => $topic,
        'area'          => $area,
        'message'       => $message,
        'ip_address'    => $_SERVER['REMOTE_ADDR'] ?? null,
    ]);

    $_SESSION['last_contact_submit'] = $now;

    if (!$result['saved']) {
        http_response_code(503);
        echo json_encode(['ok' => false, 'error' => 'Database sementara tidak tersedia. Silakan lanjutkan lewat WhatsApp.']);
        exit;
    }

    $ticketCode = sprintf('MSG-%04d', (int) $result['id']);
    echo json_encode([
        'ok'      => true,
        'ticket'  => $ticketCode,
        'message' => "Pesan tersimpan di sistem dengan nomor {$ticketCode}. Tim layanan kami akan menindaklanjuti.",
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Terjadi kendala saat menyimpan pesan.']);
}
