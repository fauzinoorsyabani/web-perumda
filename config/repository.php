<?php
declare(strict_types=1);

require_once __DIR__ . '/database.php';

function formatIndonesianDate(string $isoDate): string
{
    $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];
    $ts = strtotime($isoDate);
    if ($ts === false) {
        return $isoDate;
    }
    $day = (int) date('j', $ts);
    $month = $months[(int) date('n', $ts)] ?? date('F', $ts);
    $year = date('Y', $ts);
    return "{$day} {$month} {$year}";
}

function repoFetchNews(array $fallback): array
{
    $pdo = getDb();
    if (!$pdo) {
        return $fallback;
    }

    try {
        $sql = "
            SELECT
                n.slug,
                n.title,
                c.name AS category,
                n.published_at AS published_iso,
                n.read_time,
                u.name AS author,
                n.image_url AS image,
                n.fallback_image AS fallback_img,
                n.excerpt,
                n.key_points_json,
                n.sections_json,
                n.source_url
            FROM news n
            INNER JOIN news_categories c ON c.id = n.category_id
            INNER JOIN users u ON u.id = n.author_id
            WHERE n.status = 'published'
            ORDER BY n.published_at DESC, n.id DESC
        ";
        $rows = $pdo->query($sql)->fetchAll();
        if (empty($rows)) {
            return $fallback;
        }

        return array_map(static function (array $row): array {
            $keyPoints = json_decode((string) ($row['key_points_json'] ?? '[]'), true);
            $sections = json_decode((string) ($row['sections_json'] ?? '[]'), true);

            return [
                'slug'          => (string) $row['slug'],
                'title'         => (string) $row['title'],
                'category'      => (string) $row['category'],
                'date_display'  => formatIndonesianDate((string) $row['published_iso']),
                'published_iso' => (string) $row['published_iso'],
                'read_time'     => (string) $row['read_time'],
                'author'        => (string) $row['author'],
                'image'         => (string) $row['image'],
                'fallback_img'  => (string) $row['fallback_img'],
                'excerpt'       => (string) $row['excerpt'],
                'key_points'    => is_array($keyPoints) ? $keyPoints : [],
                'sections'      => is_array($sections) ? $sections : [],
                'source_url'    => (string) ($row['source_url'] ?? ''),
            ];
        }, $rows);
    } catch (Throwable $e) {
        return $fallback;
    }
}

function repoFetchBranches(array $fallback): array
{
    $pdo = getDb();
    if (!$pdo) {
        return $fallback;
    }

    try {
        $rows = $pdo->query("
            SELECT id, name, area, address, phone
            FROM branches
            WHERE is_active = 1
            ORDER BY sort_order ASC, id ASC
        ")->fetchAll();
        return !empty($rows) ? $rows : $fallback;
    } catch (Throwable $e) {
        return $fallback;
    }
}

function repoFetchWaterSources(array $fallback): array
{
    $pdo = getDb();
    if (!$pdo) {
        return $fallback;
    }

    try {
        $rows = $pdo->query("
            SELECT name, source_type AS type, CAST(built_year AS CHAR) AS year, capacity_lps AS capacity
            FROM water_sources
            ORDER BY sort_order ASC, capacity_lps DESC
        ")->fetchAll();
        return !empty($rows) ? $rows : $fallback;
    } catch (Throwable $e) {
        return $fallback;
    }
}

function repoFetchCoverageStats(array $fallback): array
{
    $pdo = getDb();
    if (!$pdo) {
        return $fallback;
    }

    try {
        $rows = $pdo->query("
            SELECT stat_year, kab_pct, kota_pct, total_pct
            FROM coverage_stats
            ORDER BY stat_year ASC
        ")->fetchAll();
        if (empty($rows)) {
            return $fallback;
        }
        return array_map(static fn(array $r): array => [
            'year'  => (string) $r['stat_year'],
            'kab'   => number_format((float) $r['kab_pct'], 2, ',', '.') . '%',
            'kota'  => number_format((float) $r['kota_pct'], 2, ',', '.') . '%',
            'total' => number_format((float) $r['total_pct'], 2, ',', '.') . '%',
        ], $rows);
    } catch (Throwable $e) {
        return $fallback;
    }
}

function repoInsertContactMessage(array $payload): array
{
    $pdo = getDb();
    if (!$pdo) {
        return ['saved' => false, 'id' => null, 'error' => 'Database sedang tidak aktif.'];
    }

    $branchId = isset($payload['branch_id']) && (int) $payload['branch_id'] > 0
        ? (int) $payload['branch_id']
        : null;

    // Pastikan branch_id valid jika dikirim (integritas Foreign Key)
    if ($branchId !== null) {
        $check = $pdo->prepare('SELECT id FROM branches WHERE id = :id LIMIT 1');
        $check->execute([':id' => $branchId]);
        if (!$check->fetchColumn()) {
            $branchId = null;
        }
    }

    $stmt = $pdo->prepare("
        INSERT INTO contact_messages
            (branch_id, customer_name, customer_no, topic, area, message, status, ip_address)
        VALUES
            (:branch_id, :customer_name, :customer_no, :topic, :area, :message, 'baru', :ip_address)
    ");

    $stmt->execute([
        ':branch_id'     => $branchId,
        ':customer_name' => $payload['customer_name'],
        ':customer_no'   => $payload['customer_no'] !== '' ? $payload['customer_no'] : null,
        ':topic'         => $payload['topic'],
        ':area'          => $payload['area'],
        ':message'       => $payload['message'],
        ':ip_address'    => $payload['ip_address'] ?? null,
    ]);

    return ['saved' => true, 'id' => (int) $pdo->lastInsertId()];
}
