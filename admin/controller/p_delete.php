<?php
session_start();
if (!isset($_GET['id'])) {
    header("location: ../index.php?page=produk");
    exit;
}

if (isset($_GET['id'])) {
    include "../../koneksi.php";
    $id = $_GET['id'];
    $dir = "images/$id";
    $query = "DELETE FROM tb_produk WHERE id_produk='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        $_SESSION['pesan_hapus'] = "Data terhapus";
        array_map('unlink', glob("$dir/*.*"));
        rmdir($dir);
        header("location: ../index.php?page=produk");
    }
}
