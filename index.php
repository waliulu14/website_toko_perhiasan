<?php
include 'nav.php';
?>

<div class="banerr">
    <img src="https://static.wixstatic.com/media/111d6f_9f73246a12c44813900e9c60d072fd2b~mv2.gif">
    <div class="centered">
        <h1>WELCOME LUXSOZERS</h1>
        <button class="login-button"><a href="login.php">LOGIN</a></button>
    </div>
</div>

<!-- ------------ HALAMAN PRODUK --------  -->
<?php
require 'include/config.php';

// Query untuk mengambil data produk
$query_produk = "SELECT nama, harga, gambar FROM produk";
$result_produk = mysqli_query($conn, $query_produk);

if (!$result_produk) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!-- ------------ HALAMAN PRODUK --------  -->
<div class="produk1" id="prod-1">
    <h2 style="font-size:40px; font-weight=bold">OUR NEW PRODUCT</h2>
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
                <img src="admin/<?php echo $row['gambar']; ?>">
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
        <!-- <img src="https://i.pinimg.com/564x/2a/68/49/2a6849a14e58e1c36a85aef73b595918.jpg"> -->
        <div class="model-1-ket">
            <h2>Our Bestseller This Year</h2>
            <p>The choice is yours, we can ensure the best we give to you.</p>
        </div>
        <img src="https://i.pinimg.com/564x/2a/68/49/2a6849a14e58e1c36a85aef73b595918.jpg">
    </div>
</div>


<?php

$query = "SELECT * FROM blog";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>




<div id="layoutSidenav_content">
    <main>
        <!-- <div class="container-fluid px-4"> -->
        <div class="page-header">
            <h2 style="font-weight: 20px;">YOU MUST KNOW</h2>
        </div>

        <section class="blog" style="background-color: #a1a0a084;}">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="blog-box" style="background-color:#e8e5e5; margin-bottom:30px; width:1200px;margin-left:50px;">
                    <div class="blog-img" style="height:350px; padding-bottom:0px; width:560px; ">
                        <img style="width:80%; height:300px; padding-left:50px; position:centered; padding-top:20pxpx; margin-top: 20px; padding-bottom:0px"
                            src="admin/img/blog/<?php echo $row['gambar']; ?>">
                    </div>
                    <div class="blog-details">
                        <h4>
                            <?php echo $row['judul']; ?>
                        </h4>
                        <p>
                            <?php echo $row['konten']; ?>
                        </p>
                        <a href="<?php echo $row['link']; ?>" style="color:#ef5a5a">Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
</div>
</main>


</div>

<?php
include 'footer.php';
?>