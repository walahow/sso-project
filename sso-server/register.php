<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun SSO</title>
</head>
<body>
    <h2>Buat Akun Baru</h2>
    <form action="process_register.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Daftar</button>
    </form>
    <br>
    <a href="index.php">Sudah punya akun? Login di sini.</a>
</body>
</html>