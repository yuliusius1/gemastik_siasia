<?php 
require_once "koneksi.php";
if(isset($_SESSION['user'])){
  if($_SESSION['data']['role_id'] == 1){
    header("Location:mahasiswa/index.php");
  } else {
    header("Location:admin/index.php");
  }
} else { ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="h-100 d-flex flex-column">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php 
                    if(isset($_POST['login'])){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $auth = select_user($user,$pass);
                
                        if($auth == 1){
                            $query = query("SELECT * from user where username='$user'");
                            $_SESSION['user'] = $user;
                            $_SESSION['data'] = $query[0];
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Login Success!</strong> Anda akan diarahkan ke halaman utama.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            if($_SESSION['data']['role_id'] == 1){
                              header("Refresh:2;url=mahasiswa/index.php");
                            } else {
                              header("Refresh:2;url=admin/index.php");
                            }
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Detail Login Tidak ditemukan!</strong> Silahkan check kembali NIM Dan Password anda.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    } 
                ?>
                <div class="card p-5 shadow">
                    <h1 class="text-center fw-bold text-primary">Login Area</h1>
                    <p class="text-muted text-center mb-5">Login to your account</p>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="username"
                                name="user">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="iniius"
                                name="pass">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold" name="login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>