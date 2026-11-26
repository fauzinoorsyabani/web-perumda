<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

if (currentAdmin()) {
    header('Location: index.php');
    exit;
}

$error = '';
$emailInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailInput = trim((string) ($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    $token = (string) ($_POST['csrf_token'] ?? '');

    $lockUntil = (int) ($_SESSION['login_lock_until'] ?? 0);
    if ($lockUntil > time()) {
        $wait = $lockUntil - time();
        $error = "Terlalu banyak percobaan gagal. Coba lagi dalam {$wait} detik.";
    } elseif (!verifyCsrf($token)) {
        $error = 'Sesi formulir tidak valid. Muat ulang halaman lalu coba lagi.';
    } elseif ($emailInput === '' || $password === '') {
        $error = 'Email dan kata sandi wajib diisi.';
    } else {
        $pdo = getDb();
        if (!$pdo) {
            $error = 'Koneksi database MySQL tidak aktif.';
        } else {
            $stmt = $pdo->prepare('SELECT id, name, email, password_hash, role, is_active FROM users WHERE email = :email LIMIT 1');
            $stmt->execute([':email' => $emailInput]);
            $user = $stmt->fetch();

            if ($user && (int) $user['is_active'] === 1 && password_verify($password, (string) $user['password_hash'])) {
                session_regenerate_id(true);
                unset($_SESSION['login_attempts'], $_SESSION['login_lock_until']);
                $_SESSION['admin_user'] = [
                    'id'    => (int) $user['id'],
                    'name'  => (string) $user['name'],
                    'email' => (string) $user['email'],
                    'role'  => (string) $user['role'],
                ];
                $_SESSION['admin_csrf'] = bin2hex(random_bytes(32));
                setFlash('success', 'Berhasil masuk sebagai ' . $user['name'] . '.');
                header('Location: index.php');
                exit;
            }

            $attempts = ((int) ($_SESSION['login_attempts'] ?? 0)) + 1;
            $_SESSION['login_attempts'] = $attempts;
            if ($attempts >= 5) {
                $_SESSION['login_lock_until'] = time() + 60;
                $_SESSION['login_attempts'] = 0;
            }
            $error = 'Email atau kata sandi tidak cocok.';
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Masuk Panel Admin | Perumda Tirta Sukapura</title>
  <link rel="icon" type="image/x-icon" href="../favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="../assets/css/custom.css" />
</head>
<body class="bg-[#F7F7F5] text-[#1C242B] antialiased min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md bg-white border border-[#DCE1E5] rounded-md p-7 sm:p-8">
  <div class="flex items-center gap-3 pb-5 border-b border-[#DCE1E5]">
    <img src="../assets/images/logo-perumda.png" alt="Logo" class="h-10 w-auto object-contain" onerror="this.style.display='none'" />
    <div>
      <h1 class="font-display font-extrabold text-lg text-[#102A43]">Panel Admin CMS</h1>
      <p class="text-xs text-[#52606D]">Perumda Air Minum Tirta Sukapura</p>
    </div>
  </div>

  <?php if ($error !== ''): ?>
    <div class="mt-5 rounded-md bg-red-50 border border-red-200 px-3.5 py-2.5 text-sm text-red-800">
      <?= e($error) ?>
    </div>
  <?php endif; ?>

  <form method="post" action="login.php" class="mt-5 space-y-4">
    <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>" />

    <div>
      <label for="email" class="block text-xs font-bold text-[#102A43] mb-1.5">Email Admin</label>
      <input
        id="email"
        name="email"
        type="email"
        required
        autocomplete="username"
        value="<?= e($emailInput) ?>"
        placeholder="admin.humas.tirta.sukapura@tirtasukapura.local"
        class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"
      />
    </div>

    <div>
      <label for="password" class="block text-xs font-bold text-[#102A43] mb-1.5">Kata Sandi</label>
      <input
        id="password"
        name="password"
        type="password"
        required
        autocomplete="current-password"
        placeholder="Masukkan kata sandi"
        class="w-full px-3.5 py-2.5 rounded-md border border-[#DCE1E5] text-sm focus:outline-none focus:border-[#005A8D]"
      />
    </div>

    <button
      type="submit"
      class="w-full py-2.5 rounded-md bg-[#005A8D] hover:bg-[#00446B] text-white font-bold text-sm transition-colors cursor-pointer"
    >
      Masuk
    </button>
  </form>

  <div class="mt-6 pt-4 border-t border-[#DCE1E5] flex items-center justify-between text-xs text-[#52606D]">
    <a href="../index.php" class="text-[#005A8D] font-semibold hover:underline">← Kembali ke Website</a>
    <span>Akses khusus staf kantor</span>
  </div>
</div>

</body>
</html>
