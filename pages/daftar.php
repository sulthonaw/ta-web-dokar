<?php if (isset($_SESSION['pesan_login'])) {
    $_SESSION['pesan_login'] = null;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>

<body>
    <!-- daftar -->
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="container h-100 d-flex align-items-center justify-content-center">
                    <img src="images/daftar-vektor.jpg" height="500rem" alt="">
                </div>
            </div>
            <!-- form -->
            <div class="col d-flex align-items-center justify-content-center">
                <div class="container" style="width: 27rem;">
                    <h1>Buat akunmu!</h1>
                    <p class="text-secondary">Buat akun untuk menikmati fitur selanjutnya.</p>
                    <div class="<?php if (!isset($_SESSION["pesan_daftar"])) {
                                    echo "d-none ";
                                } ?>alert alert-danger py-2" role="alert" style="font-size: 13px;">
                        <b>Perhatian!</b>
                        <br>
                        <i><?php if (isset($_SESSION['pesan_daftar'])) {
                                echo $_SESSION['pesan_daftar'];
                            } ?></i>
                    </div>
                    <form action="controller/p_daftar.php" method="POST">
                        <!-- input email ==> name : email -->
                        <div class="mb-3 input-group-sm">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <!-- input email ==> name : username -->
                        <div class="mb-3 input-group-sm">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <!-- input email ==> name : password1 -->
                        <div class="mb-3 input-group-sm">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password1" class="form-control" id="exampleInputPassword1" maxlength="8" minlength="8" required>
                        </div>

                        <!-- input email ==> name : password2 -->
                        <div class="mb-3 input-group-sm">
                            <label for="exampleInputPassword1" class="form-label">Ulangi Password</label>
                            <input type="password" name="password2" class="form-control" id="exampleInputPassword1" maxlength="8" minlength="8" required>
                        </div>

                        <!-- check button -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1" style="font-size: 14px;">Menyetujui peraturan dan kebijakan <span class="text-primary">Dokar</span></label>
                        </div>

                        <!-- button submit name : daftar -->
                        <div class="container m-auto" style="width: 50%;">
                            <button type="submit" name="daftar" class="btn btn-primary" style="width: 100%;">Daftar</button>
                            <p class="text-secondary text-center mt-2" style="font-size: 13px;">Sudah punya akun? <a href="?page=login"><b class="text-primary">Masuk</b></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>