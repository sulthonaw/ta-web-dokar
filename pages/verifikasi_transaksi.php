<div class="mt-4 d-flex align-items-center justify-content-center " style="height: 32rem">
    <div class="container w-auto">
        <div class="container w-max">
            <img src="images/referral.svg" width="200px" alt="">
        </div>
        <div class="container w-max mt-3 text-center">
            <h5>Verifikasi Transaksi</h5>
            <p class="mb-0">Masukkan kode verifikasi transaksi</p>
        </div>

        <!-- kode referral -->
        <div class="container mt-1">
            <div class="text-center">
                <b>Kode :</b> <span class="ms-3"><?= $_SESSION['referral'] ?></span>
                <br>
            </div>
            <span class="d-block my-2 text-center text-danger fw-semibold <?php if (!isset($_SESSION['pesan_transaksi'])) {
                                                                                echo " d-block ";
                                                                            } ?>" style="font-size: 13px;"><?php if (isset($_SESSION['pesan_transaksi'])) {
                                                                                                            echo $_SESSION['pesan_transaksi'];
                                                                                                        } ?></span>
            <!-- input kode referral -->
            <div class="container mt-1" style="width: max-content;">
                <form action="controller/p_transaksi.php?id=<?= $_GET['id'] ?>" method="POST">
                    <!-- name = input -->
                    <div class="input-referral input-group-sm mt-2">
                        <input name="input" class="form-control text-center" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" type="number" minlength="5" autofocus autocomplete="none">
                    </div>

                    <!-- name = submit -->
                    <button type="submit" name="submit" class="w-100 btn btn-primary d-none">Submit</button>
                </form>
            </div>
            <p class="mt-2 text-secondary" style="font-size: 14px;">Tekan <b>enter</b> untuk lanjut ke prosess selanjutnya</p>
        </div>
    </div>
</div>