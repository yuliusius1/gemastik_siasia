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
    $title = "Home | Admin";
    include '../template/header.php';
    include '../template/navbar-adm.php';
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Selamat Datang , <?= $_SESSION['data']['name'] ?></h4>
                <div class="card p-5 rounded shadow mt-3">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $_SESSION['data']['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td></td>
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