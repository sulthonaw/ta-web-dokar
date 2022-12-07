<?php
session_start();
include "../koneksi.php";
require "user.php";

// cek username 
if (isset($_POST['masuk'])) {
    $query = "SELECT * FROM tb_user WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
    if ($data['email'] == $email) {
        if ($passmdLogin == $data['password']) {
            $_SESSION['username'] = $data['username'];
            if (isset($_SESSION['username']) == $data['username'] && $data['level'] == "user") {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $data['id_user'];
                header("location: ../index.php");
            } elseif (isset($_SESSION['username']) == $data['username'] && $data['level'] == "admin") {
                $_SESSION['login_admin'] = true;
                header('location: ../admin');
            }
        } else {
            $_SESSION['pesan_login'] = "Password salah!";
            header("location: ../?page=login");
        }
    } else {
        $_SESSION['pesan_login'] = "Email belum terdaftar!";
        header("location: ../?page=login");
    }
}
