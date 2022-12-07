<div class="container-fluid p-0">
    <div class="container-fluid  bg-primary" style="height: 200px;"></div>
    <div class="container-fluid px-5 mb-4" style="margin-top: -170px;">
        <div class="container-fluid bg-putih bg-shadow-2 rounded p-3">
            <h3>Tambah Produk</h3>
            <hr>
            <div class="mx-auto" style="width: 80%;">
                <form action="controller/p_tambah.php" method="POST" enctype="multipart/form-data">
                    <!-- judul barang | name: judul -->
                    <label for="judul">Judul Barang</label>
                    <div class="input-group input-group-sm mb-3">
                        <input name="judul" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="20" autofocus required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- harga -->
                            <label for="">Harga</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="harga" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <!-- dp -->
                            <label for="">Dp - Uang Muka</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="dp" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- status pajak: name: status_pajak -->
                            <label for="">Status Pajak</label>
                            <div class="mt-1 ms-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_pajak" id="inlineRadio1" value="hidup" required>
                                    <label class="radio form-check-label" for="inlineRadio1">Hidup</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_pajak" id="inlineRadio2" value="mati" required>
                                    <label class="radio form-check-label" for="inlineRadio2">Mati</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- warna name: warna -->
                            <label for="">Warna</label>
                            <div class="input-group input-group-sm mb-3">
                                <input name="warna" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                    </div>

                    <!-- alamat name: alamat -->
                    <label for="">Alamat</label>
                    <div class="input-group input-group-sm mb-3">
                        <input name="alamat" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                    </div>

                    <!-- Deskripsi name: deskripsi -->
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deksripsi</label>
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>

                    <!-- gambar -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Pilih Gambar</label>
                        <input class="form-control" name="files[]" type="file" id="formFile" multiple accept="image/*" required>
                    </div>

                    <div class="mx-auto" style="width: 50%;">
                        <!-- button name: submit -->
                        <button type="submit" name="submit" class="btn btn-primary" style="width: 100%">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>