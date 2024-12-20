<?php
session_start();
include "config.php";

// Periksa apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_ukm = mysqli_real_escape_string($conn, $_POST['nama_ukm']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Periksa apakah file gambar diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_folder = "img/" . $foto;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($foto_tmp, $foto_folder)) {
            // Query untuk menyisipkan data baru
            $query = "INSERT INTO ukm (nama_ukm, foto, deskripsi) VALUES ('$nama_ukm', '$foto', '$deskripsi')";
            if (mysqli_query($conn, $query)) {
                header("Location: himpunan_tampil.php?message=Data berhasil ditambahkan");
                exit;
            } else {
                $error = "Gagal menyimpan data: " . mysqli_error($conn);
            }
        } else {
            $error = "Gagal mengunggah gambar.";
        }
    } else {
        $error = "Harap unggah gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group textarea {
            height: 100px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Tambah Kegiatan Baru</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="ukm_insert.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_ukm">Nama Kegiatan:</label>
            <input type="text" id="nama_ukm" name="nama_ukm" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
        </div>
        <div class="form-group">
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>
