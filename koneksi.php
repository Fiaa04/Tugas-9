<?php
$host = "localhost";
$user = "root";   // default XAMPP
$pass = "";       // default XAMPP kosong
$db   = "db_xirpl1-11_1"; // pastikan database ini sudah dibuat di XAMPP

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
