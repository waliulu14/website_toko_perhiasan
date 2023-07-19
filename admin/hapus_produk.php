<?php
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Cek apakah parameter ID produk diberikan
if (!isset($_GET['id'])) {
    die("ID produk tidak ditemukan.");
}

// Ambil ID produk dari parameter URL
$id_produk = $_GET['id'];

// Periksa apakah ada pemesanan terkait dengan produk ini
$query_cek_pemesanan = "SELECT * FROM pemesanan WHERE id_produk = '$id_produk'";
$result_cek_pemesanan = mysqli_query($conn, $query_cek_pemesanan);

if (mysqli_num_rows($result_cek_pemesanan) > 0) {
    die("Tidak dapat menghapus produk ini karena terdapat pemesanan yang terkait.");
}

// Hapus produk dari tabel
$query_hapus_produk = "DELETE FROM produk WHERE id = '$id_produk'";
$result_hapus_produk = mysqli_query($conn, $query_hapus_produk);

if ($result_hapus_produk) {
    // Redirect ke halaman data produk setelah berhasil menghapus
    header('Location: data_produk.php');
    exit();
} else {
    die("Terjadi kesalahan. Gagal menghapus produk.");
}
?>