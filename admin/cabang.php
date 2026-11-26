<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        setFlash('error', 'Token keamanan tidak valid.');
        header('Location: cabang.php');
        exit;
    }

    $action = (string) ($_POST['action'] ?? '');

    if ($action === 'save') {
        $id = (int) ($_POST['id'] ?? 0);
        $name = trim((string) ($_POST['name'] ?? ''));
        $area = (string) ($_POST['area'] ?? 'Kab. Tasikmalaya');
        $address = trim((string) ($_POST['address'] ?? ''));
        $phone = trim((string) ($_POST['phone'] ?? ''));
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        if (!in_array($area, ['Kota Tasikmalaya', 'Kab. Tasikmalaya'], true)) {
            $area = 'Kab. Tasikmalaya';
        }

        if ($name === '' || $address === '' || $phone === '') {
            setFlash('error', 'Nama cabang, alamat, dan nomor telepon wajib diisi.');
        } elseif ($id > 0) {
            $stmt = $pdo->prepare('UPDATE branches SET name = :name, area = :area, address = :address, phone = :phone, is_active = :active WHERE id = :id');
            $stmt->execute([':name' => $name, ':area' => $area, ':address' => $address, ':phone' => $phone, ':active' => $isActive, ':id' => $id]);
            setFlash('success', "Data {$name} berhasil diperbarui.");
        } else {
            $nextOrder = ((int) $pdo->query('SELECT COALESCE(MAX(sort_order), 0) FROM branches')->fetchColumn()) + 1;
            $stmt = $pdo->prepare('INSERT INTO branches (name, area, address, phone, is_active, sort_order) VALUES (:name, :area, :address, :phone, :active, :sort)');
            $stmt->execute([':name' => $name, ':area' => $area, ':address' => $address, ':phone' => $phone, ':active' => $isActive, ':sort' => $nextOrder]);
            setFlash('success', "Cabang baru {$name} berhasil ditambahkan.");
        }
    } elseif ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare('DELETE FROM branches WHERE id = :id');
            $stmt->execute([':id' => $id]);
            setFlash('success', 'Data cabang dihapus (pesan terkait tetap aman karena ON DELETE SET NULL).');
        }
    }

    header('Location: cabang.php');
    exit;
}

$editBranch = null;
if ($pdo && isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM branches WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => (int) $_GET['edit']]);
    $editBranch = $stmt->fetch() ?: null;
}

$branchesList = $pdo
    ? $pdo->query('SELECT * FROM branches ORDER BY sort_order ASC, id ASC')->fetchAll()
    : [];

renderAdminHeader('Kelola Cabang & Unit', 'cabang', $admin);
?>

<div class="pb-6 border-b border-[#DCE1E5]">
  <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Kelola Cabang &amp; Unit Pelayanan</h1>
  <p class="text-sm text-[#52606D] mt-0.5">Data ini tampil di halaman Kontak dan menjadi pilihan Foreign Key pada formulir pesan pelanggan.</p>
</div>

