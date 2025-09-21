<?php
include "koneksi.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];

$stmt = $koneksi->prepare("SELECT * FROM siswa WHERE id_siswa = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    echo "Data siswa tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {
    $nama   = $_POST['nama_siswa'];
    $kelas  = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $stmt = $koneksi->prepare("UPDATE siswa SET nama_siswa=?, kelas=?, alamat=? WHERE id_siswa=?");
    $stmt->bind_param("sssi", $nama, $kelas, $alamat, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
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
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
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
        <h2>✏️ Ubah Siswa</h2>
        <form method="POST">
            <input type="text" name="nama_siswa" value="<?= htmlspecialchars($data['nama_siswa']) ?>" required>
            <input type="text" name="kelas" value="<?= htmlspecialchars($data['kelas']) ?>" required>
            <textarea name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>
            <input type="submit" name="update" value="Update">
        </form>
        <a href="index.php">← Kembali</a>
    </div>
</body>
</html>