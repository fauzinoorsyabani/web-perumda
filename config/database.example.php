<?php
declare(strict_types=1);

/**
 * Template koneksi database MySQL / MariaDB (PDO)
 * Salin file ini menjadi config/database.php saat ingin menghubungkan berita/tarif dinamis ke database kantor.
 */

$dbHost = getenv('DB_HOST') ?: '127.0.0.1';
$dbPort = getenv('DB_PORT') ?: '3306';
$dbName = getenv('DB_NAME') ?: 'perumda_tirtasukapura';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';

function getDbConnection(): PDO
{
    global $dbHost, $dbPort, $dbName, $dbUser, $dbPass;

    $dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";

    return new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
}
