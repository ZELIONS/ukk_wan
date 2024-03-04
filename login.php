<?php
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($data);
    $akun = mysqli_fetch_array($data);

    if ($cek < 1) {
        echo "<script>alert('No user'); location.href = 'login.php'</script>";
    }

    if ($akun['level'] === 'admin') {
        $_SESSION['user'] = $akun;
        echo '<script>location.href="index.php";</script>';
    }
    if ($akun['level'] === 'petugas') {
        $_SESSION['user'] = $akun;
        echo '<script>location.href="index.php";</script>';
    }

    $_SESSION['user'] = $akun;
    echo '<script>location.href="user/user.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="assets/img/logo2.png" sizes="64x64">
    <title>Login BooksVerse</title>
    <link href="css/login.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container py-5 h-100">
                    <div class="row d-flex align-items-center justify-content-center h-100">
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <img src="assets/img/login.png" img-fluid mt-0 ml-0" alt="Phone image" height="600px" width="600px">
                        </div>
                        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                            <form method="post">
                                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login </p>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="inputEmailAddress"> <i class="bi bi-person-circle"></i> Username</label>
                                    <input type="username" id="inputEmailAddress" class="form-control form-control-lg py-3" name="username" autocomplete="on" placeholder="enter your username" style="border-radius:25px ;" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="inputPassword"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                                    <input type="password" id="inputPassword" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="enter your password" style="border-radius:25px ;" />
                                </div>

                                <!-- Submit button -->
                                <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-1">
                                    <input type="submit" value="Login" name="login" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" />
                                </div>
                            </form>
                            <p align="center">Belum Punya Akun? <a href="register.php" class="text-warning" style="font-weight:600;text-decoration:none;">Register</a></p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>