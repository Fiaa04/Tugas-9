<?php
$host = "localhost";
$user = "xirpl1-11";        // username database kamu
$pass = "0098375178";       // password database kamu
$db   = "db_xirpl1-11_1";   // nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>
