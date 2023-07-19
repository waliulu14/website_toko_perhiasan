<?php
// produk.php (halaman untuk menampilkan data produk)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data produk dari tabel produk
$query = "SELECT * FROM bukti_pemesanan";
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
            <h1 class="mt-4">Bukti Pemesanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Bukti Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bukti Pemesanan
                </div>
                <div class="card-body">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Nomor Pemesanan</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['id_pemesanan']; ?>
                                        </td>
                                        <td><img src="../pelanggan/img/uploads/<?php echo $row['foto']; ?>" alt="Gambar Blog"
                                                style="max-width: 100px; height: auto;"></td>
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