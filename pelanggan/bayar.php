<?php
session_start(); // Mulai session

require '../include/config.php'; // Include the file that contains database connection code


$queryDevisi = "SELECT * FROM bukti_pemesanan";
$resultDevisi = mysqli_query($conn, $queryDevisi);

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $id_pemesanan = $_POST['id_pemesanan'];


    // Periksa apakah ada file yang diunggah
    if (isset($_FILES['foto'])) {
        $file_name = $_FILES['foto']['name'];
        $file_size = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_type = $_FILES['foto']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $error_message = "Ekstensi file yang diunggah tidak diperbolehkan. Harap unggah file dengan ekstensi JPEG, JPG, atau PNG.";
        }

        if ($file_size > 2097152) {
            $error_message = "Ukuran file tidak boleh lebih dari 2MB";
        }

        if (empty($error_message) === true) {
            // Pindahkan file yang diunggah ke direktori yang ditentukan
            move_uploaded_file($file_tmp, "img/uploads/" . $file_name);

            // Query untuk memasukkan data ke dalam tabel
            $query = "INSERT INTO bukti_pemesanan (nama, id_pemesanan, foto) VALUES ('$nama', '$id_pemesanan', '$file_name')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                $success_message = "Bukti Pemesanan Berhasil Dikirim!";
            } else {
                $error_message = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    } else {
        $error_message = "Tidak ada file yang diunggah.";
    }
}
?>

<?php include 'nav.php'; ?>

<div class="container"
    style="background-color:rgb(143, 145, 148); width:1230px; height: 400px; margin-top: 30px; border-radius: 20px ">
    <h1 style="margin-top: 20px;">Konfimasi Pemesanan Anda</h1>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="id_pemesanan" class="form-label">Nomor Pesanan</label>
            <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
<br>
<br>
<br>
<br>

<?php include 'footer.php'; ?>
<script src="../scrip.js"></script>
</body>

</html>