<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
require_once __DIR__ . '/_upload.php';

$admin = requireAdmin();
$pdo = getDb();

if (!$pdo) {
    setFlash('error', 'Koneksi database MySQL tidak aktif.');
    header('Location: index.php');
    exit;
}

$categories = $pdo->query('SELECT id, name FROM news_categories ORDER BY sort_order ASC, id ASC')->fetchAll();

$editId = isset($_GET['id']) ? (int) $_GET['id'] : (isset($_POST['id']) ? (int) $_POST['id'] : 0);
$isEdit = $editId > 0;

$form = [
    'title'        => '',
    'slug'         => '',
    'category_id'  => (int) ($categories[0]['id'] ?? 1),
    'status'       => 'published',
    'published_at' => date('Y-m-d'),
    'read_time'    => '2 menit baca',
    'image_url'    => 'assets/images/hero-water.jpg',
    'excerpt'      => '',
    'key_points'   => '',
    'sec1_heading' => 'Informasi Lengkap',
    'sec1_body'    => '',
    'sec2_heading' => '',
    'sec2_body'    => '',
];

if ($isEdit && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $stmt = $pdo->prepare('SELECT * FROM news WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $editId]);
    $existing = $stmt->fetch();
    if (!$existing) {
        setFlash('error', 'Artikel tidak ditemukan.');
        header('Location: berita.php');
        exit;
    }

    $kp = json_decode((string) ($existing['key_points_json'] ?? '[]'), true);
    $secs = json_decode((string) ($existing['sections_json'] ?? '[]'), true);

    $form = [
        'title'        => (string) $existing['title'],
        'slug'         => (string) $existing['slug'],
        'category_id'  => (int) $existing['category_id'],
        'status'       => (string) $existing['status'],
        'published_at' => (string) $existing['published_at'],
        'read_time'    => (string) $existing['read_time'],
        'image_url'    => (string) $existing['image_url'],
        'excerpt'      => (string) $existing['excerpt'],
        'key_points'   => is_array($kp) ? implode("\n", $kp) : '',
        'sec1_heading' => (string) ($secs[0]['heading'] ?? 'Informasi Lengkap'),
        'sec1_body'    => (string) ($secs[0]['body'] ?? ''),
        'sec2_heading' => (string) ($secs[1]['heading'] ?? ''),
        'sec2_body'    => (string) ($secs[1]['body'] ?? ''),
    ];
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        $error = 'Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.';
    } else {
        $form['title']        = trim((string) ($_POST['title'] ?? ''));
        $form['slug']         = trim((string) ($_POST['slug'] ?? ''));
        $form['category_id']  = (int) ($_POST['category_id'] ?? 1);
        $form['status']       = (string) ($_POST['status'] ?? 'published');
        $form['published_at'] = trim((string) ($_POST['published_at'] ?? date('Y-m-d')));
        $form['read_time']    = trim((string) ($_POST['read_time'] ?? '2 menit baca'));
        $form['image_url']    = trim((string) ($_POST['image_url'] ?? 'assets/images/hero-water.jpg'));
        $form['excerpt']      = trim((string) ($_POST['excerpt'] ?? ''));
        $form['key_points']   = trim((string) ($_POST['key_points'] ?? ''));
        $form['sec1_heading'] = trim((string) ($_POST['sec1_heading'] ?? 'Informasi Lengkap'));
        $form['sec1_body']    = trim((string) ($_POST['sec1_body'] ?? ''));
        $form['sec2_heading'] = trim((string) ($_POST['sec2_heading'] ?? ''));
        $form['sec2_body']    = trim((string) ($_POST['sec2_body'] ?? ''));

        if ($form['slug'] === '') {
            $form['slug'] = slugify($form['title']);
        } else {
            $form['slug'] = slugify($form['slug']);
        }

        if (!in_array($form['status'], ['published', 'draft', 'archived'], true)) {
            $form['status'] = 'draft';
        }

        // Proses upload gambar aman jika ada file diunggah
        if (isset($_FILES['image_file']) && ($_FILES['image_file']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
            $upload = handleNewsImageUpload($_FILES['image_file']);
            if (!$upload['ok']) {
                $error = (string) $upload['error'];
            } elseif (!empty($upload['path'])) {
                $form['image_url'] = (string) $upload['path'];
            }
        }

        if ($error === '' && ($form['title'] === '' || $form['excerpt'] === '' || $form['sec1_body'] === '')) {
            $error = 'Judul, ringkasan singkat, dan isi utama artikel wajib diisi.';
        }

        if ($error === '') {
            $keyPointsArr = array_values(array_filter(
                array_map('trim', preg_split('/\r\n|\r|\n/', $form['key_points']) ?: []),
                static fn(string $line): bool => $line !== ''
            ));

            $sectionsArr = [
                [
                    'heading' => $form['sec1_heading'] !== '' ? $form['sec1_heading'] : 'Informasi Lengkap',
                    'body'    => $form['sec1_body'],
                ],
            ];
            if ($form['sec2_body'] !== '') {
                $sectionsArr[] = [
                    'heading' => $form['sec2_heading'] !== '' ? $form['sec2_heading'] : 'Keterangan Tambahan',
                    'body'    => $form['sec2_body'],
                ];
            }

            try {
                if ($isEdit) {
                    $stmt = $pdo->prepare("
                        UPDATE news SET
                            category_id = :category_id,
                            slug = :slug,
                            title = :title,
                            excerpt = :excerpt,
                            key_points_json = :kp,
                            sections_json = :secs,
                            image_url = :image_url,
                            read_time = :read_time,
                            status = :status,
                            published_at = :published_at
                        WHERE id = :id
                    ");
                    $stmt->execute([
                        ':category_id'  => $form['category_id'],
                        ':slug'         => $form['slug'],
                        ':title'        => $form['title'],
                        ':excerpt'      => $form['excerpt'],
                        ':kp'           => json_encode($keyPointsArr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        ':secs'         => json_encode($sectionsArr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        ':image_url'    => $form['image_url'] !== '' ? $form['image_url'] : 'assets/images/hero-water.jpg',
                        ':read_time'    => $form['read_time'] !== '' ? $form['read_time'] : '2 menit baca',
                        ':status'       => $form['status'],
                        ':published_at' => $form['published_at'],
                        ':id'           => $editId,
                    ]);
                    setFlash('success', 'Perubahan berita berhasil disimpan.');
                } else {
                    $stmt = $pdo->prepare("
                        INSERT INTO news
                            (category_id, author_id, slug, title, excerpt, key_points_json, sections_json, image_url, fallback_image, read_time, status, published_at)
                        VALUES
                            (:category_id, :author_id, :slug, :title, :excerpt, :kp, :secs, :image_url, 'assets/images/hero-water.jpg', :read_time, :status, :published_at)
                    ");
                    $stmt->execute([
                        ':category_id'  => $form['category_id'],
                        ':author_id'    => (int) $admin['id'],
                        ':slug'         => $form['slug'],
                        ':title'        => $form['title'],
                        ':excerpt'      => $form['excerpt'],
                        ':kp'           => json_encode($keyPointsArr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        ':secs'         => json_encode($sectionsArr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        ':image_url'    => $form['image_url'] !== '' ? $form['image_url'] : 'assets/images/hero-water.jpg',
                        ':read_time'    => $form['read_time'] !== '' ? $form['read_time'] : '2 menit baca',
                        ':status'       => $form['status'],
                        ':published_at' => $form['published_at'],
                    ]);
                    setFlash('success', 'Berita baru berhasil diterbitkan ke database.');
                }

                header('Location: berita.php');
                exit;
            } catch (PDOException $e) {
                $error = $e->getCode() === '23000'
                    ? 'Slug URL sudah dipakai berita lain. Ubah kolom slug menjadi nama yang unik.'
                    : 'Gagal menyimpan ke database: ' . $e->getMessage();
            }
        }
    }
}

renderAdminHeader($isEdit ? 'Edit Berita' : 'Tambah Berita Baru', 'berita', $admin);
?>

<div class="flex items-center justify-between gap-4 pb-6 border-b border-[#DCE1E5]">
  <div>
    <h1 class="font-display text-2xl font-extrabold text-[#102A43]">
      <?= $isEdit ? 'Edit Berita' : 'Tulis Berita / Info Baru' ?>
    </h1>
    <p class="text-sm text-[#52606D] mt-0.5">Upload gambar diverifikasi tipe MIME asli (JPG/PNG/WEBP, maks 2 MB) dan disimpan dengan nama acak.</p>
  </div>
  <a href="berita.php" class="text-sm font-bold text-[#005A8D] hover:underline">← Kembali</a>
</div>

<?php if ($error !== ''): ?>
  <div class="mt-5 rounded-md bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-800 font-medium">
    <?= e($error) ?>
  </div>
<?php endif; ?>

<form method="post" action="berita-form.php<?= $isEdit ? '?id=' . $editId : '' ?>" enctype="multipart/form-data" class="mt-6 bg-white border border-[#DCE1E5] rounded-md p-6 sm:p-8 space-y-6">
  <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />
  <?php if ($isEdit): ?>
    <input type="hidden" name="id" value="<?= $editId ?>" />
  <?php endif; ?>

  <div class="grid md:grid-cols-2 gap-5">
    <div class="md:col-span-2">
      <label for="title" class="block text-xs font-bold text-[#102A43] mb-1.5">Judul Berita / Pengumuman *</label>
      <input id="title" name="title" type="text" required value="<?= e($form['title']) ?>" placeholder="Contoh: Jadwal Pengurasan Reservoir Wilayah Singaparna" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
    </div>

    <div>
      <label for="slug" class="block text-xs font-bold text-[#102A43] mb-1.5">Slug URL (otomatis jika dikosongkan)</label>
      <input id="slug" name="slug" type="text" value="<?= e($form['slug']) ?>" placeholder="jadwal-pengurasan-reservoir-singaparna" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
    </div>

    <div>
      <label for="category_id" class="block text-xs font-bold text-[#102A43] mb-1.5">Kategori (FK: news_categories) *</label>
      <select id="category_id" name="category_id" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm bg-white focus:outline-none focus:border-[#005A8D]">
        <?php foreach ($categories as $cat): ?>
          <option value="<?= (int) $cat['id'] ?>" <?= (int) $cat['id'] === $form['category_id'] ? 'selected' : '' ?>>
            <?= e((string) $cat['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label for="status" class="block text-xs font-bold text-[#102A43] mb-1.5">Status Publikasi</label>
      <select id="status" name="status" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm bg-white focus:outline-none focus:border-[#005A8D]">
        <option value="published" <?= $form['status'] === 'published' ? 'selected' : '' ?>>Terbit (Published)</option>
        <option value="draft" <?= $form['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
        <option value="archived" <?= $form['status'] === 'archived' ? 'selected' : '' ?>>Arsip</option>
      </select>
    </div>

    <div class="grid grid-cols-2 gap-3">
      <div>
        <label for="published_at" class="block text-xs font-bold text-[#102A43] mb-1.5">Tanggal Terbit</label>
        <input id="published_at" name="published_at" type="date" value="<?= e($form['published_at']) ?>" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
      </div>
      <div>
        <label for="read_time" class="block text-xs font-bold text-[#102A43] mb-1.5">Estimasi Baca</label>
        <input id="read_time" name="read_time" type="text" value="<?= e($form['read_time']) ?>" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
      </div>
    </div>
  </div>

  <!-- Upload Gambar Aman -->
  <div class="p-4 rounded-md bg-[#F7F7F5] border border-[#DCE1E5] grid md:grid-cols-2 gap-5 items-center">
    <div>
      <label for="image_file" class="block text-xs font-bold text-[#102A43] mb-1.5">Upload Foto Sampul Baru (JPG/PNG/WEBP, maks 2 MB)</label>
      <input id="image_file" name="image_file" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="block w-full text-xs text-[#52606D] file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:bg-[#102A43] file:text-white file:font-bold file:cursor-pointer" />
    </div>
    <div>
      <label for="image_url" class="block text-xs font-bold text-[#102A43] mb-1.5">Atau Path / URL Gambar Saat Ini</label>
      <input id="image_url" name="image_url" type="text" value="<?= e($form['image_url']) ?>" class="w-full px-3.5 py-2 rounded-md border border-[#DCE1E5] bg-white text-xs focus:outline-none focus:border-[#005A8D]" />
    </div>
  </div>

  <div>
    <label for="excerpt" class="block text-xs font-bold text-[#102A43] mb-1.5">Ringkasan Singkat (tampil di daftar berita &amp; meta SEO) *</label>
    <textarea id="excerpt" name="excerpt" rows="2" required class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"><?= e($form['excerpt']) ?></textarea>
  </div>

  <div>
    <label for="key_points" class="block text-xs font-bold text-[#102A43] mb-1.5">Poin Ringkasan AEO (opsional, 1 baris = 1 poin)</label>
    <textarea id="key_points" name="key_points" rows="3" placeholder="Poin penting pertama&#10;Poin penting kedua" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"><?= e($form['key_points']) ?></textarea>
  </div>

  <div class="pt-4 border-t border-[#DCE1E5] space-y-4">
    <div class="grid md:grid-cols-3 gap-4">
      <div>
        <label for="sec1_heading" class="block text-xs font-bold text-[#102A43] mb-1.5">Subjudul Bagian 1 *</label>
        <input id="sec1_heading" name="sec1_heading" type="text" value="<?= e($form['sec1_heading']) ?>" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
      </div>
      <div class="md:col-span-2">
        <label for="sec1_body" class="block text-xs font-bold text-[#102A43] mb-1.5">Isi Bagian 1 *</label>
        <textarea id="sec1_body" name="sec1_body" rows="4" required class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"><?= e($form['sec1_body']) ?></textarea>
      </div>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
      <div>
        <label for="sec2_heading" class="block text-xs font-bold text-[#102A43] mb-1.5">Subjudul Bagian 2 (opsional)</label>
        <input id="sec2_heading" name="sec2_heading" type="text" value="<?= e($form['sec2_heading']) ?>" placeholder="Imbauan pelanggan" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]" />
      </div>
      <div class="md:col-span-2">
        <label for="sec2_body" class="block text-xs font-bold text-[#102A43] mb-1.5">Isi Bagian 2 (opsional)</label>
        <textarea id="sec2_body" name="sec2_body" rows="3" class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"><?= e($form['sec2_body']) ?></textarea>
      </div>
    </div>
  </div>

  <div class="pt-4 border-t border-[#DCE1E5] flex items-center gap-3">
    <button type="submit" class="px-5 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold cursor-pointer">
      <?= $isEdit ? 'Simpan Perubahan' : 'Terbitkan Berita' ?>
    </button>
    <a href="berita.php" class="px-4 py-2.5 rounded-md bg-[#EFEFE9] hover:bg-[#DCE1E5] text-[#102A43] text-sm font-bold">
      Batal
    </a>
  </div>
</form>

<?php renderAdminFooter(); ?>
