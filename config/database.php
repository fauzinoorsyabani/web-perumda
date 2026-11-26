<?php
declare(strict_types=1);

/**
 * Koneksi Database PDO MySQL / MariaDB (Singleton)
 * Untuk server kantor (production), atur variabel environment DB_HOST, DB_NAME, DB_USER, DB_PASS
 * atau salin kredensial resmi di server tanpa menaruh password asli ke Git.
 */

function getDb(): ?PDO
{
    static $pdo = false;

    if ($pdo !== false) {
        return $pdo;
    }

    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME') ?: 'perumda_tirtasukapura';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') !== false ? (string) getenv('DB_PASS') : '';

    $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_TIMEOUT            => 3,
        ]);
    } catch (Throwable $e) {
        // Fallback aman agar website publik tetap tampil walau layanan DB sedang maintenance
        $pdo = null;
    }

    return $pdo;
}
