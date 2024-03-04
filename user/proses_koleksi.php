<?php
require_once("../koneksi.php");
if ($_SESSION['user']['level'] !== 'peminjam') {
    header("Location:../404.php");
}
$id_akun = $_SESSION['user']['id_user'];
$buku_id = $_GET['id'];
$query = mysqli_query($koneksi, "INSERT INTO koleksi (id_buku,id_user) VALUES('$buku_id', '$id_akun')");
if ($query) {
    header("location:koleksi.php");
}
