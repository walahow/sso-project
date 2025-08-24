<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Status Login</title>
</head>
<body>
    <h2>Selamat! Anda Berhasil Login ke Aplikasi B.</h2>
    <p>Anda telah berhasil terhubung dengan sistem SSO.</p>
    <p>Nama Pengguna: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
</body>
</html>