<?php
// File: app-b/config.php
// Konfigurasi Database Aplikasi B
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME_APP_B', 'db_app_b');

// Buat koneksi ke database MySQL untuk aplikasi B
$conn_app_b = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME_APP_B);

// Cek koneksi
if($conn_app_b === false){
    die("ERROR: Tidak dapat terhubung ke database Aplikasi B. " . mysqli_connect_error());
}
?>