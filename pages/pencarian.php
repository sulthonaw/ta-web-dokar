<?php
if (isset($_GET['find'])) {
    include "koneksi.php";
    $find = $_GET['find'];
    $query = "SELECT * FROM tb_produk WHERE nama_produk LIKE '$find%'";
    $hasil = mysqli_query($koneksi, $query);
} else {
    header("location: index.php");
}
?>

<div class="container mt-4 py-2">
    <div class="container overflow-visible">
        <h5>Pencarian terkait : </h5>
        <p style=""><i class="text-primary"><?= $_GET['find'] ?></i></p>
    </div>
    <div class="container" style="width: max-content;">
        <?php if (mysqli_num_rows($hasil) > 0) : ?>
            <?php
            foreach ($hasil as $data) {
                $file = $data['gambar'];
                $file = rtrim($file, '|');
                $file = explode("|", $file);
                $files[] = $file;
            }
            $index = 0;
            foreach ($hasil as $data) :
            ?>
                <div class="col">
                    <div class="mx-auto" style="width: max-content;">
                        <!-- card produk -->
                        <div class="card card-produk" style="object-fit: cover;">
                            <a class="tawaran" href="?page=detail_produk&id=<?= $data['id_produk'] ?>">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="admin/controller/images/<?= $data['id_produk'] ?>/<?= $files[$index][0] ?>" class="card-img-top" alt="..." style="width: 14.8rem; height: 159px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <h6>Rp. <?= number_format($data['harga'], 2, '.') ?></h6>
                                        <p class="mb-0" style="font-size: 14px;"><?= $data['nama_produk'] ?></p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted text-center" style="font-size: 12px;">
                                    fitur date = null
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                $index++;
            endforeach;
            ?>
        <?php else : ?>
            <div class="container w-auto">
                <img src="images/not-found-data.jpg" height="390px" alt="">
                <p class="fw-bold text-center text-danger"><i>Produk tidak ada!</i></p>
            </div>
        <?php endif ?>
    </div>
</div>