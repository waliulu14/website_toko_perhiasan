<?php
// edit_divisi.php (halaman untuk mengedit data divisi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel dengan nilai awal kosong
$id = '';
$namaDevisi = '';
$deskripsi = '';
$pesan = '';

// Cek apakah parameter ID tersedia
if (isset($_GET['id'])) {
    // Dapatkan ID divisi dari parameter
    $id = $_GET['id'];

    // Cek apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi dan sanitasi input
        $namaDevisi = $_POST['nama_devisi'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk mengupdate data divisi berdasarkan ID
        $query = "UPDATE devisi SET nama_devisi = '$namaDevisi', deskripsi = '$deskripsi' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        // Cek apakah divisi berhasil diupdate
        if ($result) {
            // Redirect kembali ke halaman divisi.php dengan pesan sukses
            header("Location: divisi.php?pesan=Data divisi berhasil diupdate.");
            exit();
        } else {
            // Redirect kembali ke halaman divisi.php dengan pesan error
            header("Location: divisi.php?pesan=Terjadi kesalahan. Data divisi gagal diupdate.");
            exit();
        }
    } else {
        // Query untuk mendapatkan data divisi berdasarkan ID
        $query = "SELECT * FROM devisi WHERE id = $id";
        $result = mysqli_query($conn, $query);

        // Cek apakah divisi dengan ID tersebut ditemukan
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $namaDevisi = $row['nama_devisi'];
            $deskripsi = $row['deskripsi'];
        } else {
            // Redirect kembali ke halaman divisi.php jika divisi tidak ditemukan
            header("Location: divisi.php");
            exit();
        }
    }
} else {
    // Jika parameter ID tidak tersedia, redirect kembali ke halaman divisi.php
    header("Location: divisi.php");
    exit();
}
?>

<?php include 'include/navbar.php'?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Data Divisi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="divisi.php">Data Divisi</a></li>
                    <li class="breadcrumb-item active">Edit Data Divisi</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-edit me-1"></i>
                        Edit Data Divisi
                    </div>
                    <div class="card-body">
                        <?php if ($pesan) : ?>
                            <div class="alert alert-info"><?php echo $pesan; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="edit_divisi.php?id=<?php echo $id; ?>">
                            <div class="mb-3">
                                <label for="nama_devisi" class="form-label">Nama Divisi</label>
                                <input type="text" class="form-control" id="nama_devisi" name="nama_devisi" value="<?php echo $namaDevisi; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $deskripsi; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include 'include/footer.php'?>
    </div>
