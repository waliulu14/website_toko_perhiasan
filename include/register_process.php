<?php
require_once 'config.php';

// Mengambil informasi koneksi dari file config.php
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari form registrasi
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$no_telpon = $_POST['no_telpon'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

// Query untuk mengecek apakah username sudah terdaftar
$checkUsernameQuery = "SELECT * FROM login WHERE username='$username'";
$checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

if (mysqli_num_rows($checkUsernameResult) > 0) {
    // Jika username sudah terdaftar, redirect ke halaman registrasi dengan status=failed
    header('Location: registrasi.php?status=failed');
    exit();
}

// Menghash password menggunakan fungsi password_hash()
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Query untuk memasukkan data ke dalam tabel login
$loginInsertQuery = "INSERT INTO login (username, password, level) VALUES ('$username', '$hashedPassword', 'pelanggan')";
mysqli_query($conn, $loginInsertQuery);

// Mendapatkan id_login yang baru saja dimasukkan
$idLogin = mysqli_insert_id($conn);

// Query untuk memasukkan data ke dalam tabel pelanggan
$pelangganInsertQuery = "INSERT INTO pelanggan (id_login, nama, no_telpon, email, alamat) VALUES ('$idLogin', '$nama', '$no_telpon', '$email', '$alamat')";
mysqli_query($conn, $pelangganInsertQuery);

// Membuat objek SimpleXMLElement
$xml = new SimpleXMLElement('<registrasi></registrasi>');
$xml->addChild('username', htmlspecialchars($username));
$xml->addChild('password', htmlspecialchars($password));
$xml->addChild('nama', htmlspecialchars($nama));
$xml->addChild('no_telpon', htmlspecialchars($no_telpon));
$xml->addChild('email', htmlspecialchars($email));
$xml->addChild('alamat', htmlspecialchars($alamat));

// Mengubah objek SimpleXMLElement menjadi format XML
$xmlString = $xml->asXML();

// Menyimpan XML ke file
$file = 'registrasi.xml';
if (file_put_contents($file, $xmlString) !== false) {
    echo "File XML berhasil dibuat: $file";
} else {
    echo "Gagal membuat file XML.";
}

// Redirect ke halaman pelanggan setelah berhasil mendaftar
header('Location: ../login.php');
exit();

mysqli_close($conn);
?>