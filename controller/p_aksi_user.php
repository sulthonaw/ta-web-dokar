<?php
$id = $_GET['id'];
if (isset($_POST['beli'])) {
    header("location: ../?page=transaksi&id=$id");
    exit;
}

if (isset($_POST['keranjang'])) {
    echo "Fitur belum dikembangkan";
    echo "<br>";
    echo "<a href='../?page=home'>Kembali</a>";
}
