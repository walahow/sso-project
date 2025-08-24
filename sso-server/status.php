<?php
// Tangkap status dari parameter URL.
// Contoh: http://sso-project.test/sso-server/status.php?login_status=success
$status = $_GET['login_status'] ?? 'unknown';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Status</title>
</head>
<body>
    <h1>Status Login</h1>
    <?php if ($status === 'success'): ?>
        <p style="color: green; font-size: 1.2em;">Login berhasil! Anda sekarang bisa mengakses aplikasi dummy.</p>
        <p>Silakan kembali ke <a href="index.php">halaman login</a>.</p>
    <?php elseif ($status === 'failed'): ?>
        <p style="color: red; font-size: 1.2em;">Login gagal. Nama pengguna atau kata sandi salah.</p>
        <p>Silakan coba lagi di <a href="index.php">halaman login</a>.</p>
    <?php else: ?>
        <p>Status tidak diketahui. Silakan kembali ke <a href="index.php">halaman login</a>.</p>
    <?php endif; ?>
</body>
</html>