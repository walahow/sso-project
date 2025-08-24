<?php
// File: app-a/config.php
// Konfigurasi Database Aplikasi A
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME_APP_A', 'db_app_a');

// Buat koneksi ke database MySQL untuk aplikasi A
$conn_app_a = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME_APP_A);

// Cek koneksi
if($conn_app_a === false){
    die("ERROR: Tidak dapat terhubung ke database Aplikasi A. " . mysqli_connect_error());
}
?>