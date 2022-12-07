<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <div class="container border mt-4 p-0">
        <div class="bg-hero d-flex align-items-center justify-content-center">
            <div class="container" style="width: max-content;">
                <img src="images/logo.png" width="50px" alt="">
                <h3 class="text-light d-inline-block">Hello User!</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col border">
                    <h5>Profile</h5>
                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center">
                <img src="images/repair.jpg" width="400px" alt="">
            </div>
            <h5 class="text-center">Dalam Pengembangan</h5>
            <!-- button logout name: logout -->
            <div class="container mt-5">
                <div class="w-max m-auto">
                    <form action="controller/p_logout.php" method="post">
                        <button class="btn btn-primary px-5" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>