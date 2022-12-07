<?php
include "../koneksi.php";
$query = "SELECT * FROM tb_produk ORDER BY id_produk DESC";
$hasil = mysqli_query($koneksi, $query);
$jumlahData = mysqli_num_rows($hasil);
?>
<div class="container-fluid p-0">
    <div class="container-fluid p-0 bg-primary" style="height: 200px;">
    </div>
    <div class="container-fluid px-5 mb-4" style="margin-top: -170px;">
        <div class="container-fluid bg-putih bg-shadow-2 rounded p-3">
            <h4 class="text-center">Manage Produk</h4>
            <hr>
            <!-- jumlah produk -->
            <div class="row px-4">
                <div class="col-4 card border bg-light border-1">
                    <div class="card-body p-2">
                        <span>
                            <div class="text-danger fw-bold" style="font-size: 12px;">Info!</div>
                            <span class="lh-lg " style="font-size: 16px;"><?= $jumlahData ?> Produk</span>
                        </span>
                        <div class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- button tambah produk -->
                <a href="?page=tambah" class="col text-decoration-none">
                    <div class="card hov border- bg-light border-1">
                        <div class="card-body p-3">
                            <span class="lh-lg ">Tambah Produk</span>
                            <div class="float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- pesan -->
            <div class="container mt-3">
                <div class="<?php if (!isset($_SESSION['pesan_hapus'])) {
                                echo "d-none ";
                            } ?> alert alert-danger py-2" role="alert">
                    <div class="fw-semibold" style="font-size: 12px">Perhatian!</div>
                    <span style="font-size: 14px;">
                        <?php if (isset($_SESSION['pesan_hapus'])) {
                            echo $_SESSION['pesan_hapus'];
                        } ?>
                    </span>
                </div>
            </div>
            <?php if (isset($_SESSION['pesan_hapus'])) {
                sleep(2);
                $_SESSION['pesan_hapus'] = null;
            } ?>
            <!-- list produk -->
            <div class="container-fluid mt-3">
                <table class="table align-middle">
                    <tr>
                        <th>No</th>
                        <th>
                            Gambar
                        </th>
                        <th>
                            Judul Motor
                        </th>
                        <th>Status</th>
                        <th colspan="3" class="text-center">
                            aksi
                        </th>
                    </tr>
                    <?php

                    $i = 1;
                    $j = 0;
                    foreach ($hasil as $data) {
                        $fileName = $data['gambar'];
                        $fileName = rtrim($fileName, "|");
                        $fileName = explode("|", $fileName);
                        $files[] = $fileName;
                    }
                    foreach ($hasil as $data) :
                    ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <?php $dirName = $data['id_produk'] . "/" . $files[$j][0] ?>
                                <?php $j++  ?>
                                <img src="controller/images/<?= $dirName ?>" class="rounded" width="90px" height="90px" alt="motor.jpg" style="object-fit: cover;">
                            </td>
                            <td>
                                <?= $data['nama_produk'] ?>
                            </td>
                            <td>
                                <?= $data['status_jual'] ?>
                            </td>
                            <td class="text-center" style="width: 90px;">
                                <a class="text-primary" href="?page=detail&id=<?= $data['id_produk'] ?>">Detail</a>
                            </td>
                            <td class="text-center" style="width: 90px;">
                                <a class="text-primary" href="?page=edit&id=<?= $data['id_produk'] ?>">Edit</a>
                            </td>
                            <td class="text-center" style="width: 90px;">
                                <a class="text-primary" href="controller/p_delete.php?id=<?= $data['id_produk'] ?>" onclick="return confirm('Ingin menghapus data produk ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>

</div>