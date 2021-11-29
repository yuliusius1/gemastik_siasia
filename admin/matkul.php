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
    $matakuliah = query("SELECT * from matakuliah");

?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php 
                if(isset($_POST['edit'])){
                    $edit = edit_matkul($_POST['id'],$_POST['kode'],$_POST['nama'],$_POST['sksa'],$_POST['sksb'], $_POST['tahun']);
                    if($edit == 1){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Edit Matakuliah berhasil</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Edit Matakuliah Gagal</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                
                if(isset($_POST['delete'])){
                  $del = del_matkul($_POST['id']);
                    if($del == 1){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Edit Matakuliah berhasil</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Edit Matakuliah Gagal</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                ?>
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary fw-bold text-uppercase">Daftar Matakuliah</h4>
                    <a href="tambah-matkul.php" class="btn btn-primary">+Tambah Matakuliah</a>
                </div>
                <div class="card p-3 rounded shadow mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="py-3">
                                <th>
                                    Kode Matakuliah
                                </th>
                                <th>
                                    Matakuliah
                                </th>
                                <th>
                                    SKS
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($matakuliah as $m){?>
                            <tr>
                                <td><?= $m['kode'] ?></td>
                                <td><?= $m['nama'] ?></td>
                                <td><?= $m['sksa']."/".$m['sksb'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editMatkul<?=$m['id'] ?>">
                                        Edit
                                    </button> |
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delMatkul<?=$m['id'] ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php foreach($matakuliah as $m){?>
<div class="modal fade" id="editMatkul<?=$m['id'] ?>" tabindex="-1" aria-labelledby="editMatkulLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMatkulLabel">Edit Matakuliah <?= $m['nama'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $m['id']?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Kode Matakuliah"
                            name="kode" value="<?= $m['kode'] ?>">
                        <label for="floatingInput">Kode Matakuliah</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Matakuliah"
                            name="nama" value="<?= $m['nama']?>">
                        <label for="floatingInput">Nama Matakuliah</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="SKS A" name="sksa"
                            value="<?= $m['sksa']?>">
                        <label for="floatingInput">SKS A</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="SKS B" name="sksb"
                            value="<?= $m['sksb']?>">
                        <label for="floatingInput">SKS B</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Tahun Ambil"
                            name="tahun" value="<?= $m['tahun_ambil']?>">
                        <label for="floatingInput">Tahun Ambil</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="delMatkul<?=$m['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="delMatkulLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delMatkullabel">Delete Matakuliah <?=$m['nama'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $m['id']?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
    include '../template/footer.php';
?>