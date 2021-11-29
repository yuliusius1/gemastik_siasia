<?php 

if(!isset($_SESSION['user'])){
  header('location:login.php');
}
?>
<nav class="navbar  navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><strong class="text-primary">SIASIA</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Home | Admin") active ?>" aria-current="page"
                        href="../admin/index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if($title == "Matakuliah") active ?>" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Matakuliah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../admin/tambah-matkul.php">Tambah Matakuliah</a></li>
                        <li><a class="dropdown-item" href="../admin/matkul.php">Lihat Matakuliah</a></li>
                        <li><a class="dropdown-item" href="#">Daftar Kelas</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Daftar Mahasiswa") active ?>" href="../admin/mhs.php ">Daftar Mahasiswa</a>
                </li>
            </ul>
            <form class="d-flex">
                <a href="../logout.php" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                </a>
            </form>
        </div>
    </div>
</nav>