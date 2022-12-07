<?php
session_start();
if (isset($_POST['submit'])) {
    $id_produk = $_GET['id'];
    $id_user = $_SESSION['id_user'];
    $kode = $_POST['input'];
    $referral = $_SESSION['referral'];

    if ($kode == $referral) {
        include "../koneksi.php";
        $query = "UPDATE tb_produk SET status_jual='terjual' WHERE id_produk='$id_produk'";
        $hasil = mysqli_query($koneksi, $query);
        $_SESSION['referral'] = null;
        $_SESSION['pesan_transaksi'] = null;
        $query = "INSERT INTO tb_transaksi VALUES ('', '$id_produk', '$id_user', now(), now())";
        $hasil = mysqli_query($koneksi, $query);
        header("location: ../index.php?page=status_transaksi");
        exit;
    } else {
        $_SESSION['pesan_transaksi'] = "Kode salah! Coba sekali lagi";
        header("location: ../index.php?page=verifikasi_transaksi&id=$id");
    }
}
