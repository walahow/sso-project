<?php
// Tangkap status dari parameter URL.
// Contoh: http://sso-project.test/sso-server/status.php?login_status=success
$status = $_GET['login_status'] ?? 'unknown';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Login - SSO Server</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Status Login</h1>

        <?php if ($status === 'success'): ?>
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
                ✅ Login berhasil! Anda sekarang bisa mengakses aplikasi dummy.
            </div>
            <a href="index.php" class="inline-block px-4 py-2 mt-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Kembali ke Halaman Login
            </a>

        <?php elseif ($status === 'failed'): ?>
            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg">
                ❌ Login gagal. Nama pengguna atau kata sandi salah.
            </div>
            <a href="index.php" class="inline-block px-4 py-2 mt-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Coba Lagi
            </a>

        <?php else: ?>
            <div class="p-4 mb-4 text-yellow-800 bg-yellow-100 rounded-lg">
                ⚠️ Status tidak diketahui. Silakan coba login ulang.
            </div>
            <a href="index.php" class="inline-block px-4 py-2 mt-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Kembali ke Login
            </a>
        <?php endif; ?>
    </div>
</body>
</html>