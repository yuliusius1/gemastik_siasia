<?php 

if(!isset($_SESSION['user'])){
  header('location:login.php');
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><strong class="text-primary">SIASIA</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Home") active ?>" aria-current="page"
                        href="../mahasiswa/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Mata Kuliah") active ?>" href="../mahasiswa/matkul.php">Mata
                        Kuliah</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Kartu Studi") active ?>" href="#">Kartu Studi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Jadwal Kuliah") active ?>" href="#">Jadwal Kuliah</a>
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