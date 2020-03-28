<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $res = array();

        $query_cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
        $sql_cek_email = mysqli_query($con, $query_cek_email);
        if(mysqli_num_rows($sql_cek_email) > 0) {
            $query_login = "SELECT * FROM tb_user WHERE email = '$email' and password = '$password'";
            $sql_login = mysqli_query($con, $query_login);
            if(mysqli_num_rows($sql_login) > 0){
                $row = mysqli_fetch_array($sql_cek_email);
                if($row['status'] == 'Tidak Aktif'){
                    $res['value'] = 0;
                    $res['message'] = "Akun anda telah di non aktifkan";    
                }else{
                    $cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
                    $sql_cek_email = mysqli_query($con, $cek_email);
                    if($sql_cek_email){
                        $row = mysqli_fetch_array($sql_cek_email);
                        $res['value'] = 1;
                        $res['message'] = "Login berhasil";
                        $res['id_penumpang'] = $row['id_penumpang'];
                    }
                }
            }else{
                $res['value'] = 0;
                $res['message'] = "Password salah";    
            }
        }else{
            $res['value'] = 0;
            $res['message'] = "Email tidak terdaftar";
        }

        echo json_encode($res);

    }

?>