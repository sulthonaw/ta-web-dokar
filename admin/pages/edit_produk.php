<?php
if (!isset($_GET['id'])) {
    header("location: index.php?page=produk");
    exit;
}
if (isset($_GET['id'])) {
    include "../koneksi.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk WHERE id_produk='$id'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
    $status_pajak = $data['status_pajak'];
}
?>
<div class="container-fluid p-0">
    <div class="container-fluid  bg-primary" style="height: 200px;"></div>
    <div class="container-fluid px-5 mb-4" style="margin-top: -170px;">
        <div class="container-fluid bg-putih bg-shadow-2 rounded p-3">
            <h3>Edit Produk</h3>
            <hr>
            <div class="mx-auto" style="width: 80%;">
                <form action="controller/p_edit.php" method="POST" enctype="multipart/form-data">
                    <label for="id">ID :</label>
                    <div class="d-inline-block" style="width: 100px;">
                        <div class="input-group input-group-sm mb-3">
                            <input type="number" id="id" name="id" class="form-control" value="<?= $_GET['id'] ?>" readonly>
                        </div>
                    </div>

                    <!-- status jual -->
                    <div class="col">
                        <!-- status pajak: name: status_pajak -->
                        <label for="">Status Jual</label>
                        <div class="mt-1 ms-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_jual" id="inlineRadio1" value="terjual" <?php if ($data['status_jual'] == "terjual") {
                                                                                                                                        echo " checked ";
                                                                                                                                    } ?> required>
                                <label class="radio form-check-label" for="inlineRadio1">Terjual</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_jual" id="inlineRadio2" value="dijual" <?php if ($data['status_jual'] == "dijual") {
                                                                                                                                        echo " checked ";
                                                                                                                                    } ?> required>
                                <label class="radio form-check-label" for="inlineRadio2">Dijual</label>
                            </div>
                        </div>
                    </div>



                    <!-- judul barang | name: judul -->
                    <div class="d-block">
                        <label for="judul">Judul Barang</label>
                        <div class="input-group input-group-sm mb-3">
                            <input name="judul" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="20" autofocus required value="<?= $data['nama_produk'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- harga -->
                            <label for="">Harga</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="harga" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $data['harga'] ?>">
                            </div>
                        </div>
                        <div class="col-5">
                            <!-- dp -->
                            <label for="">Dp - Uang Muka</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="dp" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $data['dp'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- status pajak: name: status_pajak -->
                            <label for="">Status Pajak</label>
                            <div class="mt-1 ms-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_pajak" id="inlineRadio1" value="hidup" <?php if ($status_pajak == "hidup") {
                                                                                                                                            echo " checked ";
                                                                                                                                        } ?> required>
                                    <label class="radio form-check-label" for="inlineRadio1">Hidup</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_pajak" id="inlineRadio2" value="mati" <?php if ($status_pajak == "mati") {
                                                                                                                                        echo " checked ";
                                                                                                                                    } ?> required>
                                    <label class="radio form-check-label" for="inlineRadio2">Mati</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- warna name: warna -->
                            <label for="">Warna</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="warna" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $data['warna'] ?>">
                            </div>
                        </div>
                    </div>

                    <!-- alamat name: alamat -->
                    <label for="">Alamat</label>
                    <div class="input-group input-group-sm mb-3">
                        <input name="alamat" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required value="<?= $data['alamat'] ?>">
                    </div>

                    <!-- Deskripsi name: deskripsi -->
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deksripsi</label>
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $data['deskripsi'] ?></textarea>
                    </div>

                    <!-- gambar -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Pilih Gambar</label>
                        <input class="form-control" name="files[]" type="file" id="formFile" multiple accept="image/*">
                    </div>

                    <div class="mx-auto" style="width: 50%;">
                        <!-- button name: submit -->
                        <button type="submit" name="submit" class="btn btn-secondary" style="width: 100%">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>