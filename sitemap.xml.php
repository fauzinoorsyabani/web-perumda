<?php
declare(strict_types=1);

header('Content-Type: application/xml; charset=UTF-8');
require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$base = getSiteBaseUrl();
$today = date('Y-m-d');

$staticPages = [
    ['loc' => '/',              'priority' => '1.0', 'changefreq' => 'daily'],
    ['loc' => '/profil.php',    'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/air-minum.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/layanan.php',   'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/tarif.php',     'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/berita.php',    'priority' => '0.9', 'changefreq' => 'daily'],
    ['loc' => '/galeri.php',    'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/kontak.php',    'priority' => '0.8', 'changefreq' => 'monthly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($staticPages as $page): ?>
  <url>
    <loc><?= e($base . $page['loc']) ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq><?= $page['changefreq'] ?></changefreq>
    <priority><?= $page['priority'] ?></priority>
  </url>
<?php endforeach; ?>
<?php foreach ($newsItems as $news): ?>
  <url>
    <loc><?= e($base . '/berita-detail.php?slug=' . urlencode($news['slug'])) ?></loc>
    <lastmod><?= e($news['published_iso']) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
<?php endforeach; ?>
</urlset>
