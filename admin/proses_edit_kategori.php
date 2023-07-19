<?php
// proses_edit_kategori.php (halaman untuk memproses pembaruan data kategori)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Periksa apakah parameter ID kategori dan data kategori yang akan diubah ada
if (isset($_POST['id']) && isset($_POST['nama_kategori'])) {
    $id_kategori = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    // Perbarui data kategori di tabel kategori
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    // Error handling
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Redirect ke halaman data kategori setelah pembaruan berhasil
    header("Location: dafta.php");
    exit();
} else {
    die("Data kategori tidak lengkap.");
}
?>