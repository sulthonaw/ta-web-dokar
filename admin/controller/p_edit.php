<?php
if (isset($_POST['submit'])) {
    include "../../koneksi.php";

    $id = $_POST["id"];
    $statusJual = $_POST['status_jual'];
    $judul =  $_POST['judul'];
    $harga = $_POST['harga'];
    $dp = $_POST['dp'];
    $statusPajak =  $_POST['status_pajak'];
    $warna =  $_POST['warna'];
    $alamat =  $_POST['alamat'];
    $deskripsi =  $_POST['deskripsi'];
    $gambar = $_FILES['files'];

    $query = "UPDATE tb_produk SET nama_produk='$judul', harga='$harga', dp='$dp', status_pajak='$statusPajak', warna='$warna', alamat='$alamat', deskripsi='$deskripsi', status_jual='$statusJual' WHERE id_produk='$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($gambar['name'][0] == !null) {
        $strGambar = "";
        foreach ($gambar['name'] as $nama) {
            $namaFile[] = $nama;

            // nama file gambar
            $strGambar .= "$nama|";
        }

        if ($namaFile == true) {
            $dir = "images/$id";
            array_map('unlink', glob("$dir/*.*"));
            $i = 0;
            foreach ($gambar['name'] as $nama) {
                move_uploaded_file($gambar['tmp_name'][$i], "$dir/" . $nama);
                $i++;
            }
        }

        $query = "UPDATE tb_produk SET gambar='$strGambar' WHERE id_produk='$id'";
        $hasil = mysqli_query($koneksi, $query);
    }

    if ($hasil) {
        header("location: ../index.php?page=detail&id=$id");
        exit;
    } else {
        echo "BOOM! ERROR UPDATE!";
    }
}
