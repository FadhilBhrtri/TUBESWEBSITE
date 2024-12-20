<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

$host = 'localhost';
$dbname = 'himpunan_db';
$dbuser = 'root';
$dbpass = '';

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$role = $_SESSION['role']; // Dapatkan role pengguna
$error = '';
$success = '';

// Ambil data pengguna
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();



// Jika form di-submit untuk memperbarui profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    // Update data pengguna
    $update_sql = "UPDATE users SET full_name = ?, phone = ?, address = ? WHERE username = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssss", $full_name, $phone, $address, $username);

    if ($stmt->execute()) {
        $success = "Profil berhasil diperbarui!";
        // Refresh data pengguna
        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        $user = $result->fetch_assoc();
    } else {
        $error = "Terjadi kesalahan, silakan coba lagi!";
    }
}

// Hapus pengguna (hanya admin)
if (isset($_GET['delete_username']) && $role === 'admin') {
    $delete_username = $_GET['delete_username'];
    $delete_sql = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("s", $delete_username);
    if ($stmt->execute()) {
        $success = "Akun berhasil dihapus!";
    } else {
        $error = "Gagal menghapus akun!";
    }
}

// Jika role adalah admin, tampilkan daftar pengguna
if ($role === 'admin') {
    $users_sql = "SELECT username, full_name, phone, address FROM users";
    $users_result = $conn->query($users_sql);
}

$query = mysqli_query($conn, "SELECT * FROM ukm ORDER BY id_ukm DESC");
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="css/profilcss.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        nav {
            background-color: #498dc1;
            padding: 10px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        nav a {
            text-decoration: none;
        }
        .profile-section {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #498dc1;
            text-align: center;
            margin-bottom: 20px;
        }
        img{
            width: 200px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #498dc1;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
        .btn {
            background-color: #498dc1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #3978a6;
        }
        .logout-btn {
            background-color: #f44336;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
        /* Tambahkan style seperti sebelumnya */
    </style>
</head>
<body>
    <nav>
        <!-- Navbar tetap sama -->
    </nav>

    <section class="profile-section">
        <div class="profile-container">
            <h2>Profil Anda</h2>

            <!-- Pesan jika sukses atau gagal -->
            <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" value="<?= htmlspecialchars($user['username'] ?? ''); ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="address" value="<?= htmlspecialchars($user['address'] ?? ''); ?>">
                </div>
                <button type="submit" class="btn">Simpan Perubahan</button>
            </form>

            <h3>Daftar Kegiatan</h3>
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
        // Cek apakah query mengembalikan data
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $no++;
        ?>
        <tr>
            <td style="text-align: center;"><?= $no ?></td>
            <td><?= htmlspecialchars($data['nama_ukm']) ?></td>
            <td style="text-align: center;">
                <?php if (!empty($data['foto']) && file_exists("img/" . $data['foto'])): ?>
                    <img src="img/<?= htmlspecialchars($data['foto']) ?>" 
                         alt="<?= htmlspecialchars($data['nama_ukm']) ?>">
                <?php else: ?>
                    <p style="color: red;">Gambar tidak tersedia</p>
                <?php endif; ?>
            </td>
            <td><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></td>
            <td style="text-align: center;">
                <a class="tombol" href="ukm_edit.php?id=<?= $data['id_ukm'] ?>">Edit</a>
                <a class="tombol" onclick="return confirm('Yakin ingin menghapus?')" 
                   href="ukm_hapus.php?id=<?= $data['id_ukm'] ?>&foto=<?= htmlspecialchars($data['foto']) ?>">Hapus</a>
            </td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="5" style="text-align: center; color: red;">Tidak ada data kegiatan yang tersedia</td>
        </tr>
        <?php } ?>
    </tbody>
</table>



            <?php if ($role === 'admin'): ?>
                <h3>Daftar Pengguna Terdaftar</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user_row = $users_result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($user_row['username']); ?></td>
                                <td><?= htmlspecialchars($user_row['full_name']); ?></td>
                                <td><?= htmlspecialchars($user_row['phone']); ?></td>
                                <td><?= htmlspecialchars($user_row['address']); ?></td>
                                <td>
                                    <a href="?delete_username=<?= $user_row['username']; ?>" onclick="return confirm('Yakin ingin menghapus akun ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>
    <a class="btn-primary" href="logout.php" style="background-color: #498dc1; color: white; padding: 0.5rem 1rem; border-radius: 25px; text-decoration: none; font-weight: bold; transition: background 0.3s ease; margin-left: 20px; justify-content: center;">Logout</a>
</body>
</html>
