<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $password = $_POST['password'];
        $id_user = $_POST['id_user'];

        $res = array();

        $query = "UPDATE tb_user SET password = '$password' WHERE id_user = $id_user";
        $sql = mysqli_query($con, $query);

        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil ubah password";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal ubah password";
        }

        echo json_encode($res);

    }

?>