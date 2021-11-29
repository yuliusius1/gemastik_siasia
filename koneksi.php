<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","gemastik");
    
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    function query($query) {
        global $con;

        $result = mysqli_query($con, $query);
        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function onequery($query) {
        global $con;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function select_user($user,$pass){
        global $con;
        $query = mysqli_query($con,"SELECT * from user where username='$user' and password='$pass'");

        if(mysqli_num_rows($query) === 1){
            return true;
        } 

        return false;
    }

    function regist_matkul($kelas){
        global $con;
        $user = $_SESSION['data']['id'];
        //Cek
        $cek_kelas = onequery("SELECT * from kelas where id='$kelas'");
        if(empty($cek_kelas)){
            return false;
        }
        
        $cek_jadwal = onequery("SELECT * from jadwal where user_id='$user' and kelas_id='$kelas'");
        if(!empty($cek_jadwal)){
            return false;
        }

        $insert = mysqli_query($con, "INSERT INTO jadwal VALUES ('','$user','$kelas','B')");
        if($insert){
            return true;
        } else {
            return false;
        }

    }

    function tambah_matkul($kode, $nama, $sksa, $sksb, $tahun){
        global $con;
        $query = "INSERT INTO matakuliah VALUES ('', '','$kode','$nama','$sksa','$sksb', '$tahun')";
        $tambah = mysqli_query($con, $query);

        return $tambah ? true : false;

        
    }

    function edit_matkul($id, $kode, $nama, $sksa, $sksb, $tahun){
        global $con;
        $query = "UPDATE matakuliah SET 
                    kode = '$kode',
                    nama = '$nama',
                    sksa = '$sksa',
                    sksb = '$sksb',
                    tahun_ambil = '$tahun'
                WHERE id = $id
            ";

    $edit = mysqli_query($con, $query);

    return $edit ? true : false;
}

    function del_matkul($id){
        global $con;
        $del = mysqli_query($con, "DELETE FROM matakuliah WHERE id = $id");
        return $del ? true : false;
    }

    function tambah_mhs($nama, $nim, $fakultas, $jurusan, $angkatan){
        global $con;
        $query = "INSERT INTO mahasiswa VALUES ('', '','$kode','$nama','$sksa','$sksb', '$tahun')";
        $tambah = mysqli_query($con, $query);

        return $tambah ? true : false;

        
    }
?>