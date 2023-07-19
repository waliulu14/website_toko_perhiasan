<?php
// tambah_divisi.php (halaman untuk membuat divisi baru)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel dengan nilai awal kosong
$nama = '';
$deskripsi = '';
$pesan = '';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan sanitasi input
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $gambar_filename = uniqid() . '.' . $gambar_ext;
    $gambar_destination = 'img/devisi/' . $gambar_filename;
    move_uploaded_file($gambar_tmp, $gambar_destination);

    // Query untuk menambahkan data divisi ke database
    $query = "INSERT INTO devisi (nama_devisi, deskripsi, gambar) VALUES ('$nama', '$deskripsi', '$gambar_destination')";
    $result = mysqli_query($conn, $query);

    // Cek apakah divisi berhasil ditambahkan
    if ($result) {
        // Redirect kembali ke halaman divisi.php dengan pesan sukses
        header("Location: divisi.php?pesan=Divisi berhasil ditambahkan.");
        exit();
    } else {
        // Redirect kembali ke halaman divisi.php dengan pesan error
        header("Location: divisi.php?pesan=Terjadi kesalahan. Divisi gagal ditambahkan.");
        exit();
    }
}
?>

<?php include 'include/navbar.php'?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Divisi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="divisi.php">Data Divisi</a></li>
                <li class="breadcrumb-item active">Tambah Divisi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus-circle me-1"></i>
                    Tambah Divisi
                </div>
                <div class="card-body">
                    <?php if ($pesan) : ?>
                        <div class="alert alert-info"><?php echo $pesan; ?></div>
                    <?php endif; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo $deskripsi; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'?>
</div>
