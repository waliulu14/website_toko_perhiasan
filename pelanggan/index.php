
<?php include 'nav.php'; ?>


<div class="baner"></div>


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
        <?php
        $counter = 0; // Variabel counter untuk menghitung jumlah produk
        while ($row = mysqli_fetch_assoc($result_produk)):
            if ($counter >= 12) {
                break; // Hentikan penampilan setelah mencapai 12 produk
            }
            ?>
            <div class="pro">
                <img src="../admin/<?php echo $row['gambar']; ?>">
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
            <?php
            $counter++; // Tingkatkan nilai counter setiap kali produk ditampilkan
        endwhile;
        ?>
    </div>
</div>
<div class="baner1" id="dev-p2">
    <h6>We Know What You Need</h6>
    <h4>EXPLORE AND ENJOY YOUR SHOPPING</h4>

</div>

<div class="model">
    <div class="model-1">
        <img src="https://i.pinimg.com/564x/2a/68/49/2a6849a14e58e1c36a85aef73b595918.jpg">
        <div class="model-1-ket">
            <h2>Our Bestseller This Year</h2>
            <p>The choice is yours, we can ensure the best we give to you.</p>
        </div>
    </div>
</div>


<?php

include('footer.php');
?>