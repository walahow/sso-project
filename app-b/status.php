<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Status Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" /> 
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="card w-96 bg-white shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-4">✅ Selamat! Anda Berhasil Login ke Aplikasi B</h2>
        <p class="text-center text-gray-700">Anda telah berhasil terhubung dengan sistem SSO.</p>
        <div class="mt-4 text-center">
            <p class="font-semibold">Nama Pengguna:</p>
            <p class="text-blue-600">
                <?php echo htmlspecialchars($_SESSION['email']); ?>
            </p>
        </div>
    </div>
</body>
</html>