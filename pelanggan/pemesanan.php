<?php
require '../include/config.php';

// Ambil data pemesanan dari tabel pemesanan dengan informasi nama pelanggan
$query = "SELECT pemesanan.id, pelanggan.nama, pemesanan.id_produk, pemesanan.jumlah, pemesanan.tanggal_pemesanan FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id";
$result = mysqli_query($conn, $query);

// Error handling
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

// Fungsi hapus pemesanan
if (isset($_GET['hapus_id'])) {
    $hapusId = $_GET['hapus_id'];
    $hapusQuery = "DELETE FROM pemesanan WHERE id = $hapusId";
    $hapusResult = mysqli_query($conn, $hapusQuery);

    if ($hapusResult) {
        header('Location: pemesanan.php');
        exit();
    } else {
        die("Terjadi kesalahan saat menghapus data pemesanan: " . mysqli_error($conn));
    }
}
?>

<?php include 'nav.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pemesanan</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pemesanan
                </div>
                <div class="card-body">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>ID Produk</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['id_produk']; ?></td>
                                        <td><?php echo $row['jumlah']; ?></td>
                                        <td><?php echo $row['tanggal_pemesanan']; ?></td>
                                        <td>
                                            <a href="pemesanan.php?hapus_id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Tidak ada data pemesanan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>
