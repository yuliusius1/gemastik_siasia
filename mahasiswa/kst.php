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
    $title = "kartu Studi Tetap";
    $nav = $title;
    include '../template/header.php';
    include '../template/navbar.php';
    $jadwal = query("SELECT * from jadwal");
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary fw-bold text-uppercase">Request Matakuliah</h4>
                </div>
                <div class="card p-3 rounded shadow mt-3">
                    <table class="table table-striped  table-hover">
                        <thead>
                            <tr>
                                <th class="py-3">
                                    No
                                </th>
                                <th class="py-3">
                                    Kode
                                </th>
                                <th class="py-3">
                                    Matakuliah
                                </th>
                                <th class="py-3">
                                    B/U
                                </th>
                                <th class="py-3">
                                    SKS A
                                </th>
                                <th class="py-3">
                                    SKS B
                                </th>
                                <th class="py-3">
                                    KETERANGAN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach($jadwal as $j){
                                    $kelas_id = $j['kelas_id'];
                                    $kelas = onequery("SELECT * from kelas where id='$kelas_id'");
                                    $mat_id = $kelas['id'];
                                    $matakuliah = onequery("SELECT * from matakuliah where id='$mat_id'");
                                    $admin_id = $kelas['id'];
                                    $admin = onequery("SELECT * from  admin where id='$admin_id'");
                                    $user_id = $admin['user_id'];
                                    $user = onequery("SELECT * from user where id='$user_id'");
                                ?>
                            <tr>
                                <td class="py-3 "><?= $no ?></td>
                                <td class="py-3 "><?= $kelas['kode'] ?></td>
                                <td class="py-3 "><?= $matakuliah['nama'] ?></td>

                                <td class="py-3 "><?= $j['bup'] ?></td>
                                <td class="py-3 "><?= $matakuliah['sksa'] ?></td>
                                <td class="py-3 "><?= $matakuliah['sksb'] ?></td>
                                <td class="py-3 ">
                                    <b> <?= $admin['kode_admin'] ?></b> <br>
                                    <?= $user['name'] ?> <br>
                                    <?= $kelas['ruang'] ?> <br>
                                    <?= $kelas['hari'] ?> <br>
                                    <?= $kelas['jam_mulai']."_".$kelas['jam_selesai'] ?> <br>
                                </td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    include '../template/footer.php';
?>