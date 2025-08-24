<?php
// Include the database configuration file
require_once 'config.php';

// Get data from the POST request
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$app_url = $_POST['app_url'] ?? '';

// Check if the user exists and the password is correct
$sql = "SELECT id, email, password_hash FROM users WHERE username = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password against the stored hash
    if (password_verify($password, $row['password_hash'])) {
        // Password is correct. Generate a unique SSO token.
        $sso_token = bin2hex(random_bytes(32));
        
        // Save the token to the database for validation
        $update_sql = "UPDATE users SET sso_token = ? WHERE id = ?";
        $update_stmt = $link->prepare($update_sql);
        $update_stmt->bind_param("si", $sso_token, $row['id']);
        $update_stmt->execute();
        
        // Redirect kembali ke aplikasi dengan token
        header("Location: " . $app_url . "callback.php?token=" . $sso_token);
        exit();
    }
}

// Redirect ke halaman status dengan parameter 'failed'
header("Location: status.php?login_status=failed");
exit();
?>