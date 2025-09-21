<?php
include "koneksi.php";

// Validasi parameter id
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("DELETE FROM siswa WHERE id_siswa = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
}

// Redirect kembali ke index
header("Location: index.php");
exit;
?>
