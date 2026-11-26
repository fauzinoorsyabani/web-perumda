<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        setFlash('error', 'Token keamanan tidak valid.');
        header('Location: sumber-air.php');
        exit;
    }

    $action = (string) ($_POST['action'] ?? '');

    if ($action === 'save') {
        $id = (int) ($_POST['id'] ?? 0);
        $name = trim((string) ($_POST['name'] ?? ''));
        $type = (string) ($_POST['source_type'] ?? 'Mata Air');
        $year = (int) ($_POST['built_year'] ?? date('Y'));
        $cap = (int) ($_POST['capacity_lps'] ?? 0);

        if (!in_array($type, ['Mata Air', 'Air Permukaan'], true)) {
            $type = 'Mata Air';
        }

        if ($name === '' || $cap <= 0 || $year < 1900 || $year > 2100) {
            setFlash('error', 'Nama sumber, tahun bangun valid, dan kapasitas (>0 L/dtk) wajib diisi.');
        } elseif ($id > 0) {
            $stmt = $pdo->prepare('UPDATE water_sources SET name = :name, source_type = :type, built_year = :year, capacity_lps = :cap WHERE id = :id');
            $stmt->execute([':name' => $name, ':type' => $type, ':year' => $year, ':cap' => $cap, ':id' => $id]);
            setFlash('success', "Sumber air {$name} berhasil diperbarui.");
        } else {
            $nextOrder = ((int) $pdo->query('SELECT COALESCE(MAX(sort_order), 0) FROM water_sources')->fetchColumn()) + 1;
            $stmt = $pdo->prepare('INSERT INTO water_sources (name, source_type, built_year, capacity_lps, sort_order) VALUES (:name, :type, :year, :cap, :sort)');
            $stmt->execute([':name' => $name, ':type' => $type, ':year' => $year, ':cap' => $cap, ':sort' => $nextOrder]);
            setFlash('success', "Sumber air {$name} berhasil ditambahkan.");
        }
    } elseif ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare('DELETE FROM water_sources WHERE id = :id');
            $stmt->execute([':id' => $id]);
            setFlash('success', 'Data sumber air berhasil dihapus.');
        }
    }

    header('Location: sumber-air.php');
    exit;
}

$editSource = null;
if ($pdo && isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM water_sources WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => (int) $_GET['edit']]);
    $editSource = $stmt->fetch() ?: null;
}

$sourcesList = $pdo
    ? $pdo->query('SELECT * FROM water_sources ORDER BY sort_order ASC, capacity_lps DESC')->fetchAll()
    : [];
$totalCap = array_sum(array_map(static fn(array $r): int => (int) $r['capacity_lps'], $sourcesList));

renderAdminHeader('Sumber Air Baku', 'sumber', $admin);
?>

<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-6 border-b border-[#DCE1E5]">
  <div>
    <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Sumber Air Baku &amp; Kapasitas Produksi</h1>
    <p class="text-sm text-[#52606D] mt-0.5">Perubahan kapasitas langsung memperbarui tabel infrastruktur di halaman Profil.</p>
  </div>
  <div class="font-display font-extrabold text-lg text-[#005A8D] tabular-nums">
    Total Terpasang: <?= $totalCap ?> L/detik
  </div>
</div>

<div class="mt-6 grid lg:grid-cols-12 gap-6 items-start">
  <div class="lg:col-span-4 bg-white border border-[#DCE1E5] rounded-md p-5">
    <h2 class="font-display font-bold text-base text-[#102A43] pb-3 border-b border-[#DCE1E5]">
      <?= $editSource ? 'Edit Sumber Air' : 'Tambah Sumber Air' ?>
    </h2>

    <form method="post" action="sumber-air.php" class="mt-4 space-y-3.5 text-sm">
      <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
      <input type="hidden" name="action" value="save" />
      <input type="hidden" name="id" value="<?= (int) ($editSource['id'] ?? 0) ?>" />

      <div>
        <label for="s-name" class="block text-xs font-bold text-[#102A43] mb-1">Nama Sumber *</label>
        <input id="s-name" name="name" type="text" required value="<?= e((string) ($editSource['name'] ?? '')) ?>" placeholder="Contoh: Mata Air Cipondok" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm" />
      </div>

      <div>
        <label for="s-type" class="block text-xs font-bold text-[#102A43] mb-1">Jenis Sumber *</label>
        <?php $curType = (string) ($editSource['source_type'] ?? 'Mata Air'); ?>
        <select id="s-type" name="source_type" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm bg-white">
          <option value="Mata Air" <?= $curType === 'Mata Air' ? 'selected' : '' ?>>Mata Air</option>
          <option value="Air Permukaan" <?= $curType === 'Air Permukaan' ? 'selected' : '' ?>>Air Permukaan</option>
        </select>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <div>
          <label for="s-year" class="block text-xs font-bold text-[#102A43] mb-1">Tahun Bangun *</label>
          <input id="s-year" name="built_year" type="number" min="1900" max="2100" required value="<?= e((string) ($editSource['built_year'] ?? date('Y'))) ?>" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm tabular-nums" />
        </div>
        <div>
          <label for="s-cap" class="block text-xs font-bold text-[#102A43] mb-1">Kapasitas (L/dtk) *</label>
          <input id="s-cap" name="capacity_lps" type="number" min="1" required value="<?= e((string) ($editSource['capacity_lps'] ?? '')) ?>" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm tabular-nums" />
        </div>
      </div>

      <div class="pt-2 flex items-center gap-2">
        <button type="submit" class="px-4 py-2 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-xs font-bold cursor-pointer">
          <?= $editSource ? 'Simpan Perubahan' : 'Tambah Sumber' ?>
        </button>
        <?php if ($editSource): ?>
          <a href="sumber-air.php" class="px-3 py-2 rounded-md bg-[#EFEFE9] text-[#102A43] text-xs font-bold">Batal</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <div class="lg:col-span-8 bg-white border border-[#DCE1E5] rounded-md overflow-x-auto">
    <table class="w-full text-left border-collapse text-sm">
      <thead>
        <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
          <th class="py-3 px-4">Nama Sumber</th>
          <th class="py-3 px-4">Jenis</th>
          <th class="py-3 px-4">Tahun</th>
          <th class="py-3 px-4 text-right">Kapasitas</th>
          <th class="py-3 px-4 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-[#DCE1E5]">
        <?php foreach ($sourcesList as $src): ?>
          <tr class="hover:bg-[#F7F7F5]">
            <td class="py-3 px-4 font-bold text-[#102A43]"><?= e((string) $src['name']) ?></td>
            <td class="py-3 px-4 text-xs text-[#52606D]"><?= e((string) $src['source_type']) ?></td>
            <td class="py-3 px-4 text-xs text-[#52606D] tabular-nums"><?= (int) $src['built_year'] ?></td>
            <td class="py-3 px-4 text-right font-bold text-[#005A8D] tabular-nums"><?= (int) $src['capacity_lps'] ?> L/dtk</td>
            <td class="py-3 px-4 text-right whitespace-nowrap">
              <a href="sumber-air.php?edit=<?= (int) $src['id'] ?>" class="text-xs font-bold text-[#005A8D] hover:underline mr-3">Edit</a>
              <form method="post" action="sumber-air.php" class="inline" onsubmit="return confirm('Hapus sumber air ini?');">
                <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
                <input type="hidden" name="action" value="delete" />
                <input type="hidden" name="id" value="<?= (int) $src['id'] ?>" />
                <button type="submit" class="text-xs font-bold text-red-700 hover:underline cursor-pointer">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php renderAdminFooter(); ?>
