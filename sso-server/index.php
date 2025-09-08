<?php
// Tangkap URL aplikasi yang meminta login dari parameter GET.
$app_url = $_GET['app_url'] ?? ''; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SSO Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <div class="card w-96 bg-white shadow-xl">
    <div class="card-body">
      <h2 class="text-2xl font-bold text-center mb-4">Login ke Sistem SSO</h2>

      <form action="login.php" method="POST" class="space-y-3">
        <input type="hidden" name="app_url" value="<?php echo htmlspecialchars($app_url); ?>">

        <div>
          <label class="label" for="username">
            <span class="label-text">Username</span>
          </label>
          <input type="text" id="username" name="username" class="input input-bordered w-full" required placeholder="Masukkan Username">
        </div>

        <div>
          <label class="label" for="password">
            <span class="label-text">Password</span>
          </label>
          <input type="password" id="password" name="password" class="input input-bordered w-full" required placeholder="Masukkan Password">
        </div>

        <button type="submit" class="btn btn-primary w-full">Login</button>
      </form>

      <div class="text-center mt-4">
        <p>Belum punya akun? 
          <a href="register.php" class="link link-primary">Daftar di sini</a>.
        </p>
      </div>
    </div>
  </div>

</body>
</html>
