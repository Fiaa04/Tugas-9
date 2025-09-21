<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.6s ease-in-out;
        }
        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
            font-size: 28px;
        }
        .search-box {
            text-align: right;
            margin-bottom: 10px;
        }
        .search-box input {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin-bottom: 15px;
            background: #28a745;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover { background: #218838; transform: scale(1.05); }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        th, td { padding: 12px 15px; text-align: center; }
        th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }
        tr:nth-child(even) { background-color: #f8f9fa; }
        tr:hover { background-color: #e9ecef; transition: 0.3s; cursor: pointer; }
        .aksi a {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 2px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        .ubah { background: #17a2b8; color: #fff; }
        .ubah:hover { background: #138496; transform: scale(1.1); }
        .hapus { background: #dc3545; color: #fff; }
        .hapus:hover { background: #c82333; transform: scale(1.1); }
        @keyframes fadeIn { from {opacity: 0; transform: translateY(10px);} to {opacity: 1; transform: translateY(0);} }
    </style>
</head>
<body>
    <div class="container">
        <h2>📚 Data Siswa</h2>
        <div class="search-box">
            🔍 <input type="text" id="searchInput" placeholder="Cari siswa...">
        </div>
        <a href="tambah.php" class="btn">+ Tambah Siswa</a>
        <table id="dataTable">
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM siswa");
            if(mysqli_num_rows($sql) == 0){
                echo "<tr><td colspan='5' align='center'>✨ Data siswa belum ada ✨</td></tr>";
            } else {
                while($row = mysqli_fetch_assoc($sql)){
                    echo "<tr>
                        <td>{$row['id_siswa']}</td>
                        <td>{$row['nama_siswa']}</td>
                        <td>{$row['kelas']}</td>
                        <td>{$row['alamat']}</td>
                        <td class='aksi'>
                            <a href='ubah.php?id={$row['id_siswa']}' class='ubah'>✏️ Ubah</a> 
                            <a href='hapus.php?id={$row['id_siswa']}' class='hapus btn-hapus'>🗑 Hapus</a>
                        </td>
                    </tr>";
                }
            }
            ?>
        </table>
    </div>

    <script>
        // Fitur Pencarian
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#dataTable tr');
            for (let i = 1; i < rows.length; i++) {
                let rowText = rows[i].textContent.toLowerCase();
                rows[i].style.display = rowText.includes(filter) ? "" : "none";
            }
        });

        // Konfirmasi hapus lebih rapi
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function (e) {
                if (!confirm("⚠️ Apakah kamu yakin ingin menghapus data ini?")) {
                    e.preventDefault();
                }
            });
        });

        // Highlight baris saat diklik
        document.querySelectorAll('#dataTable tr').forEach(row => {
            row.addEventListener('click', function () {
                this.style.backgroundColor = '#d1ecf1';
                setTimeout(() => { this.style.backgroundColor = ''; }, 500);
            });
        });
    </script>
</body>
</html>
