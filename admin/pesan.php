<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

// Update status pesan (POST + CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_status') {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        setFlash('error', 'Token keamanan tidak valid.');
    } elseif ($pdo) {
        $msgId = (int) ($_POST['id'] ?? 0);
        $newStatus = (string) ($_POST['status'] ?? '');
        if ($msgId > 0 && in_array($newStatus, ['baru', 'diproses', 'selesai'], true)) {
            $stmt = $pdo->prepare('UPDATE contact_messages SET status = :status WHERE id = :id');
            $stmt->execute([':status' => $newStatus, ':id' => $msgId]);
            setFlash('success', sprintf('Status tiket MSG-%04d diubah menjadi %s.', $msgId, $newStatus));
        }
    }
    header('Location: pesan.php' . (isset($_GET['status']) ? '?status=' . urlencode((string) $_GET['status']) : ''));
    exit;
}

$statusFilter = (string) ($_GET['status'] ?? 'all');
if (!in_array($statusFilter, ['all', 'baru', 'diproses', 'selesai'], true)) {
    $statusFilter = 'all';
}

$messages = [];
if ($pdo) {
    $sql = "
        SELECT m.*, b.name AS branch_name
        FROM contact_messages m
        LEFT JOIN branches b ON b.id = m.branch_id
    ";
    $params = [];
    if ($statusFilter !== 'all') {
        $sql .= ' WHERE m.status = :status';
        $params[':status'] = $statusFilter;
    }
    $sql .= ' ORDER BY m.created_at DESC, m.id DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $messages = $stmt->fetchAll();
}

renderAdminHeader('Pesan Pelanggan', 'pesan', $admin);
?>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#DCE1E5]">
  <div>
    <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Pesan &amp; Pertanyaan Pelanggan</h1>
    <p class="text-sm text-[#52606D] mt-0.5">Data masuk dari formulir halaman Kontak, terhubung dengan tabel <code class="text-xs bg-[#EFEFE9] px-1.5 py-0.5 rounded">branches</code>.</p>
  </div>
  <div class="flex flex-wrap gap-2">
    <?php foreach (['all' => 'Semua', 'baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $key => $label): ?>
      <a
        href="pesan.php?status=<?= e($key) ?>"
        class="px-3.5 py-1.5 rounded-md text-xs font-bold <?= $statusFilter === $key ? 'bg-[#102A43] text-white' : 'bg-white border border-[#DCE1E5] text-[#52606D] hover:text-[#102A43]' ?>"
      >
        <?= e($label) ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<div class="mt-6 space-y-4">
  <?php if (empty($messages)): ?>
    <div class="bg-white border border-[#DCE1E5] rounded-md p-8 text-center text-sm text-[#52606D]">
      Belum ada pesan pelanggan pada filter ini.
    </div>
  <?php else: ?>
    <?php foreach ($messages as $m): ?>
      <?php $ticket = sprintf('MSG-%04d', (int) $m['id']); ?>
      <div class="bg-white border border-[#DCE1E5] rounded-md p-5 sm:p-6">
        <div class="flex flex-wrap items-start justify-between gap-4 pb-3.5 border-b border-[#DCE1E5]">
          <div>
            <div class="flex flex-wrap items-center gap-2">
              <span class="font-mono text-xs font-bold text-[#005A8D] bg-[#EFEFE9] px-2 py-0.5 rounded"><?= e($ticket) ?></span>
              <h2 class="font-display font-bold text-base text-[#102A43]"><?= e((string) $m['customer_name']) ?></h2>
              <?php if (!empty($m['customer_no'])): ?>
                <span class="text-xs text-[#52606D] tabular-nums">(No. Sambungan: <?= e((string) $m['customer_no']) ?>)</span>
              <?php endif; ?>
            </div>
            <div class="text-xs text-[#52606D] mt-1">
              <strong><?= e((string) $m['topic']) ?></strong> • Wilayah: <?= e((string) $m['area']) ?>
              <?php if (!empty($m['branch_name'])): ?>
                • Cabang: <strong><?= e((string) $m['branch_name']) ?></strong>
              <?php endif; ?>
              • <span class="tabular-nums"><?= e((string) $m['created_at']) ?></span>
            </div>
          </div>

          <!-- Status Update Form -->
          <form method="post" action="pesan.php?status=<?= e($statusFilter) ?>" class="flex items-center gap-2">
            <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
            <input type="hidden" name="action" value="update_status" />
            <input type="hidden" name="id" value="<?= (int) $m['id'] ?>" />
            <select name="status" class="px-2.5 py-1.5 rounded-md border border-[#DCE1E5] text-xs font-bold bg-white">
              <option value="baru" <?= $m['status'] === 'baru' ? 'selected' : '' ?>>Baru</option>
              <option value="diproses" <?= $m['status'] === 'diproses' ? 'selected' : '' ?>>Diproses</option>
              <option value="selesai" <?= $m['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
            <button type="submit" class="px-3 py-1.5 rounded-md bg-[#102A43] hover:bg-[#005A8D] text-white text-xs font-bold cursor-pointer">
              Simpan
            </button>
          </form>
        </div>

        <p class="mt-3.5 text-sm text-[#1C242B] leading-relaxed whitespace-pre-line">
          <?= e((string) $m['message']) ?>
        </p>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php renderAdminFooter(); ?>
