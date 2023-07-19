<?php
// riwayat.php (halaman untuk menampilkan data riwayat transaksi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data riwayat transaksi dari tabel riwayat_transaksi
$query = "SELECT * FROM riwayat_transaksi";
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
            <h1 class="mt-4">Data Riwayat Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Riwayat Transaksi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Riwayat Transaksi
                </div>
                <div class="card-body">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Transaksi</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Riwayat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['id_transaksi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['status']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['gambar']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tanggal_riwayat']; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Tidak ada data riwayat transaksi.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>