<?php
include "../koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: index.php?page=produk");
}
$query = "SELECT * FROM tb_produk WHERE id_produk=$id";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

// foreach nama file gambar
$fileName = $data['gambar'];
$fileName = rtrim($fileName, "|");
$fileName = explode("|", $fileName);
foreach ($fileName as $name) {
    $files[] = $name;
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
    <div class="container-fluid p-0 mt-3">
        <div class="bg-putih bg-shadow-2 container-fluid border m-auto p-4 row">
            <div class="col-md-auto p-0">
                <!-- carousel width kotak -->
                <div id="carouselExampleControls" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="height: 350px; width: 350px;">
                    <div class="carousel-inner">
                        <?php foreach ($files as $file) : ?>
                            <div class="carousel-item active">
                                <img src="controller/images/<?= $id ?>/<?= $file ?>" class="d-block w-100" alt="<?= $files[0] ?>" style="width:350px; height: 350px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="controller/images/<?= $id ?>/<?= $file ?>" class="d-block w-100" style="width:350px; height: 350px; object-fit: cover;" alt="<?= $file ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col">
                <h3><?= $data['nama_produk'] ?></h3>
                <table class="detail-produk">
                    <tr>
                        <th>Harga</th>
                        <td></td>
                        <td>Rp. <?= $data['harga'] ?></td>
                    </tr>
                    <tr>
                        <th>DP</th>
                        <td></td>
                        <td>Rp. <?= $data['dp'] ?></td>
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
                    <tr>
                        <th>Jumlah Img</th>
                        <td></td>
                        <td><?= count($files) ?></td>
                    </tr>
                    <tr>
                        <th>Status Jual</th>
                        <td></td>
                        <td><?= $data['status_jual'] ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <!-- deskprisi -->
    <div class="bg-putih bg-shadow-2 container-fluid border mt-4 p-3">
        <h3>Deskprisi</h3>
        <p><?= $data['deskripsi'] ?></p>
    </div>


    <!-- button to edit or delete -->
    <div class="aksi d-flex">
        <!-- edit -->
        <div class="m-2">
            <a href="?page=edit&id=<?= $id ?>">
                <div class="btn btn-outline-secondary btn-aksi d-flex align-items-center justify-content-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        <!-- delete -->
        <div class="m-2">
            <a href="controller/p_delete.php?id=<?= $id ?>" onclick="confirm('Apakah anda yakin ingin menghapus produk ini?')">
                <div class="btn btn-outline-secondary btn-aksi d-flex align-items-center justify-content-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>