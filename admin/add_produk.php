<?php
// add_produk.php (halaman untuk menambahkan produk baru)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel
$id_kategori = '';
$nama_produk = '';
$harga_produk = '';
$gambar_produk = '';

// Ambil data kategori dari tabel kategori
$query_kategori = "SELECT * FROM kategori";
$result_kategori = mysqli_query($conn, $query_kategori);

// Error handling
if (!$result_kategori) {
    die("Query error: " . mysqli_error($conn));
}

// Error handling
$errors = array();

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui form
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];

    // Validasi data
    if (empty($id_kategori)) {
        $errors[] = 'ID Kategori harus diisi.';
    }

    if (empty($nama_produk)) {
        $errors[] = 'Nama Produk harus diisi.';
    }

    if (empty($harga_produk)) {
        $errors[] = 'Harga Produk harus diisi.';
    }

    // Upload gambar
    if (!empty($_FILES['gambar_produk']['name'])) {
        $gambar_produk = $_FILES['gambar_produk']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi tipe gambar
        $allowed_types = array('jpg', 'jpeg', 'png');
        if (!in_array($imageFileType, $allowed_types)) {
            $errors[] = 'Tipe file gambar tidak valid. Hanya diperbolehkan file JPG, JPEG, dan PNG.';
        }

        // Upload gambar jika tidak ada error
        if (empty($errors)) {
            if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $target_file)) {
                // Query tambah produk ke dalam tabel
                $query = "INSERT INTO produk (id_kategori, nama, harga, gambar) VALUES ('$id_kategori', '$nama_produk', '$harga_produk', '$target_file')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // Redirect ke halaman produk setelah berhasil menambahkan produk
                    header('Location: data_produk.php');
                    exit();
                } else {
                    $errors[] = 'Terjadi kesalahan. Gagal menambahkan produk.';
                }
            } else {
                $errors[] = 'Terjadi kesalahan saat mengunggah gambar.';
            }
        }
    } else {
        $errors[] = 'Gambar Produk harus diunggah.';
    }
}
?>

<?php include 'include/navbar.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="produk.php">Data Produk</a></li>
                <li class``` <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Produk
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
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">ID Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                <?php while ($row_kategori = mysqli_fetch_assoc($result_kategori)): ?>
                                    <option value="<?php echo $row_kategori['id']; ?>"><?php echo $row_kategori['nama_kategori']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="<?php echo $nama_produk; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <input type="text" class="form-control" id="harga_produk" name="harga_produk"
                                value="<?php echo $harga_produk; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>
</div>