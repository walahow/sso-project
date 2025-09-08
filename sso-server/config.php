<?php
// Konfigurasi Database SSO
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // Laragon default password untuk root kosong
define('DB_NAME', 'db_sso');

// Buat koneksi ke database MySQL
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Cek koneksi
if($link === false){
    die("ERROR: Tidak dapat terhubung. " . mysqli_connect_error());
}
?>