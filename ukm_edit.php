<?php
session_start();
include "config.php";

// Pastikan parameter ID ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM ukm WHERE id_ukm = '$id'");

    // Periksa apakah data ditemukan
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
    } else {
        // Jika data tidak ditemukan, alihkan kembali ke halaman daftar
        header("Location: himpunan_tampil.php?message=Data tidak ditemukan");
        exit();
    }
} else {
    // Jika ID tidak disediakan, alihkan kembali ke halaman daftar
    header("Location: himpunan_tampil.php");
    exit();
}

// Proses form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_ukm = $_POST['nama_ukm'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "img/";
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $foto);
        mysqli_query($conn, "UPDATE ukm SET nama_ukm='$nama_ukm', deskripsi='$deskripsi', foto='$foto' WHERE id_ukm='$id'");
    } else {
        mysqli_query($conn, "UPDATE ukm SET nama_ukm='$nama_ukm', deskripsi='$deskripsi' WHERE id_ukm='$id'");
    }

    header("Location: himpunan_tampil.php?message=Data berhasil diubah");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #498dc1;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        form input[type="text"], 
        form textarea, 
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form textarea {
            resize: vertical;
        }

        form input[type="submit"] {
            background-color: #498dc1;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #356a8b;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #498dc1;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .preview-img {
            display: block;
            margin: 10px 0;
            max-width: 100px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Edit Kegiatan</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Nama Kegiatan:</label>
        <input type="text" name="nama_ukm" value="<?= htmlspecialchars($data['nama_ukm'] ?? '') ?>" required>
        
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea>
        
        <label>Foto:</label>
        <?php if (!empty($data['foto'])): ?>
            <img src="img/<?= htmlspecialchars($data['foto']) ?>" class="preview-img" alt="<?= htmlspecialchars($data['nama_ukm']) ?>">
        <?php else: ?>
            <p>Gambar tidak tersedia</p>
        <?php endif; ?>
        <input type="file" name="foto">
        
        <input type="submit" value="Simpan Perubahan">
    </form>
    <a href="himpunan_tampil.php">Kembali</a>
</body>
</html>
