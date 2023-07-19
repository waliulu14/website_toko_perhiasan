<?php
require '../include/config.php';

// Query untuk mengambil data produk
$query_produk = "SELECT nama, harga, gambar FROM produk";
$result_produk = mysqli_query($conn, $query_produk);

if (!$result_produk) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!-- ------------ HALAMAN PRODUK --------  -->
<div class="produk1" id="prod-1">
    <h2>OUR NEW PRODUCT</h2>
    <p>exclusive for you</p>
    <div class="pro-con">
        <?php while ($row = mysqli_fetch_assoc($result_produk)): ?>
            <div class="pro">
                <img src="<?php echo $row['gambar']; ?>">
                <div class="des">
                    <span>
                        <?php echo $row['nama']; ?>
                    </span>
                    <h5>
                        <?php echo $row['nama']; ?>
                    </h5>
                    <div class="start">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp.
                        <?php echo $row['harga']; ?>
                    </h4>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>