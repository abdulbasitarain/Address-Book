<?php
session_start();
include "./admin/data.php";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="log2.png">
    <title>Address Book</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <!-- <li><span class="icon_search search-switch"></span></li> -->
            <li><a href="./cart.php"><span class="fa fa-shopping-basket"></span>
                    <div class="tip">
                        <?php
                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                        $query = "SELECT * FROM cart WHERE ipaddress = '$ipaddress'";
                        $result = mysqli_query($con, $query);
                        echo mysqli_num_rows($result);
                        ?>
                    </div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="log1.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <?php
            if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != 0) {
            ?>
                <a href="admin/acategory.php"> Hello <?= $_SESSION["user_name"] ?></a>
                <a href="./logout.php"> Logout</a>

            <?php } else { ?>

                <a href="./login.php">Signin</a>
                <a href="./signup.php">Signup</a>

            <?php } ?>
            
        </div>
    </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="log1.png"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a>
                            </li>
                            <li><a href="./contact.php">Contact</a></li>
                            <li><a href="./about.php">About</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">

                        <div class="header__right__auth">

                            <?php
                            if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != 0) {
                            ?>
                                <a href=""> Hello <?= $_SESSION["user_name"] ?></a>
                                <a href="./logout.php"> Logout</a>

                            <?php } else { ?>

                                <a href="./login.php">Signin</a>
                                <a href="./signup.php">Signup</a>

                            <?php } ?>



                        </div>

                        <ul class="header__right__widget">
                            <li><a href="./cart.php"><span class="fa fa-shopping-basket"></span>
                                    <div class="tip">
                                        <?php
                                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                                        $query = "SELECT * FROM cart WHERE ipaddress = '$ipaddress'";
                                        $result = mysqli_query($con, $query);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Header Section End -->