<?php
session_start();

// Mengambil informasi koneksi dari file config.php
require_once 'config.php';

// Fungsi untuk melakukan login
function login($username, $password)
{
    global $conn;

    // Melakukan sanitasi inputan
    $username = mysqli_real_escape_string($conn, $username);

    // Query untuk mendapatkan data pengguna berdasarkan username
    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Memeriksa hasil query
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Memeriksa kecocokan password yang di-hash
        if (password_verify($password, $row['password'])) {
            // Menyimpan informasi pengguna ke dalam sessions
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];

            // Mengarahkan pengguna ke halaman yang sesuai berdasarkan level
            if ($row['level'] == 'admin') {
                header("Location: ../admin/index.php");
                exit();
            } elseif ($row['level'] == 'pelanggan') {
                header("Location: ../pelanggan/index.php");
                exit();
            }
        } else {
            // Jika password tidak cocok, mengarahkan pengguna kembali ke halaman login dengan status 'failed'
            echo '<script>alert("Username atau Password Salah."); window.location = "../login.php";</script>';
            exit();
        }
    } else {
        // Jika login gagal, mengarahkan pengguna kembali ke halaman login dengan status 'failed'
        echo '<script>alert("Username atau Password Salah."); window.location = "../login.php";</script>';
        exit();
    }

    mysqli_close($conn);
}

// Memeriksa apakah form login telah disubmit
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}
?>