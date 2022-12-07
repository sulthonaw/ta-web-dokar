<?php
session_start();
$id = $_GET['id'];
$_SESSION['referral'] = random_int(10000, 99999);
header("location: ../index.php?page=verifikasi_transaksi&id=$id");
