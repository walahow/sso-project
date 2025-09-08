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
    $stmt = $conn_app_C->prepare($sql);
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
