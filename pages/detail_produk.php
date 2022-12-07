<?php
if (!isset($_GET["id"])) {
    header("location: ?page=home");
    exit;
}

if (isset($_GET['id'])) {
    include "koneksi.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk WHERE id_produk='$id'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .detail-produk th {
            vertical-align: top;
        }

        .detail-produk th,
        td {
            padding: 10px;
        }
    </style>
    <title>Detail Produk</title>
</head>

<body>
    <!-- detail produk -->
    <div class="container p-0 mt-3">
        <div class="container border b-shadow w-95 p-0">
            <div class="container m-auto p-3 row">
                <div class="col-md-auto p-0">
                    <!-- carousel width kotak -->
                    <!-- images -->
                    <?php
                    $fileName = $data['gambar'];
                    $fileName = rtrim($fileName, '|');
                    $fileName = explode("|", $fileName);
                    ?>

                    <?php if (count($fileName) <= 1) : ?>
                        <img src="admin/controller/images/<?= $id ?>/<?= $fileName[0] ?>" alt="..." style="width:350px; height: 350px; object-fit: cover;">
                    <?php elseif (count($fileName) >= 1) : ?>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="height: 350px; width: 350px;">
                            <?php foreach ($fileName as $file) : ?>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="admin/controller/images/<?= $id ?>/<?= $file ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="admin/controller/images/<?= $id ?>/<?= $file ?>" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col">
                    <h3><?= $data['nama_produk'] ?></h3>
                    <table class="detail-produk">
                        <tr>
                            <th>Harga</th>
                            <td></td>
                            <td>Rp. <?= number_format($data['harga'], 2, '.') ?></td>
                        </tr>
                        <tr>
                            <th>DP</th>
                            <td></td>
                            <td>Rp. <?= number_format($data['dp'], 2, '.') ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td></td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Warna</th>
                            <td></td>
                            <td><?= $data['warna'] ?></td>
                        </tr>
                        <tr>
                            <th>Pajak</th>
                            <td></td>
                            <td><?= $data['status_pajak'] ?></td>
                        </tr>
                    </table>
                    <div class="col container" style="position: relative; bottom: -25px;">
                        <!-- form untuk proses beli -->
                        <form action="controller/p_aksi_user.php?id=<?= $id ?>" method="POST">
                            <div class="container d-flex">
                                <!-- button keranjang -->
                                <div class="container">
                                    <button type="submit" name="keranjang" class="btn btn-outline-primary " style="width: 100%;" <?php if (!isset($_SESSION['username'])) {
                                                                                                                                        echo "disabled";
                                                                                                                                    } ?>>Keranjang</button>
                                </div>
                                <!-- button beli -->
                                <div class="container">
                                    <button type="submit" name="beli" class="btn btn-outline-primary " style="width: 100%;" <?php if (!isset($_SESSION['username'])) {
                                                                                                                                echo "disabled";
                                                                                                                            } ?>>Beli</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- deskprisi -->
        <div class="container w-95 b-shadow border mt-4 p-3">
            <h3>Deskprisi</h3>
            <p><?= $data['deskripsi'] ?></p>
        </div>
        <div class="container p-0 w-95 mt-4">
            <a href="?page=home">
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"></path>
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"></path>
                    </svg>
                    Kembali
                </button>
            </a>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
</body>

</html>