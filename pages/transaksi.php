<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "SELECT * FROM tb_produk WHERE id_produk='$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);
$_SESSION['pesan_transaksi'] = null;
// gambar
$fileGambar = $data['gambar'];
$fileGambar = rtrim($fileGambar, "|");
$fileGambar = explode("|", $fileGambar);
?>

<div class="container mt-4">
    <h1>Transaksi</h1>
    <hr>

    <!-- detail motor -->
    <div class="container border b-shadow w-95">
        <div class="container mt-2 py-3">
            <h5>Motor yang dipesan</h5>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-4 p-1">
                        <div class="container p-0" style="width: 250px; height: 250px; overflow: hidden;">
                            <img src="admin/controller/images/<?= $id ?>/<?= $fileGambar[0] ?>" alt="" class="transaksi-img">
                        </div>
                    </div>
                    <div class="col">
                        <h6><?= $data['nama_produk'] ?></h6>
                        <table class="table">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pembayaran -->
    <div class="container mt-4 py-3 border b-shadow w-95">
        <div class="container mt-2 py-3">
            <h5>Biaya</h5>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="container d-flex align-items-center justify-content-center" style="height: 100%;">
                            <img src="images/payment.svg" width="200px" alt="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="container p-0">
                            <table class="table">
                                <tr>
                                    <td>Dp</td>
                                    <td class="text-end">Rp. <?= number_format($data['dp'], 2, '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td class="text-end">Rp. 2,000.00</td>
                                </tr>
                                <tr style="border-color: white;">
                                    <th>Total</th>
                                    <td class="text-end">Rp. <?= number_format($data['dp'] + 2000, 2, '.') ?></td>
                                </tr>
                            </table>

                            <!-- button name = bayar -->
                            <form action="controller/p_referral.php?id=<?= $id ?>" method="POST">
                                <button class="btn btn-danger w-100" name="bayar">Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>