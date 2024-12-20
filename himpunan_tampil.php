<?php
session_start();
include "config.php";

$query = mysqli_query($conn, "SELECT * FROM ukm ORDER BY id_ukm DESC");
$no = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #498dc1;
            margin-bottom: 20px;
        }

        .tombol {
            background-color: #498dc1;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            margin: 5px;
            display: inline-block;
        }

        .tombol-tambah {
            justify-content: center;
            background-color: #58a6e1;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
    
        }

        table {
            padding: 20px;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table thead tr {
            background-color: #498dc1;
            color: white;
        }

        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table img {
            width: 200px;
            height: auto;
            border-radius: 5px;
        }

        table th {
            text-align: center;
        }

        table td {
            vertical-align: top;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar" style="display: flex; justify-content: space-between; align-items: center; background-color: #f5f5f5; padding: 1rem 2rem; border-bottom: 0.5px solid #498dc1;">
            <a aria-label="Logo Icon">
                <img src="img/logo hmj.png" alt="Logo HMJ" class="logo" style="width: 100px;">
            </a>
            <nav>
                <a class="btn-primary" href="dashboard.php" style="background-color: #498dc1; color: white; padding: 0.5rem 1rem; border-radius: 25px; text-decoration: none; font-weight: bold; transition: background 0.3s ease; margin-left: 20px;">Beranda</a>
                <a class="btn-primary" href="tentang.php" style="background-color: #498dc1; color: white; padding: 0.5rem 1rem; border-radius: 25px; text-decoration: none; font-weight: bold; transition: background 0.3s ease; margin-left: 20px;">Tentang</a>
                <a class="btn-primary" href="logout.php" style="background-color: #498dc1; color: white; padding: 0.5rem 1rem; border-radius: 25px; text-decoration: none; font-weight: bold; transition: background 0.3s ease; margin-left: 20px;">Logout</a>
            </nav>
        </div>
    </header>

    <main>
        <h1>Kegiatan Kami</h1>
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Nama Kegiatan</th>
                    <th style="width: 25%;">Gambar</th>
                    <th style="width: 40%;">Deskripsi</th>
                    <th style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                <tr>
                    <td style="text-align: center;"><?= $no ?></td>
                    <td><?= htmlspecialchars($data['nama_ukm']) ?></td>
                    <td style="text-align: center;">
                        <img src="img/<?= htmlspecialchars($data['foto']) ?>" 
                             alt="<?= htmlspecialchars($data['nama_ukm']) ?>">
                    </td>
                    <td><?= htmlspecialchars($data['deskripsi']) ?></td>
                    <td style="text-align: center;">
                        <a class="tombol" href="ukm_edit.php?id=<?= $data['id_ukm'] ?>">Edit</a>
                        <a class="tombol" onclick="return confirm('Yakin ingin menghapus?')" 
                           href="ukm_hapus.php?id=<?= $data['id_ukm'] ?>&foto=<?= htmlspecialchars($data['foto']) ?>">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="ukm_insert.php" class="tombol-tambah">Tambah Kegiatan</a>
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?= htmlspecialchars($_GET['message']) ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
