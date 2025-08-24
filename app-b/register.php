<?php
// File: app-a/register.php
session_start();
// Sertakan file koneksi database
require_once 'config.php';

// Cek jika formulir diserahkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';

    // Hash kata sandi untuk keamanan
    $password_hash = password_hash($password, PASSWORD_DEFAULT); 
    
    // Siapkan pernyataan SQL untuk memasukkan pengguna baru
        $insert_sql = "INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)";
        $stmt = $conn_app_b->prepare($insert_sql);
        $stmt->bind_param("sss", $username, $password_hash, $email);
    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! <a href='index.php'>Silakan login</a>.";
    } else {
        echo "Pendaftaran gagal. Silakan coba lagi.";
    }

    mysqli_close($conn_app_b);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Aplikasi B</title>
</head>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo '<p style="color:red;">Nama pengguna atau kata sandi salah.</p>';
    }
    ?>
<body>
    <h2>Daftar Akun Baru</h2>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Daftar</button>
    </form>
    <br>
    <a href="index.php">Sudah punya akun? Login di sini.</a>
</body>
</html>