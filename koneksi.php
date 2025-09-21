<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_xirpl1-11_1"; // harus sama dengan yang ada di phpMyAdmin

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
