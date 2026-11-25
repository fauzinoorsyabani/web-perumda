<?php
declare(strict_types=1);

require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/config/seo.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$article = findNewsBySlug($slug, $newsItems) ?? $newsItems[0];

$baseUrl = getSiteBaseUrl();
$activePage = 'berita';
$pageType = 'article';
$pageTitle = $article['title'] . ' — ' . $officeInfo['name'];
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
  <!-- Article Header -->
  <article class="py-12 lg:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Breadcrumb -->
      <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-xs text-slate-500 mb-6">
        <a href="index.php" class="hover:text-[#026AA2]">Beranda</a>
        <span>/</span>
        <a href="berita.php" class="hover:text-[#026AA2]">Berita</a>
        <span>/</span>
        <span class="text-[#0B2545] font-semibold truncate max-w-xs"><?= e($article['category']) ?></span>
      </nav>

      <!-- Category & Meta -->
      <div class="flex flex-wrap items-center gap-3 text-xs font-semibold mb-4">
        <span class="px-3 py-1 rounded-lg bg-[#E0F2FE] text-[#026AA2]">
          <?= e($article['category']) ?>
        </span>
        <span class="text-slate-500"><?= e($article['date_display']) ?></span>
        <span class="text-slate-300">•</span>
        <span class="text-slate-500"><?= e($article['read_time']) ?></span>
        <span class="text-slate-300">•</span>
        <span class="text-slate-600">Oleh <strong><?= e($article['author']) ?></strong></span>
      </div>

      <!-- H1 Headline -->
      <h1 class="font-display text-3xl sm:text-4xl lg:text-[2.6rem] font-extrabold text-[#0B2545] leading-[1.15] tracking-tight">
        <?= e($article['title']) ?>
      </h1>

      <p class="text-base sm:text-lg text-slate-600 mt-4 leading-relaxed">
        <?= e($article['excerpt']) ?>
      </p>

      <!-- Cover Image -->
      <figure class="mt-8 rounded-2xl overflow-hidden bg-slate-100 aspect-[16/9] border border-slate-200">
        <img
          src="<?= e($article['image']) ?>"
          alt="<?= e($article['title']) ?>"
          class="w-full h-full object-cover"
          onerror="this.src='<?= e($article['fallback_img']) ?>'"
        />
      </figure>

      <!-- Key Takeaways Box (AEO / GEO Direct Answer Summary) -->
      <?php if (!empty($article['key_points'])): ?>
        <aside class="mt-8 rounded-2xl bg-[#EFF4F8] border-l-4 border-[#026AA2] p-6">
          <div class="font-display font-bold text-sm uppercase tracking-wider text-[#0B2545] mb-3">
            Poin Penting
          </div>
          <ul class="space-y-2.5 text-sm text-slate-700">
            <?php foreach ($article['key_points'] as $pt): ?>
              <li class="flex items-start gap-2.5">
                <i data-lucide="check-circle-2" class="w-4 h-4 text-[#026AA2] shrink-0 mt-0.5"></i>
                <span><?= e($pt) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </aside>
      <?php endif; ?>

      <!-- Article Body -->
      <div class="mt-8 space-y-7 text-base text-slate-700 leading-relaxed">
        <?php foreach ($article['sections'] as $sec): ?>
          <section class="space-y-2.5">
            <h2 class="font-display text-xl sm:text-2xl font-bold text-[#0B2545]">
              <?= e($sec['heading']) ?>
            </h2>
            <p><?= e($sec['body']) ?></p>
          </section>
        <?php endforeach; ?>
      </div>

      <!-- Share & Navigation Footer -->
      <div class="mt-10 pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4">
        <a href="berita.php" class="inline-flex items-center gap-2 text-sm font-bold text-[#0B2545] hover:text-[#026AA2]">
          <i data-lucide="arrow-left" class="w-4 h-4"></i>
          <span>Kembali ke Semua Berita</span>
        </a>

        <div class="flex items-center gap-2.5">
          <button
            type="button"
            id="copy-link-btn"
            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-[#EFF4F8] hover:bg-slate-200 text-xs font-bold text-[#0B2545] transition-colors cursor-pointer"
          >
            <i data-lucide="link-2" class="w-3.5 h-3.5"></i>
            <span>Salin Tautan</span>
          </button>
          <a
            href="https://wa.me/?text=<?= urlencode($article['title'] . ' - ' . $baseUrl . $canonicalPath) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-[#026AA2] hover:bg-[#0B2545] text-xs font-bold text-white transition-colors"
          >
            <i data-lucide="share-2" class="w-3.5 h-3.5"></i>
            <span>Bagikan WhatsApp</span>
          </a>
        </div>
      </div>
    </div>
  </article>

  <!-- Related News -->
  <section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between mb-8">
        <h2 class="font-display text-2xl font-extrabold text-[#0B2545]">Berita &amp; Panduan Lainnya</h2>
        <a href="berita.php" class="text-sm font-bold text-[#026AA2] hover:underline">Lihat Semua</a>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <?php foreach ($relatedNews as $rel): ?>
          <a href="berita-detail.php?slug=<?= urlencode($rel['slug']) ?>" class="group elevated-card rounded-2xl overflow-hidden flex flex-col">
            <div class="aspect-[16/10] bg-slate-200 overflow-hidden">
              <img
                src="<?= e($rel['image']) ?>"
                alt="<?= e($rel['title']) ?>"
                loading="lazy"
                class="w-full h-full object-cover img-zoom"
                onerror="this.src='<?= e($rel['fallback_img']) ?>'"
              />
            </div>
            <div class="p-5">
              <div class="text-xs font-bold text-[#026AA2] mb-1.5"><?= e($rel['category']) ?></div>
              <h3 class="font-display font-bold text-base text-[#0B2545] group-hover:text-[#026AA2] line-clamp-2 leading-snug">
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
