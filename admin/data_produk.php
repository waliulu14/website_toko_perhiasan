<?php
// produk.php (halaman untuk menampilkan data produk)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data produk dari tabel produk
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);

// Error handling
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php include 'include/navbar.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Produk</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Produk
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="add_produk.php" class="btn btn-primary">Tambah Data Produk</a>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Kategori</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['id_kategori']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['harga']; ?>
                                        </td>
                                        <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar Produk"
                                                style="max-width: 100px; height: auto;"></td>
                                        <td>
                                            <a href="edit_produk.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-primary">Edit</a>
                                            <a href="hapus_produk.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Tidak ada data produk.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>