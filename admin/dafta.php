<?php
// kategori.php (halaman untuk menampilkan data kategori)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data kategori dari tabel kategori
$query = "SELECT * FROM kategori";
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
            <h1 class="mt-4">Data Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Kategori</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Kategori
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <a href="tambah_kategori.php" class="btn btn-primary">Tambah</a>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
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
                                            <?php echo $row['nama_kategori']; ?>
                                        </td>
                                        <td>
                                            <a href="edit_kategori.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-primary">Edit</a>
                                            <a href="hapus_kategori.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Tidak ada data kategori.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>