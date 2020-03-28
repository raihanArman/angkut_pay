<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $idPenumpang = $_POST['id_penumpang'];
        $email = $_POST['email'];
        $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
        $foto = isset($_POST['foto']) ? $_POST['foto'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        $res = array();

        $cek_email = "SELECT * FROM tb_penumpang WHERE email = '$email'";
        $sql_cek_email = mysqli_query($con, $cek_email);
        if(mysqli_num_rows($sql_cek_email) > 0){
            $row = mysqli_fetch_array($sql_cek_email);
            $res['value'] = 0;
            $res['message'] = "Akun sudah ada";
        }else{
            if($foto == ''){
                $foto = "";
            }
            $query_input = "INSERT INTO tb_penumpang (id_penumpang, email, password,nama , no_hp, foto) VALUES ('$idPenumpang', '$email', '$password', '$nama','', '$foto')";
            $sql_input = mysqli_query($con, $query_input);
            if($sql_input){
                $cek_email = "SELECT * FROM tb_penumpang WHERE email = '$email'";
                $sql_cek_email = mysqli_query($con, $cek_email);
                if($sql_cek_email){
                    $row = mysqli_fetch_array($sql_cek_email);
                    $res['value'] = 1;
                    $res['id_penumpang'] = $row['id_penumpang'];
                }
            }
        }

        echo json_encode($res);

    }
?>