<?php
// pengacak password
$pengacak = "Halo Jasin";

if (isset($_POST['daftar']) || isset($_POST['masuk'])) {
    $id_user = "";
    $email = $_POST['email'];
    $level = "user";
    if (isset($_POST['masuk'])) {
        $password = $_POST['password'];
        $passmdLogin = md5($pengacak . md5($password));
    } elseif (isset($_POST['daftar'])) {
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $passmdDaftar = md5($pengacak . md5($password1));
    }
}
