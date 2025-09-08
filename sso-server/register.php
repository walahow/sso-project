<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun SSO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="card w-full max-w-md shadow-xl bg-white p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Buat Akun Baru</h2>
        
        <form action="process_register.php" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block font-medium">Username:</label>
                <input type="text" id="username" name="username" required class="input input-bordered w-full" placeholder="Masukkan Username"/>
            </div>

            <div>
                <label for="email" class="block font-medium">Email:</label>
                <input type="email" id="email" name="email" required class="input input-bordered w-full" placeholder="Masukkan Email"/>
            </div>

            <div>
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" id="password" name="password" required class="input input-bordered w-full" placeholder="Masukkan Password"/>
            </div>

            <button type="submit" class="btn btn-primary w-full">Daftar</button>
        </form>

        <div class="mt-4 text-center">
            <p>Sudah punya akun? <a href="index.php" class="link link-primary">Login di sini</a></p>
        </div>
    </div>
</body>
</html>