<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

// Handle Delete (POST + CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        setFlash('error', 'Token keamanan tidak valid.');
    } elseif ($pdo) {
        $delId = (int) ($_POST['id'] ?? 0);
        if ($delId > 0) {
            $stmt = $pdo->prepare('DELETE FROM news WHERE id = :id');
            $stmt->execute([':id' => $delId]);
            setFlash('success', 'Artikel berhasil dihapus dari database.');
        }
    }
    header('Location: berita.php');
    exit;
}

$statusFilter = (string) ($_GET['status'] ?? 'all');
$allowedStatuses = ['all', 'published', 'draft', 'archived'];
if (!in_array($statusFilter, $allowedStatuses, true)) {
    $statusFilter = 'all';
}

$articles = [];
if ($pdo) {
    $sql = "
        SELECT n.id, n.title, n.slug, n.status, n.published_at, n.image_url,
               c.name AS category, u.name AS author
        FROM news n
        INNER JOIN news_categories c ON c.id = n.category_id
        INNER JOIN users u ON u.id = n.author_id
    ";
    $params = [];
    if ($statusFilter !== 'all') {
        $sql .= ' WHERE n.status = :status';
        $params[':status'] = $statusFilter;
    }
    $sql .= ' ORDER BY n.published_at DESC, n.id DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $articles = $stmt->fetchAll();
}

renderAdminHeader('Kelola Berita & Info', 'berita', $admin);
?>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#DCE1E5]">
  <div>
    <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Berita, Gangguan &amp; Panduan</h1>
    <p class="text-sm text-[#52606D] mt-0.5">Semua perubahan langsung tampil di website publik secara otomatis.</p>
  </div>
  <a href="berita-form.php" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold">
    <i data-lucide="plus" class="w-4 h-4"></i>
    <span>Tambah Berita</span>
  </a>
</div>

<!-- Status Filter Tabs -->
<div class="mt-5 flex flex-wrap gap-2">
  <?php
  $tabs = ['all' => 'Semua', 'published' => 'Terbit', 'draft' => 'Draft', 'archived' => 'Arsip'];
  foreach ($tabs as $key => $label):
    $active = ($statusFilter === $key);
  ?>
    <a
      href="berita.php?status=<?= e($key) ?>"
      class="px-3.5 py-1.5 rounded-md text-xs font-bold transition-colors <?= $active ? 'bg-[#102A43] text-white' : 'bg-white border border-[#DCE1E5] text-[#52606D] hover:text-[#102A43]' ?>"
    >
      <?= e($label) ?>
    </a>
  <?php endforeach; ?>
</div>

<!-- Articles Table -->
<div class="mt-5 bg-white border border-[#DCE1E5] rounded-md overflow-x-auto">
  <table class="w-full text-left border-collapse text-sm">
    <thead>
      <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
        <th class="py-3 px-4">Judul</th>
        <th class="py-3 px-4">Kategori</th>
        <th class="py-3 px-4">Status</th>
        <th class="py-3 px-4">Tanggal</th>
        <th class="py-3 px-4 text-right">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#DCE1E5]">
      <?php if (empty($articles)): ?>
        <tr>
          <td colspan="5" class="py-8 px-4 text-center text-[#52606D]">Belum ada berita untuk status ini.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($articles as $row): ?>
          <tr class="hover:bg-[#F7F7F5]">
            <td class="py-3.5 px-4 max-w-md">
              <div class="font-bold text-[#102A43]"><?= e((string) $row['title']) ?></div>
              <div class="text-xs text-[#52606D] mt-0.5 truncate">/berita-detail.php?slug=<?= e((string) $row['slug']) ?></div>
            </td>
            <td class="py-3.5 px-4 text-[#52606D] whitespace-nowrap"><?= e((string) $row['category']) ?></td>
            <td class="py-3.5 px-4 whitespace-nowrap">
              <span class="px-2 py-0.5 rounded text-[11px] font-bold uppercase <?= $row['status'] === 'published' ? 'bg-emerald-100 text-[#1E6F5C]' : ($row['status'] === 'draft' ? 'bg-amber-100 text-amber-800' : 'bg-slate-200 text-slate-700') ?>">
                <?= e((string) $row['status']) ?>
              </span>
            </td>
            <td class="py-3.5 px-4 text-[#52606D] tabular-nums whitespace-nowrap"><?= e((string) $row['published_at']) ?></td>
            <td class="py-3.5 px-4 text-right whitespace-nowrap">
              <div class="inline-flex items-center gap-3">
                <?php if ($row['status'] === 'published'): ?>
                  <a href="../berita-detail.php?slug=<?= urlencode((string) $row['slug']) ?>" target="_blank" class="text-xs font-semibold text-[#52606D] hover:text-[#102A43]">Lihat</a>
                <?php endif; ?>
                <a href="berita-form.php?id=<?= (int) $row['id'] ?>" class="text-xs font-bold text-[#005A8D] hover:underline">Edit</a>
                <form method="post" action="berita.php" class="inline" onsubmit="return confirm('Hapus berita ini secara permanen?');">
                  <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
                  <input type="hidden" name="action" value="delete" />
                  <input type="hidden" name="id" value="<?= (int) $row['id'] ?>" />
                  <button type="submit" class="text-xs font-bold text-red-700 hover:underline cursor-pointer">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php renderAdminFooter(); ?>
