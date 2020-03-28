<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
        $foto = isset($_POST['foto']) ? $_POST['foto'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        $res = array();

        $cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
        $sql_cek_email = mysqli_query($con, $cek_email);
        if(mysqli_num_rows($sql_cek_email) > 0){
            $row = mysqli_fetch_array($sql_cek_email);
            $res['value'] = 0;
            $res['message'] = "Akun sudah ada";
        }else{
            if($foto == ''){
                $foto = "";
            }
            $query_input = "INSERT INTO tb_user (email, password,nama ,ktp, merk_mobil, plat ,jenis_kelamin, foto, alamat, no_hp, status) VALUES ('$email', '$password', '$nama','','','','L' , '$foto', '','', 'Aktif')";
            $sql_input = mysqli_query($con, $query_input);
            if($sql_input){
                $cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
                $sql_cek_email = mysqli_query($con, $cek_email);
                if($sql_cek_email){
                    $row = mysqli_fetch_array($sql_cek_email);
                    $res['value'] = 1;
                    $res['id_user'] = $row['id_user'];
                }
            }else{
                echo "Gagal";
            }
        }

        echo json_encode($res);

    }
?>