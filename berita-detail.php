<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$article = findNewsBySlug($slug, $newsItems) ?? $newsItems[0];

$baseUrl = getSiteBaseUrl();
$activePage = 'berita';
$pageType = 'article';
$pageTitle = $article['title'] . ' | ' . $officeInfo['name'];
$pageDescription = $article['excerpt'];
$canonicalPath = '/berita-detail.php?slug=' . urlencode($article['slug']);
$pageImage = str_starts_with($article['image'], 'http')
    ? $article['image']
    : ($baseUrl . '/' . ltrim($article['image'], '/'));

$articleSchema = [
    '@type'            => 'NewsArticle',
    'headline'         => $article['title'],
    'description'      => $article['excerpt'],
    'image'            => [$pageImage],
    'datePublished'    => $article['published_iso'],
    'dateModified'     => $article['published_iso'],
    'author'           => ['@type' => 'Organization', 'name' => $article['author']],
    'publisher'        => ['@id' => $baseUrl . '/#organization'],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $baseUrl . $canonicalPath],
    'inLanguage'       => 'id-ID',
];

$extraSchemas = [
    buildBreadcrumbSchema([
        ['name' => 'Beranda', 'url' => '/'],
        ['name' => 'Berita', 'url' => '/berita.php'],
        ['name' => $article['title'], 'url' => $canonicalPath],
    ], $baseUrl),
    $articleSchema,
];

require_once __DIR__ . '/includes/header.php';

$relatedNews = array_values(array_filter($newsItems, fn($n) => $n['slug'] !== $article['slug']));
$relatedNews = array_slice($relatedNews, 0, 3);
?>

<main class="flex-1 bg-white">
  <article class="py-12 lg:py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-xs text-[#52606D] mb-6">
        <a href="index.php" class="hover:text-[#005A8D]">Beranda</a>
        <span>/</span>
        <a href="berita.php" class="hover:text-[#005A8D]">Berita</a>
        <span>/</span>
        <span class="text-[#102A43] font-semibold"><?= e($article['category']) ?></span>
      </nav>

      <div class="flex flex-wrap items-center gap-2.5 text-xs font-semibold mb-3">
        <span class="text-[#005A8D] uppercase tracking-wider"><?= e($article['category']) ?></span>
        <span class="text-slate-300">|</span>
        <span class="text-[#52606D] font-normal"><?= e($article['date_display']) ?></span>
        <span class="text-slate-300">|</span>
        <span class="text-[#52606D] font-normal"><?= e($article['read_time']) ?></span>
        <span class="text-slate-300">|</span>
        <span class="text-[#52606D] font-normal"><?= e($article['author']) ?></span>
      </div>

      <h1 class="font-display text-3xl sm:text-4xl font-extrabold text-[#102A43] leading-[1.15]">
        <?= e($article['title']) ?>
      </h1>

      <p class="text-base sm:text-lg text-[#52606D] mt-4 leading-relaxed">
        <?= e($article['excerpt']) ?>
      </p>

      <figure class="mt-7 rounded-md overflow-hidden bg-[#EFEFE9] aspect-[16/9]">
        <img
          src="<?= e($article['image']) ?>"
          alt="<?= e($article['title']) ?>"
          class="w-full h-full object-cover"
          onerror="this.src='<?= e($article['fallback_img']) ?>'"
        />
      </figure>

      <!-- Ringkasan Cepat (AEO Direct Summary) -->
      <?php if (!empty($article['key_points'])): ?>
        <aside class="mt-8 bg-[#F7F7F5] border-l-4 border-[#005A8D] p-5 rounded-r-md">
          <div class="font-display font-bold text-xs uppercase tracking-wider text-[#102A43] mb-2.5">
            Ringkasan
          </div>
          <ul class="space-y-2 text-sm text-[#1C242B] list-disc pl-5">
            <?php foreach ($article['key_points'] as $pt): ?>
              <li><?= e($pt) ?></li>
            <?php endforeach; ?>
          </ul>
        </aside>
      <?php endif; ?>

      <!-- Body -->
      <div class="mt-8 space-y-7 text-base text-[#1C242B] leading-relaxed">
        <?php foreach ($article['sections'] as $sec): ?>
          <section class="space-y-2">
            <h2 class="font-display text-xl font-bold text-[#102A43]">
              <?= e($sec['heading']) ?>
            </h2>
            <p class="text-[#1C242B]"><?= e($sec['body']) ?></p>
          </section>
        <?php endforeach; ?>
      </div>

      <!-- Footer Share & Back -->
      <div class="mt-10 pt-6 border-t border-[#DCE1E5] flex flex-wrap items-center justify-between gap-4">
        <a href="berita.php" class="inline-flex items-center gap-2 text-sm font-bold text-[#102A43] hover:text-[#005A8D]">
          <i data-lucide="arrow-left" class="w-4 h-4"></i>
          <span>Semua Berita</span>
        </a>

        <div class="flex items-center gap-2.5">
          <button
            type="button"
            id="copy-link-btn"
            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-md bg-[#F7F7F5] border border-[#DCE1E5] hover:bg-[#EFEFE9] text-xs font-bold text-[#102A43] cursor-pointer"
          >
            <i data-lucide="link-2" class="w-3.5 h-3.5"></i>
            <span>Salin Tautan</span>
          </button>
          <a
            href="https://wa.me/?text=<?= urlencode($article['title'] . ' ' . $baseUrl . $canonicalPath) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-xs font-bold text-white"
          >
            <i data-lucide="share-2" class="w-3.5 h-3.5"></i>
            <span>Bagikan WhatsApp</span>
          </a>
        </div>
      </div>
    </div>
  </article>

  <!-- Related News -->
  <section class="py-14 bg-[#F7F7F5] border-t border-[#DCE1E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-baseline justify-between mb-8">
        <h2 class="font-display text-xl font-extrabold text-[#102A43]">Tulisan Lainnya</h2>
        <a href="berita.php" class="text-sm font-bold text-[#005A8D] hover:underline">Lihat semua</a>
      </div>
      <div class="grid md:grid-cols-3 gap-7">
        <?php foreach ($relatedNews as $rel): ?>
          <a href="berita-detail.php?slug=<?= urlencode($rel['slug']) ?>" class="group block">
            <div class="aspect-[16/10] rounded-md overflow-hidden bg-[#EFEFE9]">
              <img
                src="<?= e($rel['image']) ?>"
                alt="<?= e($rel['title']) ?>"
                loading="lazy"
                class="w-full h-full object-cover img-scale"
                onerror="this.src='<?= e($rel['fallback_img']) ?>'"
              />
            </div>
            <div class="mt-3">
              <div class="text-xs font-semibold text-[#005A8D]"><?= e($rel['category']) ?></div>
              <h3 class="font-display font-bold text-base text-[#102A43] group-hover:text-[#005A8D] mt-1 leading-snug line-clamp-2">
                <?= e($rel['title']) ?>
              </h3>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
