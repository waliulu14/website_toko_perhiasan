<?php
$host = 'localhost'; // host database
$user = 'root'; // username database
$password = ''; // password database
$dbname = '20222_wp2_412021021'; // nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}


// Fungsi untuk melakukan koneksi ke database
function connectToDatabase()
{
    global $connection;
    return $connection;
}
?>