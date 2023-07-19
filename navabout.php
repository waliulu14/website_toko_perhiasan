<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'pelanggan' || !isset($_SESSION['id'])) {
        header("Location: ../login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>luxsoze</title>
    <link rel="icon" href="img\logo.png" type="image/icon type" />
    <link rel="stylesheet" href="style.css" />
    <!-- LINK CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"   />

    <!-- LINK FONT  -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Secular+One&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" />

</head>

<body>


    <section id="header">
        <a href="index.php"><img src="img\logo1.png" class="logo"></a>

        <div>

            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="necklace.php">Necklace</a></li>
                <li><a href="rings.php">Rings</a></li>
                <li><a href="bracelet.php">Bracelet</a></li>
                <li><a href="earings.php">Earings</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="bayar.php">Pembayaran</a></li>

                <li><a href="../logout.php">Logout</a></li>
                <a href="#" id="close"> <i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"> </i>

        </div>
    </section>