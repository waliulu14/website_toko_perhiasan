<?php
include 'nav.php';
?>

<div class="banerr">
    <img src="https://static.wixstatic.com/media/111d6f_9f73246a12c44813900e9c60d072fd2b~mv2.gif">
</div>

<!-- ------------ HALAMAN PRODUK --------  -->
<?php
require '../include/config.php';

?>


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
                            src="../admin/img/blog/<?php echo $row['gambar']; ?>">
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