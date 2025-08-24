<?php
// File: app-a/index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi C</title>
</head>
<body>
    <h2>Login Aplikasi C</h2>
    <p>Silakan login dengan akun Anda.</p>
    
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
        echo '<p style="color:red;">Nama pengguna atau kata sandi salah.</p>';
    }
    ?>

    <form action="login.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
    
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a>.</p>
    
    <hr>
    
    <h3>Atau gunakan akun SSO Anda</h3>
    <a href="sso_login.php">
        <button>Login dengan SSO</button>
    </a>
</body>
</html>