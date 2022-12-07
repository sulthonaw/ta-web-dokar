<?php
session_start();
if (!isset($_SESSION['login_admin'])) {
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css? <?= time() ?>">
    <title>Admin</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="b-shadow">
            <div class="sidebar-header">
                <h3>Hello Admin</h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="?page=dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="?page=produk">Manage Produk</a>
                </li>
                <li>
                    <a href="?page=users">Manage Users</a>
                </li>
                <li>
                    <a href="?page=transaksi">Manage Transaksi</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="bg-buram">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <form action="controller/p_logout.php" method="POST">
                        <!-- button name: logout -->
                        <button type="submit" name="logout" class="btn btn-danger">
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </nav>

            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'dashboard':
                        include "pages/dashboard.php";
                        break;
                    case 'produk':
                        include "pages/manage-produk.php";
                        break;
                    case 'tambah':
                        include "pages/tambah_produk.php";
                        break;
                    case 'detail':
                        include "pages/detail_produk.php";
                        break;
                    case 'users':
                        include "pages/manage-users.php";
                        break;
                    case 'transaksi':
                        include "pages/manage-transaksi.php";
                        break;
                    case 'edit':
                        include "pages/edit_produk.php";
                        break;
                    default:
                        include "pages/dashboard.php";
                        break;
                }
            } else {
                include "pages/dashboard.php";
            }
            ?>
        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>