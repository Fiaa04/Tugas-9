<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $kelas  = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $stmt = $koneksi->prepare("INSERT INTO siswa (nama_siswa, kelas, alamat) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $kelas, $alamat);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-10px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>➕ Tambah Siswa</h2>
        <form method="POST">
            <input type="text" name="nama_siswa" placeholder="Nama Siswa" required>
            <input type="text" name="kelas" placeholder="Kelas" required>
            <textarea name="alamat" placeholder="Alamat" required></textarea>
            <input type="submit" name="simpan" value="Simpan">
        </form>
        <a href="index.php">← Kembali</a>
    </div>
</body>
</html>
