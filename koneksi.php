<?php
$host = "localhost";
$user = "root";      // default user XAMPP
$pass = "";          // default XAMPP tanpa password
$db   = "db_xirpl1-11_1";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
