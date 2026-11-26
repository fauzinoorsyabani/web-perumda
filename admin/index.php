<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

$stats = [
    'news_published' => 0,
    'news_draft'     => 0,
    'msg_new'        => 0,
    'msg_total'      => 0,
    'branches'       => 0,
    'capacity'       => 0,
];
$recentNews = [];
$recentMessages = [];

if ($pdo) {
    $stats['news_published'] = (int) $pdo->query("SELECT COUNT(*) FROM news WHERE status = 'published'")->fetchColumn();
    $stats['news_draft']     = (int) $pdo->query("SELECT COUNT(*) FROM news WHERE status = 'draft'")->fetchColumn();
    $stats['msg_new']        = (int) $pdo->query("SELECT COUNT(*) FROM contact_messages WHERE status = 'baru'")->fetchColumn();
    $stats['msg_total']      = (int) $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
    $stats['branches']       = (int) $pdo->query("SELECT COUNT(*) FROM branches WHERE is_active = 1")->fetchColumn();
    $stats['capacity']       = (int) $pdo->query("SELECT COALESCE(SUM(capacity_lps), 0) FROM water_sources")->fetchColumn();

    $recentNews = $pdo->query("
        SELECT n.id, n.title, n.slug, n.status, n.published_at, c.name AS category
        FROM news n
        INNER JOIN news_categories c ON c.id = n.category_id
        ORDER BY n.published_at DESC, n.id DESC
        LIMIT 5
    ")->fetchAll();

    $recentMessages = $pdo->query("
        SELECT m.id, m.customer_name, m.topic, m.area, m.status, m.created_at, b.name AS branch_name
        FROM contact_messages m
        LEFT JOIN branches b ON b.id = m.branch_id
        ORDER BY m.created_at DESC
        LIMIT 5
    ")->fetchAll();
}

renderAdminHeader('Dashboard', 'dashboard', $admin);
?>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#DCE1E5]">
  <div>
    <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Dashboard</h1>
    <p class="text-sm text-[#52606D] mt-0.5">Ringkasan data langsung dari database MySQL <code class="text-xs bg-[#EFEFE9] px-1.5 py-0.5 rounded">perumda_tirtasukapura</code>.</p>
  </div>
  <div class="flex flex-wrap gap-2.5">
    <a href="berita-form.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold">
      <i data-lucide="plus" class="w-4 h-4"></i>
      <span>Tulis Berita Baru</span>
    </a>
    <a href="pesan.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-white border border-[#DCE1E5] hover:bg-[#EFEFE9] text-[#102A43] text-sm font-bold">
      <i data-lucide="inbox" class="w-4 h-4"></i>
      <span>Pesan Pelanggan</span>
    </a>
  </div>
</div>

<!-- Metrics Strip -->
<div class="mt-6 grid grid-cols-2 lg:grid-cols-4 gap-4 tabular-nums">
  <div class="bg-white border border-[#DCE1E5] rounded-md p-5">
    <div class="text-xs font-semibold text-[#52606D]">Berita Terbit</div>
    <div class="font-display text-3xl font-extrabold text-[#102A43] mt-1"><?= $stats['news_published'] ?></div>
    <div class="text-xs text-[#52606D] mt-1"><?= $stats['news_draft'] ?> draft tersimpan</div>
  </div>
  <div class="bg-white border border-[#DCE1E5] rounded-md p-5">
    <div class="text-xs font-semibold text-[#52606D]">Pesan Masuk Baru</div>
    <div class="font-display text-3xl font-extrabold <?= $stats['msg_new'] > 0 ? 'text-amber-700' : 'text-[#1E6F5C]' ?> mt-1"><?= $stats['msg_new'] ?></div>
    <div class="text-xs text-[#52606D] mt-1">Total <?= $stats['msg_total'] ?> pesan tercatat</div>
  </div>
  <div class="bg-white border border-[#DCE1E5] rounded-md p-5">
    <div class="text-xs font-semibold text-[#52606D]">Cabang &amp; Unit Aktif</div>
    <div class="font-display text-3xl font-extrabold text-[#102A43] mt-1"><?= $stats['branches'] ?></div>
    <div class="text-xs text-[#52606D] mt-1">Kota &amp; Kab. Tasikmalaya</div>
  </div>
  <div class="bg-white border border-[#DCE1E5] rounded-md p-5">
    <div class="text-xs font-semibold text-[#52606D]">Kapasitas Sumber Air</div>
    <div class="font-display text-3xl font-extrabold text-[#005A8D] mt-1"><?= $stats['capacity'] ?> <span class="text-base font-bold">L/dtk</span></div>
    <div class="text-xs text-[#52606D] mt-1">9 sumber terdaftar di DB</div>
  </div>
</div>

<!-- Two Tables: Latest Messages & Latest News -->
<div class="mt-8 grid lg:grid-cols-2 gap-6">
  <!-- Pesan Terbaru -->
  <section class="bg-white border border-[#DCE1E5] rounded-md overflow-hidden">
    <div class="px-5 py-4 border-b border-[#DCE1E5] flex items-center justify-between">
      <h2 class="font-display font-bold text-base text-[#102A43]">Pesan Pelanggan Terbaru</h2>
      <a href="pesan.php" class="text-xs font-bold text-[#005A8D] hover:underline">Lihat semua</a>
    </div>
    <?php if (empty($recentMessages)): ?>
      <div class="p-6 text-sm text-[#52606D]">Belum ada pesan masuk dari formulir halaman Kontak.</div>
    <?php else: ?>
      <div class="divide-y divide-[#DCE1E5]">
        <?php foreach ($recentMessages as $m): ?>
          <div class="px-5 py-3.5 flex items-start justify-between gap-4 text-sm">
            <div class="min-w-0">
              <div class="font-bold text-[#102A43] truncate">
                <span class="text-xs font-mono text-[#005A8D] mr-1">MSG-<?= str_pad((string) $m['id'], 4, '0', STR_PAD_LEFT) ?></span>
                <?= e((string) $m['customer_name']) ?>
              </div>
              <div class="text-xs text-[#52606D] mt-0.5 truncate">
                <?= e((string) $m['topic']) ?> • <?= e((string) ($m['branch_name'] ?: $m['area'])) ?>
              </div>
            </div>
            <span class="shrink-0 px-2 py-0.5 rounded text-[11px] font-bold uppercase <?= $m['status'] === 'baru' ? 'bg-amber-100 text-amber-800' : ($m['status'] === 'diproses' ? 'bg-sky-100 text-[#005A8D]' : 'bg-emerald-100 text-[#1E6F5C]') ?>">
              <?= e((string) $m['status']) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Berita Terbaru -->
  <section class="bg-white border border-[#DCE1E5] rounded-md overflow-hidden">
    <div class="px-5 py-4 border-b border-[#DCE1E5] flex items-center justify-between">
      <h2 class="font-display font-bold text-base text-[#102A43]">Berita &amp; Panduan Terbaru</h2>
      <a href="berita.php" class="text-xs font-bold text-[#005A8D] hover:underline">Kelola semua</a>
    </div>
    <div class="divide-y divide-[#DCE1E5]">
      <?php foreach ($recentNews as $n): ?>
        <div class="px-5 py-3.5 flex items-start justify-between gap-4 text-sm">
          <div class="min-w-0">
            <a href="berita-form.php?id=<?= (int) $n['id'] ?>" class="font-bold text-[#102A43] hover:text-[#005A8D] line-clamp-1">
              <?= e((string) $n['title']) ?>
            </a>
            <div class="text-xs text-[#52606D] mt-0.5 tabular-nums">
              <?= e((string) $n['category']) ?> • <?= e((string) $n['published_at']) ?>
            </div>
          </div>
          <a href="berita-form.php?id=<?= (int) $n['id'] ?>" class="shrink-0 text-xs font-bold text-[#005A8D] hover:underline">
            Edit
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>

<?php renderAdminFooter(); ?>
