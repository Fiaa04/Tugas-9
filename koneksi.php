<?php
$host = "localhost";               // biasanya tetap localhost
$user = "xirpl1_user";             // user database hosting
$pass = "user_password";           // password user hosting
$db   = "xirpl1_db_xirpl1-11_1";  // database hosting lengkap

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
