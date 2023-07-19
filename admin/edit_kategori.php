<?php
// edit_kategori.php (halaman untuk mengedit kategori)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Periksa apakah parameter ID kategori ada
if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];

    // Ambil data kategori berdasarkan ID
    $query = "SELECT * FROM kategori WHERE id = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    // Error handling
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Periksa apakah kategori ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama_kategori = $row['nama_kategori'];
    } else {
        die("Kategori tidak ditemukan.");
    }
} else {
    die("ID kategori tidak ditemukan.");
}
?>

<?php include 'include/navbar.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="kategori.php">Data Kategori</a></li>
                <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Kategori
                </div>
                <div class="card-body">
                    <form action="proses_edit_kategori.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id_kategori; ?>">

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                value="<?php echo $nama_kategori; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>