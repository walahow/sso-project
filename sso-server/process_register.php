<?php
// Panggil file konfigurasi database
require_once 'config.php';

// Ambil data dari formulir POST
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($email) || empty($password)) {
    die("Mohon isi semua data.");
}

// 1. Hash Kata Sandi
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// 2. Periksa apakah username sudah ada
$check_sql = "SELECT id FROM users WHERE username = ? OR email = ?";
$check_stmt = $link->prepare($check_sql);
$check_stmt->bind_param("ss", $username, $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    die("Username atau email sudah terdaftar.");
}

// 3. Masukkan pengguna baru ke database
$insert_sql = "INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)";
$insert_stmt = $link->prepare($insert_sql);
$insert_stmt->bind_param("sss", $username, $password_hash, $email);

if ($insert_stmt->execute()) {
    echo "Pendaftaran berhasil! <a href='index.php'>Silakan login</a>.";
} else {
    echo "Pendaftaran gagal. Silakan coba lagi.";
}

mysqli_close($link);
?>