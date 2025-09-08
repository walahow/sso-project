<?php
// Tentukan header untuk respons JSON
header('Content-Type: application/json');

// Panggil file konfigurasi database SSO
require_once 'config.php';

// Tangkap token dari parameter URL
$sso_token = $_GET['token'] ?? '';

// Jika token kosong, kirim respons error
if (empty($sso_token)) {
    echo json_encode(['status' => 'error', 'message' => 'Token tidak ditemukan.']);
    exit();
}

// Persiapkan query untuk mencari pengguna dengan token yang sesuai
$sql = "SELECT id, email FROM users WHERE sso_token = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $sso_token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika token valid, ambil data pengguna
    $user_data = $result->fetch_assoc();
    
    // Kirim respons sukses dengan data pengguna
    echo json_encode([
        'status' => 'success',
        'sso_user_id' => $user_data['id'],
        'email' => $user_data['email']
    ]);
} else {
    // Jika token tidak cocok, kirim respons error
    echo json_encode(['status' => 'error', 'message' => 'Token tidak valid.']);
}

// Tutup koneksi database
mysqli_close($link);
?>