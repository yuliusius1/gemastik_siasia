<!DOCTYPE html>
<html lang="en">
<?php 
    require '../koneksi.php';
    if(isset($_SESSION['user'])){
        if($_SESSION['data']['role_id'] == 2){
            header("Location:admin/index.php");
        }
    } else {
        header("Location:login.php");
    }
?>
<?php 
    $title = "Home";
    include '../template/header.php';
    include '../template/navbar.php';
    $user_id = $_SESSION['data']['id'];
    $mahasiswa = query("SELECT * from mahasiswa where user_id='$user_id'");
    $progdi_id = $mahasiswa[0]['program_studi_id'];
    $progdi = onequery("SELECT * from program_studi where id='$progdi_id'");
    $fak_id = $mahasiswa[0]['fakultas_id'];
    $fak = onequery("SELECT * from fakultas where id='$fak_id'");
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-primary fw-bold text-uppercase">Selamat Datang , <?= $_SESSION['data']['name'] ?></h4>
                <div class="card p-3 rounded shadow mt-3">
                    <h4 class="text-primary fw-bold text-uppercase text-center pt-3 pb-2">Detail Data diri</h4>
                    <hr>
                    <table class="table table-striped table-borderless table-hover">
                        <tr>
                            <th class="py-3">Nama</th>
                            <td class="py-3">: <?= $_SESSION['data']['name'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">NIM</th>
                            <td class="py-3">: <?= $mahasiswa[0]['nim'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">Fakultas</th>
                            <td class="py-3">: <?= $fak['nama'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">Program Studi</th>
                            <td class="py-3">: <?= $progdi['nama'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">Angkatan</th>
                            <td class="py-3">: <?= $mahasiswa[0]['tahun_angkatan'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">Beban SKS</th>
                            <td class="py-3">: <?= $mahasiswa[0]['beban_sks'] ?></td>
                        </tr>
                        <tr>
                            <th class="py-3">SKS yang diambi</th>
                            <td class="py-3">: <?= $mahasiswa[0]['jumlah_sks'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    include '../template/footer.php';
?>