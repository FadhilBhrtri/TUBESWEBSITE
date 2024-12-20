<?php
session_start();
include "config.php";

if (isset($_GET['id']) && isset($_GET['foto'])) {
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    // Periksa apakah ID berasal dari database atau data tambahan
    if (is_numeric($id)) {
        // Jika ID numeric, hapus dari database
        $query = mysqli_query($conn, "DELETE FROM ukm WHERE id_ukm = '$id'");
        if ($query) {
            if (file_exists("img/$foto")) {
                unlink("img/$foto");
            }
            header("Location: himpunan_tampil.php?message=Data berhasil dihapus");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Jika ID bukan numeric (data tambahan), hapus hanya file gambar
        if (file_exists("img/$foto")) {
            unlink("img/$foto");
        }
        header("Location: himpunan_tampil.php?message=Data tambahan berhasil dihapus");
    }
} else {
    header("Location: himpunan_tampil.php");
}
?>
