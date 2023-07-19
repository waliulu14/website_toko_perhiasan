<?php
include('nav.php');
?>

<div class="slideshow">
  <div class="slideshow-wrapper">
    <div class="slide">
      <img class="slide-img" src="..\img\n1.png" />
    </div>
    <div class="slide">
      <img class="slide-img" src="..\img\n2.png" />
    </div>
    <div class="slide">
      <img class="slide-img" src="..\img\n3.png" />
    </div>
    <div class="slide">
      <img class="slide-img" src="..\img\n4.png" />
    </div>
  </div>
</div>

<!-- ------------ HALAMAN PRODUK --------  -->

<?php
require '../include/config.php';

// Query untuk mengambil data produk berdasarkan kategori "Necklace"
$query_produk = "SELECT id, nama, harga, gambar 
                 FROM produk 
                 WHERE id_kategori = (SELECT id FROM kategori WHERE nama_kategori = 'Necklace')";

$result_produk = mysqli_query($conn, $query_produk);

if (!$result_produk) {
  die("Query error: " . mysqli_error($conn));
}
?>

<div class="produk1" id="prod-1">
  <h2>THIS IS OUR NECKLACES COLLECTIONS</h2>
  <p>choose the best for you</p>
  <div class="pro-con">
    <?php while ($row = mysqli_fetch_assoc($result_produk)): ?>
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
          <a class="btn-beli"
            href="https://wa.me/6281802210343?text=Saya%20tertarik%20untuk%20membeli%20produk%20<?php echo $row['nama']; ?>">
            <i class="fas fa-shopping-cart"></i> <span class="btn-text">Beli</span>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php
include('footer.php');
?>