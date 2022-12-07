<?php if (isset($_SESSION['pesan_daftar'])) {
    $_SESSION['pesan_daftar'] = null;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container mt-4">
        <div class="container p-3 row" style="overflow: hidden;">
            <div class="col">
                <div class="container h-100 d-flex align-items-center justify-content-center">
                    <div class="container">
                        <!-- <img src="images/daftar-vektor.jpg" height="500rem" alt=""> -->
                        <img src="images/login-vektor.jpg" height="500rem" alt="">
                        <!-- logo -->
                        <div class="container" style="margin-top: -160px; margin-left: 300px;">
                            <img src="images/logo_biru_teks.png" width="170px" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <div class="container " style="width: 28rem;">
                    <div class="container">
                        <h1>Masuk!</h1>
                        <p class="text-secondary">Masuk dan mari melakukan pesan motor impianmu.</p>
                        <div class="<?php if (!isset($_SESSION["pesan_login"])) {
                                        echo "d-none ";
                                    } ?>alert alert-danger py-2" role="alert" style="font-size: 13px;">
                            <b>Perhatian!</b>
                            <br>
                            <i><?php if (isset($_SESSION['pesan_login'])) {
                                    echo $_SESSION['pesan_login'];
                                } ?></i>
                        </div>
                        <form action="controller/p_login.php" method="POST">

                            <!-- input email, name: email -->
                            <div class="mb-3 input-group-sm">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>

                            <!-- input password, name: password -->
                            <div class="mb-3 input-group-sm">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" maxlength="8" minlength="8" required>
                            </div>

                            <!-- checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1" style="font-size: 14px;">Menyetujui peraturan dan kebijakan <span class="text-primary">Dokar</span></label>
                            </div>

                            <!-- button, name: masuk -->
                            <div class="container m-auto" style="width: 50%;">
                                <button type="submit" name="masuk" class="btn btn-primary" style="width: 100%;">Login</button>
                                <p class="text-secondary text-center mt-2" style="font-size: 13px;">Belum punya akun? <a href="?page=daftar"><b class="text-primary">Daftar</b></a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>