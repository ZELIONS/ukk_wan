<!-- if (isset($_POST['login'])) {
$username = $_POST['username'];
$password = md5($_POST['password']);
$data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
$role = mysqli_fetch_array($data);
if ($cek > 0) {
if ($role['level'] === "admin") {
$_SESSION['user'] = mysqli_fetch_array($data);
echo '<script>
    alert("Login Berhasil");
    location.href = "index.php";
</script>';
}
else{
$_SESSION['user'] = mysqli_fetch_array($data);
echo '<script>
    alert("Login Berhasil");
    location.href = "user.php";
</script>';
}
} else {
echo '<script>
    alert("Username Atau Password Anda Salah")
</script>';
}
};

card Buku

<div class="row py-5">

    <?php while ($buku = mysqli_fetch_assoc($query)) { ?>
        <div class='col-lg-3'>
            <div class='card border-0'>
                <img src='../assets/img/<?php echo $buku['gambar']; ?>' class='mb-3' alt=''>
                <div class='konten-buku'>
                    <p class='mb-3 text-secondary'><?php echo $buku['tahun_terbit']; ?></p>
                    <h5 class='fw-bold mb-3'><?php echo $buku['judul']; ?></h5>
                    <p class='text-secondary'>Penerbit: <?php echo $buku['penerbit']; ?></p>
                    <a href='buku_detail.php?id=<?php echo $buku['id_buku']; ?>' class='text-decoration-none text-danger'>Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php while ($buku = mysqli_fetch_assoc($query)) { ?>
    <div class="d-flex flex-lg-row justify-content-evenly">
        <div class="d-flex  mt-5 align-items-center" style="width: 200px; heigth: 100px">
            <div>
                <img src='../assets/img/<?php echo $buku['gambar']; ?>' class="img-thumbnail" width="150" alt="...">
                <div class="text-wrap d-flex flex-md-column gap-2">
                    <h5 class='fw-bold mb-3'><?php echo $buku['judul']; ?></h5>
                    <p class="mb-0 fs-5"><?php echo $buku['tahun_terbit']; ?></p>
                    <p class="mb-0 text-secondary">Penerbit: <?php echo $buku['penerbit']; ?></p>
                    <div>
                        <a href='buku_detail.php?id=<?php echo $buku['id_buku']; ?>' class='text-decoration-none text-danger'>Lihat</a>
                        <!-- <button type="button" class="btn btn-secondary btn-sm ms-5 ">Koleksi</button> -->
</div>
</div>
</div>
</div>
<?php } ?>


<div style="margin-left: 40px">
    <!-- Form untuk memberikan ulasan -->
    <form id="formUlasan">
        <label for="ulasan"></label>
        <textarea id="ulasan" name="ulasan" rows="1" required></textarea><br><br>
        <button type="submit" style="background-color: yellow; border: 1px solid black; border-radius: 5px; padding: 5px 10px; color: black;">Kirim Ulasan</button>
    </form>
</div> -->


<?php
include("koneksi.php")
?>

login tendang
<?php
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $_SESSION['user'] = mysqli_fetch_array($data);
        echo '<script>alert("login Berhasil"); location.href="user/user.php";</script>';
    }
}
?>

peminjaman_tambah judul
<?php
include("../koneksi.php");
if ($_SESSION['user']['level'] !== 'peminjam') {
    header("Location:../404.php");
}
$query = mysqli_query($koneksi, "SELECT * FROM buku");


$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $id_user = $_SESSION['user']['id_user'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = $_POST['status_peminjaman'];
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) values('$id','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");

    if ($query) {
        echo '<script>alert("Peminjaman Berhasil"); location.href="buku_pinjam.php";</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BookVerse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <h1 class="mt-4">Peminjaman Buku</h1>
    <a href="../css/styles.css"></a>
    <div class="card">
        <br>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="?id=<?php echo $id ?>">

                    <div class="row mb-3">
                        <div class="col-md-4 ms-4">Buku</div>
                        <div class="col-md-7">
                            <?php
                            $buk = mysqli_query($koneksi, "SELECT*FROM buku WHERE id_buku=$id");
                            $buku = mysqli_fetch_array($buk);
                            ?>
                            <input class="form-control " type="text" value="<?php echo $buku['judul']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 ms-4">Tanggal Pengembalian</div>
                        <div class="col-md-7"> <!-- Mengubah ukuran kolom menjadi 6 -->
                            <input type="date" class="form-control" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 ms-4">Tanggal Pengembalian</div>
                        <div class="col-md-7"> <!-- Mengubah ukuran kolom menjadi 6 -->
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 ms-4">Status Peminjaman</div>
                        <div class="col-md-7">
                            <select name="status_peminjaman" class="form-control">
                                <option value="dipinjam">Di Pinjam</option>
                                <!-- <option value="dikembalikan">Di Kembalikan</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 mb-3" style="margin-left: 35.5%;">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="submit" class="btn btn-secondary">Reset</button>
                            <a href="buku_user.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- peminjaman tambah judul -->

peminjaman bitton ori
<?php
if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_SESSION['user']['id_user'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = $_POST['status_peminjaman'];
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) values('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");

    if ($query) {
        echo '<script>alert("Peminjaman Berhasil"); location.href="buku_pinjam.php";</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal");</script>';
    }
}
?>
<div class="row mb-3">
    <div class="col-md-4 ms-4">Buku</div>
    <div class="col-md-7">
        <select name="id_buku" class="form-control">
            <?php
            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
            while ($buku = mysqli_fetch_array($buk)) {
            ?>
                <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>

pinjam botton
<button style="border: 1px solid black; border-radius: 5px; padding: 5px 10px; color: black; margin-bottom: 10px;">
    <a href="peminjaman_tambah.php?id=<?php echo $buku['id_buku']; ?>" style="text-decoration: none; color: inherit;">Pinjam</a>
</button>

<button onclick="window.location.href = 'peminjaman_tambah.php';"