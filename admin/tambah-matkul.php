<!DOCTYPE html>
<html lang="en">
<?php 
    require '../koneksi.php';
    if(isset($_SESSION['user'])){
        if($_SESSION['data']['role_id'] == 1){
            header("Location:mahasiswa/index.php");
        }
    } else {
        header("Location:login.php");
    }

?>
<?php 
    $title = "Matakuliah";
    include '../template/header.php';
    include '../template/navbar-adm.php';
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php 
                if(isset($_POST['tambah'])){
                  $tambah = tambah_matkul($_POST['kode'],$_POST['nama'],$_POST['sksa'],$_POST['sksb'],$_POST['tahun']);
                    if($tambah == 1){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Tambah Matakuliah berhasil</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Tambah Matakuliah Gagal</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                ?>
                <div class="d-flex justify-content-between">
                    <h4>Tambah Matakuliah</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Kode Matakuliah"
                                name="kode">
                            <label for="floatingInput">Kode Matakuliah</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Matakuliah"
                                name="nama">
                            <label for="floatingInput">Nama Matakuliah</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="SKS A"
                                name="sksa">
                            <label for="floatingInput">SKS A</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="SKS B"
                                name="sksb">
                            <label for="floatingInput">SKS B</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Tahun Ambil"
                                name="tahun">
                            <label for="floatingInput">Tahun Ambil</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
    include '../template/footer.php';
?>