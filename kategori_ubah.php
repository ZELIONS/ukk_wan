<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
<br>
<div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "UPDATE kategori set kategori='$kategori' WHERE id_kategori=$id");

                    if($query){
                        echo '<script>alert("Ubah Kategori Berhasil");</script>';
                    }else{
                        echo '<script>alert("Ubah Kategori Gagal");</script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM kategori where id_kategori=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-4 ms-4">Nama Kategori</div>
                <div class="col-md-7"><input type="text" class="form-control" value="<?php echo $data['kategori']; ?>" name="kategori"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3" style="margin-left: 35.5%;">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="submit" class="btn btn-secondary">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>