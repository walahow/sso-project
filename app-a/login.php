<?php
session_start();

// Include the application's database configuration
require_once 'config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validate credentials against the database
    // The query checks for a regular user (sso_user_id IS NULL)
    $sql = "SELECT sso_user_id, email, password_hash FROM users WHERE username = ? AND sso_user_id IS NULL";
    $stmt = $conn_app_a->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        // Verify the provided password against the stored hash
        if (password_verify($password, $user_data['password_hash'])) {
            // Login successful
            $_SESSION['app_user_id'] = $user_data['sso_user_id'];
            $_SESSION['email'] = $user_data['email'];
            
            header("Location: status.php");
            exit();
        }
    }
    
    // If login fails
    echo "Login gagal. Nama pengguna atau kata sandi salah.";
    header("Location: index.php?error=login_failed");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - App A</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-box {
        background: #fff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-box h2 {
        margin-bottom: 15px;
        text-align: center;
    }
    .login-box input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .login-box button {
        width: 100%;
        padding: 10px;
        background: #007BFF;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .login-box button:hover {
        background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login ke App A</h2>
    <form method="POST" action="login.php">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>

