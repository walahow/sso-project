<?php
// File: app-a/callback.php
session_start();

// Panggil file konfigurasi yang baru
require_once 'config.php';

// Ambil token dari URL
$sso_token = $_GET['token'] ?? '';

if (empty($sso_token)) {
    die("SSO token tidak ditemukan.");
}

// Kirim permintaan ke endpoint validasi server SSO
$validate_url = "http://sso-project.test/sso-server/validate.php?token=" . urlencode($sso_token);
$response = @file_get_contents($validate_url); 
$user_data = json_decode($response, true);




if ($user_data && $user_data['status'] === 'success') {
    // Token valid. Buat sesi untuk aplikasi ini.
    $_SESSION['app_user_id'] = $user_data['sso_user_id'];
    $_SESSION['email'] = $user_data['email'];

    // Cek apakah pengguna sudah ada di database aplikasi ini
    $sql = "SELECT * FROM users WHERE sso_user_id = ?";
    $stmt = $conn_app_a->prepare($sql);
    $stmt->bind_param("i", $user_data['sso_user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $insert_sql = "INSERT INTO users (sso_user_id, email) VALUES (?, ?)";
        $insert_stmt = $conn_app_a->prepare($insert_sql);
        $insert_stmt->bind_param("is", $user_data['sso_user_id'], $user_data['email']);
        $insert_stmt->execute();
    }
    
    // Redirect ke halaman utama aplikasi yang sudah login
    header("Location: status.php");
    exit();

} else {
    // Token tidak valid
    die("Gagal memvalidasi token dari server SSO.");
}
?>