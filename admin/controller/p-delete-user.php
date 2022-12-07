<?php
if ($_GET['id']) {
    include "../../koneksi.php";
    $id = $_GET['id'];
    $query = "DELETE FROM tb_user WHERE id_user='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        header("location: ../index.php?page=users");
    }
}
