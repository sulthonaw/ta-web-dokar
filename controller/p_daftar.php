<?php
session_start();
include "../koneksi.php";
include "user.php";

if (isset($_POST['daftar'])) {
    // cek kesamaan username
    $query = "SELECT * FROM tb_user WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
    if ($data == null) {
        // cek kesamaan password
        if ($password1 == $password2) {
            $query = "INSERT INTO tb_user VALUES ('', '$email', '$username', '$passmdDaftar', '$level')";
            $hasil = mysqli_query($koneksi, $query);
            if ($hasil) {
                header("Location: ../index.php?page=login");
            } else {
                $_SESSION['pesan_daftar'] = "Gagal didaftarkan";
                header("Location: ../?page=daftar");
            }
        } else {
            $_SESSION['pesan_daftar'] = "Password tidak sama dengan yang dimasukkan";
            header("Location: ../?page=daftar");
        }
    } else {
        $_SESSION['pesan_daftar'] = "Email pernah dibuat!";
        header("Location: ../?page=daftar");
    }
}
