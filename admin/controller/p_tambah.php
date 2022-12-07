<?php
session_start();
include "../../koneksi.php";
// dapatkan id_produk
$query = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'tb_produk'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);
$IDNow = $data['auto_increment'];

if (isset($_POST['submit'])) {
    $judul =   $_POST['judul'];
    $harga = $_POST['harga'];
    $dp = $_POST['dp'];
    $statusPajak =   $_POST['status_pajak'];
    $warna =   $_POST['warna'];
    $alamat =   $_POST['alamat'];
    $deskripsi =   $_POST['deskripsi'];
    $gambar = $_FILES['files'];

    $fileName = $gambar['name'];
    $fileTMP = $gambar['tmp_name'];


    // cek status gambar
    // cek error
    foreach ($gambar['error'] as $i) {
        if ($gambar['error'][$i] === 0) {
            $namaFile = [];
            $strGambar = "";
            foreach ($gambar['name'] as $nama) {
                $namaFile[] = $nama;

                // nama file gambar
                $strGambar .= "$nama|";
            }
        }
    }

    if ($namaFile == true) {
        $dirID = mkdir("images/$IDNow");
        $i = 0;
        foreach ($fileName as $nama) {
            move_uploaded_file($fileTMP[$i], "images/$IDNow/" . $nama);
            $i++;
        }
    } elseif ($namaFile == false) {
        $_SESSION['pesan_create'] = "Gambar gagal diupload!";
        header("location: ../index.php");
        exit;
    }

    $query = "INSERT INTO tb_produk VALUES ('', '$strGambar', '$judul', $harga, $dp, '$alamat', '$warna', '$statusPajak', '$deskripsi', 'dijual')";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil == true) {
        header("location: ../index.php?page=produk");
        exit;
    }
}
