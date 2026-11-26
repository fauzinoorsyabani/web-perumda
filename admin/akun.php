<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';
$admin = requireAdmin();
$pdo = getDb();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    if (!verifyCsrf($_POST['csrf_token'] ?? null)) {
        $error = 'Token keamanan tidak valid.';
    } else {
        $currentPass = (string) ($_POST['current_password'] ?? '');
        $newPass = (string) ($_POST['new_password'] ?? '');
        $confirmPass = (string) ($_POST['confirm_password'] ?? '');

        if (strlen($newPass) < 10) {
            $error = 'Kata sandi baru minimal 10 karakter.';
        } elseif ($newPass !== $confirmPass) {
            $error = 'Konfirmasi kata sandi baru tidak cocok.';
        } else {
            $stmt = $pdo->prepare('SELECT password_hash FROM users WHERE id = :id LIMIT 1');
            $stmt->execute([':id' => (int) $admin['id']]);
            $hash = (string) $stmt->fetchColumn();

            if (!password_verify($currentPass, $hash)) {
                $error = 'Kata sandi saat ini salah.';
            } else {
                $upd = $pdo->prepare('UPDATE users SET password_hash = :hash WHERE id = :id');
                $upd->execute([
                    ':hash' => password_hash($newPass, PASSWORD_BCRYPT),
                    ':id'   => (int) $admin['id'],
                ]);
                session_regenerate_id(true);
                setFlash('success', 'Kata sandi akun berhasil diperbarui.');
                header('Location: akun.php');
                exit;
            }
        }
    }
}

renderAdminHeader('Pengaturan Akun', 'akun', $admin);
?>

<div class="pb-6 border-b border-[#DCE1E5]">
  <h1 class="font-display text-2xl font-extrabold text-[#102A43]">Keamanan Akun Admin</h1>
  <p class="text-sm text-[#52606D] mt-0.5">Ganti kata sandi bawaan sebelum website dipublikasikan ke server production.</p>
</div>

<div class="mt-6 grid lg:grid-cols-12 gap-6 items-start">
  <div class="lg:col-span-5 bg-white border border-[#DCE1E5] rounded-md p-6 space-y-3 text-sm">
    <h2 class="font-display font-bold text-base text-[#102A43] pb-3 border-b border-[#DCE1E5]">Profil Sesi Aktif</h2>
    <div><span class="text-xs text-[#52606D]">Nama:</span><div class="font-bold text-[#102A43]"><?= e((string) $admin['name']) ?></div></div>
    <div><span class="text-xs text-[#52606D]">Email:</span><div class="font-medium text-[#1C242B]"><?= e((string) $admin['email']) ?></div></div>
    <div><span class="text-xs text-[#52606D]">Peran:</span><div class="uppercase text-xs font-bold text-[#005A8D]"><?= e((string) $admin['role']) ?></div></div>
  </div>

  <div class="lg:col-span-7 bg-white border border-[#DCE1E5] rounded-md p-6">
    <h2 class="font-display font-bold text-base text-[#102A43] pb-3 border-b border-[#DCE1E5]">Ganti Kata Sandi</h2>

    <?php if ($error !== ''): ?>
      <div class="mt-4 rounded-md bg-red-50 border border-red-200 px-3.5 py-2.5 text-sm text-red-800">
        <?= e($error) ?>
      </div>
    <?php endif; ?>

    <form method="post" action="akun.php" class="mt-4 space-y-4 text-sm max-w-md">
      <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />

      <div>
        <label for="cur-pass" class="block text-xs font-bold text-[#102A43] mb-1">Kata Sandi Saat Ini *</label>
        <input id="cur-pass" name="current_password" type="password" required autocomplete="current-password" class="w-full px-3.5 py-2 rounded-md border border-[#DCE1E5]" />
      </div>

      <div>
        <label for="new-pass" class="block text-xs font-bold text-[#102A43] mb-1">Kata Sandi Baru (minimal 10 karakter) *</label>
        <input id="new-pass" name="new_password" type="password" required minlength="10" autocomplete="new-password" class="w-full px-3.5 py-2 rounded-md border border-[#DCE1E5]" />
      </div>

      <div>
        <label for="cnf-pass" class="block text-xs font-bold text-[#102A43] mb-1">Ulangi Kata Sandi Baru *</label>
        <input id="cnf-pass" name="confirm_password" type="password" required minlength="10" autocomplete="new-password" class="w-full px-3.5 py-2 rounded-md border border-[#DCE1E5]" />
      </div>

      <button type="submit" class="px-5 py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white text-sm font-bold cursor-pointer">
        Simpan Kata Sandi Baru
      </button>
    </form>
  </div>
</div>

<?php renderAdminFooter(); ?>
