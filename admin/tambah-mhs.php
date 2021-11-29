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

    if(isset($_POST['tambah'])){
        $tambah = tambah_mhs($_POST['nama'],$_POST['nim'],$_POST['fakultas'],$_POST['jurusan'],$_POST['angkatan']);
    }
?>
<?php 
    $title = "Daftar Mahasiswa";
    include '../template/header.php';
    include '../template/navbar-adm.php';
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php 
                if(isset($_POST['tambah'])){
                    $tambah = tambah_matkul($$_POST['kode'],$_POST['nama'],$_POST['sksa'],$_POST['sksb'],$_POST['tahun']);
                    if($tambah == 1){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Tambah Mahasiswa berhasil</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Tambah Mahasiswa Gagal</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                ?>
                <div class="d-flex justify-content-between">
                    <h4>Tambah Mahasiswa</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="numbers" class="form-control" id="floatingInput" placeholder="User ID"
                                name="uid">
                            <label for="floatingInput">User ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="numbers" class="form-control" id="floatingInput" placeholder="User ID"
                                name="fid">
                            <label for="floatingInput">Fakultas ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="numbers" class="form-control" id="floatingInput" placeholder="User ID"
                                name="pid">
                            <label for="floatingInput">program Studi ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Kode Matakuliah"
                                name="nim">
                            <label for="floatingInput">NIM</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Matakuliah"
                                name="tahun">
                            <label for="floatingInput">Tahun Angkatan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Tahun Ambil"
                                name="jumsks">
                            <label for="floatingInput">Jumlah SKS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Tahun Ambil"
                                name="beban">
                            <label for="floatingInput">Beban SKS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Tahun Ambil"
                                name="smt">
                            <label for="floatingInput">Semester</label>
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