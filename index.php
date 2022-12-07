<?php
// session_status() === PHP_SESSION_ACTIVE ?: session_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css? <?= time() ?>">
    <title>Dokar - Cari Motor Impian Mu</title>
</head>

<body>

    <!-- navigasi bar - navbar -->
    <?php
    switch (isset($_SESSION['login'])) {
        case true:
            include "pages/navbar/navbar-user.php";
            break;
        case false:
            include "pages/navbar/navbar-guest.php";
            break;
        default:
            include "pages/navbar/navbar-guest.php";
            break;
    }
    ?>

    <!-- pemisah -->
    <div class="pemisah"></div>

    <div class="container-fluid p-0">

        <?php

        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            if (isset($_SESSION['login']) == true) {
                switch ($page) {
                    case "profile":
                        include "pages/profile.php";
                        break;
                    case "verifikasi_transaksi":
                        include "pages/verifikasi_transaksi.php";
                        break;
                    case "transaksi":
                        include "pages/transaksi.php";
                        break;
                    case "form_penjualan":
                        include "pages/form_penjualan.php";
                        break;
                    case "status_transaksi":
                        include "pages/status_transaksi.php";
                        break;
                }
            }
            if (isset($_SESSION['login']) == null || $_SESSION['login'] == true) {
                switch ($page) {
                    case "home":
                        include "pages/home.php";
                        break;
                    case "detail_produk":
                        include "pages/detail_produk.php";
                        break;
                    case "daftar":
                        include "pages/daftar.php";
                        break;
                    case "login":
                        include "pages/login.php";
                        break;
                    case "pencarian":
                        include "pages/pencarian.php";
                        break;
                    default:
                        if ($page == true && empty($_SESSION['login'])) {
                            include "pages/home.php";
                            break;
                        }
                }
            }
        } else {
            include "pages/home.php";
        }

        ?>

    </div>

    <!-- footer -->

    <footer class="text-white text-lg-start mt-5 bg-primary bg-gradient">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-light" href="#">Dokar.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>