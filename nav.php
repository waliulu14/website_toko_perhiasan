<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['level'] === 'pelanggan' && isset($_SESSION['id'])) {
    header("Location: http://localhost/41202121/pelanggan/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>luxsoze</title>
    <link rel="icon" href="img\logo_title.png" type="image/icon type" />
    <link rel="stylesheet" href="style.css" />
    <!-- LINK CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"   />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@700&family=Sacramento&family=Spectral+SC:wght@500&display=swap"
        rel="stylesheet">


    <!-- LINK FONT  -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Secular+One&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- <section id="header">
        <a href="index.php"><img src="img\logo1.png" class="logo"></a> -->

    <div>

        <!-- <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="login.php">Login</a></li>
                <a href="#" id="close"> <i class="far fa-times"></i></a>
            </ul> -->
    </div>
    <div id="mobile">
        <i id="bar" class="fas fa-outdent"> </i>

    </div>
    </section>