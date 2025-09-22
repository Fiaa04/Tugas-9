<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "xirpl1_user";        // user database hosting
$password = "user_password";      // password user hosting
$database = "xirpl1_db_xirpl1-11_1"; // database hosting

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat tabel siswa jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    alamat TEXT
)";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}
?>