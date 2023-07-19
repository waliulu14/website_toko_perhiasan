<?php
// datauser.php (halaman untuk menampilkan data pelanggan)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data pelanggan dari tabel pelanggan
$query = "SELECT * FROM pesan";
$result = mysqli_query($conn, $query);
?>

<?php include 'include/navbar.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pesan dari Pelanggan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pesan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pesan
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan Pelanggan</th>
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
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['messenge']; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>