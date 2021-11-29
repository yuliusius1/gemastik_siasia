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
    $title = "Mata Kuliah";
    $nav = $title;
    include '../template/header.php';
    include '../template/navbar.php';
    $matakuliah = query("SELECT * from matakuliah");
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if(!isset($_GET['kode'])){ ?>
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary fw-bold text-uppercase">Request Matakuliah</h4>
                </div>
                <div class="card p-3 rounded shadow mt-3">
                    <table class="table table-striped  table-hover">

                        <thead>
                            <tr>
                                <th class="py-3">
                                    Kode
                                </th>
                                <th class="py-3">
                                    Matakuliah
                                </th>
                                <th class="py-3">
                                    SKS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($matakuliah as $m){?>
                            <tr>
                                <td class="py-3 "><a href="matkul.php?kode=<?= $m['id'] ?>"
                                        class="link-danger text-decoration-none">#<?= $m['kode'] ?></a>
                                </td>
                                <td class="py-3 "><?= $m['nama'] ?></td>
                                <td class="py-3 "><?= $m['sksa']."/".$m['sksb'] ?></td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                        <?php } else {  

                            if(isset($_GET['kelas'])){
                                $regist_matkul = regist_matkul($_GET['kelas']);
                                if($regist_matkul == 1){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Registrasi Matakuliah berhasil</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Registrasi Matakuliah Gagal</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                }
                            }
                            $id_kelas = $_GET['kode'];
                            $kelas = query("SELECT * from kelas where id ='$id_kelas'");
                            ?>
                        <div class="d-flex justify-content-between">
                            <h4>Request Matakuliah - <?= $kelas[0]['kode'] ?></h4>
                        </div>
                        <div class="card p-3 rounded shadow mt-3">
                            <table class="table table-striped  table-hover">
                                <thead>
                                    <tr>
                                        <th class="py-3">
                                            Kode Kelas
                                        </th>
                                        <th class="py-3">
                                            Nama Kelas
                                        </th>
                                        <th class="py-3">
                                            Pengajar
                                        </th>
                                        <th class="py-3">
                                            Hari
                                        </th>
                                        <th class="py-3">
                                            Jam
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($kelas as $k){
                                    $admin_id = $k['admin_id'];
                                    $admin = onequery("SELECT * from admin where id='$admin_id'");
                                    $user_id = $admin['user_id'];
                                    $user = onequery("SELECT * from user where id='$user_id'"); ?>
                                    <tr>
                                        <td class="py-3 "><a
                                                href="matkul.php?kode=<?= $_GET['kode'] ?>&kelas=<?= $k['id'] ?>"
                                                class="link-danger text-decoration-none">#<?= $k['kode'] ?></a>
                                        </td>
                                        <td class="py-3 "><?= $k['nama_kelas'] ?></td>
                                        <td class="py-3 "><?= $user['name'] ?></td>
                                        <td class="py-3 "><?= $k['hari'] ?></td>
                                        <td class="py-3 "><?= $k['jam_mulai']."_".$k['jam_selesai'] ?></td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                                <?php }  ?>
                            </table>
                        </div>
                </div>
            </div>
        </div>
</body>

<?php
    include '../template/footer.php';
?>