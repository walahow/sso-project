<?php
// File: app-a/config.php
// Konfigurasi Database Aplikasi C
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME_APP_C', 'db_app_c');

// Buat koneksi ke database MySQL untuk aplikasi A
$conn_app_C = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME_APP_C);

// Cek koneksi
if($conn_app_C === false){
    die("ERROR: Tidak dapat terhubung ke database Aplikasi C. " . mysqli_connect_error());
}
?>