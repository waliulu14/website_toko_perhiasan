<?php
// tambah_kategori.php (halaman untuk menambahkan kategori baru)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel
$nama_kategori = '';

// Error handling
$errors = array();

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui form
    $nama_kategori = $_POST['nama_kategori'];

    // Validasi data
    if (empty($nama_kategori)) {
        $errors[] = 'Nama kategori harus diisi.';
    }

    // Jika tidak ada error, tambahkan kategori ke database
    if (empty($errors)) {
        $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect ke halaman kategori setelah berhasil menambahkan kategori
            header('Location: dafta.php');
            exit();
        } else {
            $errors[] = 'Terjadi kesalahan. Gagal menambahkan kategori.';
        }
    }
}
?>

<?php include 'include/navbar.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="kategori.php">Data Kategori</a></li>
                <li class="breadcrumb-item active">Tambah Kategori</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Kategori
                </div>
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach ($errors as $error): ?>
                                <p>
                                    <?php echo $error; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                value="<?php echo $nama_kategori; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>