<div class="mt-6 grid lg:grid-cols-12 gap-6 items-start">
  <!-- Form Tambah / Edit -->
  <div class="lg:col-span-4 bg-white border border-[#DCE1E5] rounded-md p-5">
    <h2 class="font-display font-bold text-base text-[#102A43] pb-3 border-b border-[#DCE1E5]">
      <?= $editBranch ? 'Edit Cabang' : 'Tambah Cabang / Unit' ?>
    </h2>

    <form method="post" action="cabang.php" class="mt-4 space-y-3.5 text-sm">
      <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
      <input type="hidden" name="action" value="save" />
      <input type="hidden" name="id" value="<?= (int) ($editBranch['id'] ?? 0) ?>" />

      <div>
        <label for="b-name" class="block text-xs font-bold text-[#102A43] mb-1">Nama Cabang / Unit *</label>
        <input id="b-name" name="name" type="text" required value="<?= e((string) ($editBranch['name'] ?? '')) ?>" placeholder="Contoh: Unit Cikatomas" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm" />
      </div>

      <div>
        <label for="b-area" class="block text-xs font-bold text-[#102A43] mb-1">Wilayah *</label>
        <?php $curArea = (string) ($editBranch['area'] ?? 'Kab. Tasikmalaya'); ?>
        <select id="b-area" name="area" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm bg-white">
          <option value="Kota Tasikmalaya" <?= $curArea === 'Kota Tasikmalaya' ? 'selected' : '' ?>>Kota Tasikmalaya</option>
          <option value="Kab. Tasikmalaya" <?= $curArea === 'Kab. Tasikmalaya' ? 'selected' : '' ?>>Kab. Tasikmalaya</option>
        </select>
      </div>

      <div>
        <label for="b-address" class="block text-xs font-bold text-[#102A43] mb-1">Alamat Lengkap *</label>
        <textarea id="b-address" name="address" rows="3" required class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm"><?= e((string) ($editBranch['address'] ?? '')) ?></textarea>
      </div>

      <div>
        <label for="b-phone" class="block text-xs font-bold text-[#102A43] mb-1">Nomor Kontak *</label>
        <input id="b-phone" name="phone" type="text" required value="<?= e((string) ($editBranch['phone'] ?? '+62 821-2910-2345')) ?>" class="w-full px-3 py-2 rounded-md border border-[#DCE1E5] text-sm" />
      </div>

      <label class="inline-flex items-center gap-2 text-xs font-semibold text-[#102A43]">
        <input type="checkbox" name="is_active" value="1" <?= !isset($editBranch) || (int) $editBranch['is_active'] === 1 ? 'checked' : '' ?> />
        <span>Tampilkan di halaman publik</span>
      </label>

      <div class="pt-2 flex items-center gap-2">
        <button type="submit" class="px-4 py-2 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-xs font-bold cursor-pointer">
          <?= $editBranch ? 'Simpan Perubahan' : 'Tambah Cabang' ?>
        </button>
        <?php if ($editBranch): ?>
          <a href="cabang.php" class="px-3 py-2 rounded-md bg-[#EFEFE9] text-[#102A43] text-xs font-bold">Batal</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <!-- Daftar Cabang -->
  <div class="lg:col-span-8 bg-white border border-[#DCE1E5] rounded-md overflow-x-auto">
    <table class="w-full text-left border-collapse text-sm">
      <thead>
        <tr class="bg-[#F7F7F5] border-b border-[#DCE1E5] text-xs font-bold uppercase tracking-wider text-[#52606D]">
          <th class="py-3 px-4">Cabang / Unit</th>
          <th class="py-3 px-4">Wilayah</th>
          <th class="py-3 px-4">Kontak</th>
          <th class="py-3 px-4 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-[#DCE1E5]">
        <?php foreach ($branchesList as $b): ?>
          <tr class="hover:bg-[#F7F7F5]">
            <td class="py-3 px-4">
              <div class="font-bold text-[#102A43]">
                <?= e((string) $b['name']) ?>
                <?php if ((int) $b['is_active'] === 0): ?>
                  <span class="ml-1 text-[10px] px-1.5 py-0.5 rounded bg-slate-200 text-slate-600">Nonaktif</span>
                <?php endif; ?>
              </div>
              <div class="text-xs text-[#52606D] mt-0.5"><?= e((string) $b['address']) ?></div>
            </td>
            <td class="py-3 px-4 text-xs font-semibold text-[#1E6F5C] whitespace-nowrap"><?= e((string) $b['area']) ?></td>
            <td class="py-3 px-4 text-xs text-[#52606D] tabular-nums whitespace-nowrap"><?= e((string) $b['phone']) ?></td>
            <td class="py-3 px-4 text-right whitespace-nowrap">
              <a href="cabang.php?edit=<?= (int) $b['id'] ?>" class="text-xs font-bold text-[#005A8D] hover:underline mr-3">Edit</a>
              <form method="post" action="cabang.php" class="inline" onsubmit="return confirm('Hapus cabang ini?');">
                <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
                <input type="hidden" name="action" value="delete" />
                <input type="hidden" name="id" value="<?= (int) $b['id'] ?>" />
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
