<?php
// hapus_kategori.php (halaman untuk menghapus kategori)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Periksa apakah parameter ID kategori ada
if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];

    // Hapus kategori dari database berdasarkan ID
    $query = "DELETE FROM kategori WHERE id = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman kategori setelah berhasil menghapus kategori
        header('Location: dafta.php');
        exit();
    } else {
        die("Query error: " . mysqli_error($conn));
    }
} else {
    die("ID kategori tidak ditemukan.");
}
?>