<body>
    <!-- carousel -->
    <div class="container-fluid">
        <div class="container p-0">
            <div id="carouselExampleControls" class="carousel slide p-0" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/carrousel/carrousel.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/carrousel/carrousel2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/carrousel/carrousel3.jpg" class="d-block w-100" alt="...">
                    </div>
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
    </div>

    <!-- kategori -->
    <div class="container-fluid bg-kategori mt-3">
        <div class="container py-4">
            <h3>Kategori</h3>
            <div class="container hidescroll" style="overflow-x: auto;">
                <div class="container" style="width: max-content;">
                    <div class="row">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="col">
                                <div class="card text-center d-inline-block my-1" style="width: 12rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Kawasaki</h5>
                                        <a href="#" class="btn btn-primary text-light">Telusuri</a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- rekomendasi -->
    <?php
    include "koneksi.php";
    $query = "SELECT * FROM tb_produk WHERE status_jual='dijual' ORDER BY id_produk DESC ";
    $hasil = mysqli_query($koneksi, $query);
    foreach ($hasil as $data) {
        $file = $data['gambar'];
        $file = rtrim($file, '|');
        $file = explode("|", $file);
        $files[] = $file;
    }

    $index = 0;
    ?>
    <div class="container mt-3 p-3 ">
        <h4>Rekomendasi untuk anda</h4>
        <div class="row">
            <?php foreach ($hasil as $data) : ?>
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
        </div>
    </div>
</body>

</html>