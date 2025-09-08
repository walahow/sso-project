<?php
// File: app-c/index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi C - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-6">
        <h2 class="text-2xl font-bold text-center text-purple-600">Aplikasi C</h2>
        <p class="text-gray-600 text-center mb-6">Silakan login dengan akun Anda</p>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'login_failed'): ?>
            <div class="alert alert-error mb-4">
                <span>❌ Nama pengguna atau kata sandi salah.</span>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" required
                    class="input input-bordered w-full mt-1" placeholder="Masukkan username">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="input input-bordered w-full mt-1" placeholder="Masukkan password">
            </div>
            
            <button type="submit" class="btn btn-primary w-full">Login</button>
        </form>

        <p class="mt-4 text-center text-sm">
            Belum punya akun? 
            <a href="register.php" class="link link-primary">Daftar di sini</a>
        </p>

        <div class="divider">atau</div>

        <a href="sso_login.php" class="btn btn-outline btn-accent w-full">Login dengan SSO</a>
    </div>

</body>
</html>
