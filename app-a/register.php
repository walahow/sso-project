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
        $stmt = $conn_app_a->prepare($insert_sql);
        $stmt->bind_param("sss", $username, $password_hash, $email);
    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! <a href='index.php'>Silakan login</a>.";
    } else {
        echo "Pendaftaran gagal. Silakan coba lagi.";
    }

    mysqli_close($conn_app_a);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title> Daftar Aplikasi A </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo '<p style="color:red;">Nama pengguna atau kata sandi salah.</p>';
    }
    ?>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-6">
        <h2 class="text-2xl font-bold text-center text-blue-600">Daftar Akun Baru</h2>
        <p class="text-gray-600 text-center mb-6">Buat akun baru untuk melanjutkan</p>

        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" required
                    class="input input-bordered w-full mt-1" placeholder="Masukkan username">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="input input-bordered w-full mt-1" placeholder="Masukkan email">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="input input-bordered w-full mt-1" placeholder="Masukkan password">
            </div>
            
            <button type="submit" class="btn btn-primary w-full">Daftar</button>
        </form>

        <p class="mt-4 text-center text-sm">
            Sudah punya akun? 
            <a href="index.php" class="link link-primary">Login di sini</a>
        </p>
    </div>

</body>
</html>