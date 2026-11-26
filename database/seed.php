<?php
declare(strict_types=1);

/**
 * CLI Seeder Idempoten — Mengisi database perumda_tirtasukapura dari data resmi Perumda
 * Jalankan via CLI: php database/seed.php
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Seeder hanya boleh dijalankan dari CLI.');
}

// Matikan DB hydration saat membaca data sumber statis
define('PERUMDA_SKIP_DB_LOAD', true);
require_once __DIR__ . '/../config/data.php';
require_once __DIR__ . '/../config/database.php';

$pdo = getDb();
if (!$pdo) {
    fwrite(STDERR, "Gagal terhubung ke MySQL. Pastikan database perumda_tirtasukapura sudah dibuat (import database/schema.sql).\n");
    exit(1);
}

$pdo->beginTransaction();

try {
    // 1. Seed Users / Authors
    $authorNames = array_values(array_unique(array_merge(
        ['Admin Humas Tirta Sukapura'],
        array_column($newsItems, 'author')
    )));

    $userMap = [];
    $stmtUser = $pdo->prepare("
        INSERT INTO users (name, email, password_hash, role)
        VALUES (:name, :email, :hash, :role)
        ON DUPLICATE KEY UPDATE name = VALUES(name)
    ");
    $stmtFindUser = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');

    foreach ($authorNames as $idx => $name) {
        $slugEmail = preg_replace('/[^a-z0-9]+/', '.', strtolower($name));
        $email = trim((string) $slugEmail, '.') . '@tirtasukapura.local';
        $role = $idx === 0 ? 'superadmin' : 'editor';
        $stmtUser->execute([
            ':name'  => $name,
            ':email' => $email,
            ':hash'  => password_hash('GantiPasswordKantor2026!', PASSWORD_BCRYPT),
            ':role'  => $role,
        ]);
        $stmtFindUser->execute([':email' => $email]);
        $userMap[$name] = (int) $stmtFindUser->fetchColumn();
    }

    // 2. Seed News Categories
    $categories = ['Perbaikan', 'Info Gangguan', 'Panduan', 'Kinerja', 'Pengumuman'];
    $catMap = [];
    $stmtCat = $pdo->prepare("
        INSERT INTO news_categories (name, slug, sort_order)
        VALUES (:name, :slug, :sort_order)
        ON DUPLICATE KEY UPDATE name = VALUES(name), sort_order = VALUES(sort_order)
    ");
    $stmtFindCat = $pdo->prepare('SELECT id FROM news_categories WHERE slug = :slug LIMIT 1');

    foreach ($categories as $order => $catName) {
        $catSlug = trim((string) preg_replace('/[^a-z0-9]+/', '-', strtolower($catName)), '-');
        $stmtCat->execute([':name' => $catName, ':slug' => $catSlug, ':sort_order' => $order + 1]);
        $stmtFindCat->execute([':slug' => $catSlug]);
        $catMap[$catName] = (int) $stmtFindCat->fetchColumn();
    }

    // 3. Seed News (FK -> news_categories & users)
    $stmtNews = $pdo->prepare("
        INSERT INTO news
            (category_id, author_id, slug, title, excerpt, key_points_json, sections_json, image_url, fallback_image, source_url, read_time, status, published_at)
        VALUES
            (:category_id, :author_id, :slug, :title, :excerpt, :key_points_json, :sections_json, :image_url, :fallback_image, :source_url, :read_time, 'published', :published_at)
        ON DUPLICATE KEY UPDATE
            category_id = VALUES(category_id),
            author_id = VALUES(author_id),
            title = VALUES(title),
            excerpt = VALUES(excerpt),
            key_points_json = VALUES(key_points_json),
            sections_json = VALUES(sections_json),
            image_url = VALUES(image_url),
            fallback_image = VALUES(fallback_image),
            source_url = VALUES(source_url),
            read_time = VALUES(read_time),
            published_at = VALUES(published_at)
    ");

    foreach ($newsItems as $item) {
        $stmtNews->execute([
            ':category_id'     => $catMap[$item['category']] ?? reset($catMap),
            ':author_id'       => $userMap[$item['author']] ?? reset($userMap),
            ':slug'            => $item['slug'],
            ':title'           => $item['title'],
            ':excerpt'         => $item['excerpt'],
            ':key_points_json' => json_encode($item['key_points'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            ':sections_json'   => json_encode($item['sections'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            ':image_url'       => $item['image'],
            ':fallback_image'  => $item['fallback_img'],
            ':source_url'      => $item['source_url'] ?? null,
            ':read_time'       => $item['read_time'],
            ':published_at'    => $item['published_iso'],
        ]);
    }

    // 4. Seed Branches (17 Cabang/Unit — reset safely only if empty to preserve FK references)
    $existingBranches = (int) $pdo->query('SELECT COUNT(*) FROM branches')->fetchColumn();
    if ($existingBranches === 0) {
        $stmtBranch = $pdo->prepare("
            INSERT INTO branches (name, area, address, phone, is_active, sort_order)
            VALUES (:name, :area, :address, :phone, 1, :sort_order)
        ");
        foreach ($branches as $idx => $b) {
            $stmtBranch->execute([
                ':name'       => $b['name'],
                ':area'       => $b['area'],
                ':address'    => $b['address'],
                ':phone'      => $b['phone'],
                ':sort_order' => $idx + 1,
            ]);
        }
    }

    // 5. Seed Water Sources (9 Sumber Air = 513 L/dtk)
    $existingSources = (int) $pdo->query('SELECT COUNT(*) FROM water_sources')->fetchColumn();
    if ($existingSources === 0) {
        $stmtSrc = $pdo->prepare("
            INSERT INTO water_sources (name, source_type, built_year, capacity_lps, sort_order)
            VALUES (:name, :source_type, :built_year, :capacity_lps, :sort_order)
        ");
        foreach ($waterSources as $idx => $src) {
            $stmtSrc->execute([
                ':name'         => $src['name'],
                ':source_type'  => $src['type'],
                ':built_year'   => (int) $src['year'],
                ':capacity_lps' => (int) $src['capacity'],
                ':sort_order'   => $idx + 1,
            ]);
        }
    }

    // 6. Seed Coverage Stats (2019–2023)
    $stmtCov = $pdo->prepare("
        INSERT INTO coverage_stats (stat_year, kab_pct, kota_pct, total_pct)
        VALUES (:year, :kab, :kota, :total)
        ON DUPLICATE KEY UPDATE
            kab_pct = VALUES(kab_pct),
            kota_pct = VALUES(kota_pct),
            total_pct = VALUES(total_pct)
    ");
    $toFloat = static fn(string $pct): float => (float) str_replace([',', '%'], ['.', ''], $pct);
    foreach ($coverageStats as $row) {
        $stmtCov->execute([
            ':year'  => (int) $row['year'],
            ':kab'   => $toFloat($row['kab']),
            ':kota'  => $toFloat($row['kota']),
            ':total' => $toFloat($row['total']),
        ]);
    }

    $pdo->commit();

    echo "Seed berhasil dijalankan ke database perumda_tirtasukapura:\n";
    foreach (['users', 'news_categories', 'news', 'branches', 'water_sources', 'coverage_stats', 'contact_messages'] as $tbl) {
        $cnt = (int) $pdo->query("SELECT COUNT(*) FROM `{$tbl}`")->fetchColumn();
        echo "  - {$tbl}: {$cnt} baris\n";
    }
} catch (Throwable $e) {
    $pdo->rollBack();
    fwrite(STDERR, 'Seed gagal: ' . $e->getMessage() . "\n");
    exit(1);
}
