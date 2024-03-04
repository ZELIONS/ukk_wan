<?php
    include"koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register BooksVerse</title>
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
                                <img src="assets/img/signup.png"img-fluid mt-0 ml-0" alt="Phone image" height="600px" width="600px" >
                            </div>
                            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                <?php
                                if(isset($_POST['register'])) {
                                    $nama = $_POST['nama'];
                                    $email = $_POST['email'];
                                    $alamat = $_POST['alamat'];
                                    $username = $_POST['username'];
                                    $level = $_POST['level'];
                                    $password = md5($_POST['password']);
                                   
                                    $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,username,password,level) VALUES('$nama','$email','$alamat','$username','$password','$level')");

                                    if($insert){
                                        echo '<script>alert("Register Berhasil"); location.href="login.php"</script>';
                                    }else{
                                        echo '<script>alert("Register Gagal")</script>';
                                    }
                                }
                                ?>
                                <form method="post">
                                    <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Register</p>
                                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label"> <i class="bi bi-person-circle"></i>Nama Lengkap</label>
                                        <input type="text"  class="form-control form-control-lg py-3" name="nama" autocomplete="off" placeholder="Masukkan Nama" style="border-radius:25px ;" />
                                    </div>
                                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label"> <i class="bi bi-person-circle"></i>Email</label>
                                        <input type="text"  class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="Masukkan Email" style="border-radius:25px ;" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label"> <i class="bi bi-person-circle"></i> Alamat</label>
                                        <textarea name="alamat" class="form-control form-control-lg py-3" placeholder="Masukkan Alamat" style="border-radius: 25px;"></textarea>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="inputEmailAddress"> <i class="bi bi-person-circle"></i> Username</label>
                                        <input type="username" id="inputEmailAddress" class="form-control form-control-lg py-3" name="username" autocomplete="off" placeholder="Masukkan Username" style="border-radius:25px ;" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="inputPassword"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                                        <input type="password" id="inputPassword" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="Masukkan Password" style="border-radius:25px ;" />
                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1">Level</label>
                                        <select name="level" class="form-select py-1">
                                            <option value="peminjam">Peminjam</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <!-- Submit button -->
                                    <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-1">
                                    <input type="submit" value="Register" name="register" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" /></div>
                                </form>
                            <p align="center">Sudah Punya Akun? <a href="login.php" class="text-warning" style="font-weight:600;text-decoration:none;">Login</a></p>
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
