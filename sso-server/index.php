<?php
// Tangkap URL aplikasi yang meminta login dari parameter GET.
$app_url = $_GET['app_url'] ?? ''; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>SSO Login</title>
</head>
<body>
    <h2>Login ke Sistem SSO</h2>
    <form action="login.php" method="POST">
        <input type="hidden" name="app_url" value="<?php echo htmlspecialchars($app_url); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
    
    <br>
    
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a>.</p>

</body>
</html>