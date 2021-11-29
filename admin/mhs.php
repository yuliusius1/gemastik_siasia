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
    $title = "Daftar Mahasiswa";
    include '../template/header.php';
    include '../template/navbar-adm.php';
    $mahasiswa = query("SELECT * from mahasiswa");
    $progdi_id = $mahasiswa[0]['program_studi_id'];
    $progdi = onequery("SELECT * from program_studi where id='$progdi_id'");
    $fak_id = $mahasiswa[0]['fakultas_id'];
    $fak = onequery("SELECT * from fakultas where id='$fak_id'");

?>

<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary fw-bold text-uppercase">Daftar Mahasiswa</h4>
                    <a href="tambah-mhs.php" class="btn btn-primary">+Tambah Mahasiswa</a>
                </div>
                <div class="card p-3 rounded shadow mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="py-3">
                                <th>
                                    Nama Mahasiswa
                                </th>
                                <th>
                                    NIM
                                </th>
                                <th>
                                    Fakultas
                                </th>
                                <th>
                                    Jurusan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($mahasiswa as $m){?>
                            <tr>
                                <td><?= $m['nama'] ?></td>
                                <td><?= $m['nim'] ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    include '../template/footer.php';
?>